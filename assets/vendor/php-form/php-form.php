<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (file_exists($auto_load = '../vendor/autoload.php')) {
    include($auto_load);
} else {
    die('Unable to load the "autoload" script!');
}


class PHP_Form
{

    public $to = false;
    public $from_name = false;
    public $from_email = false;
    public $subject = false;
    public $mailer = false;
    public $smtp = false;
    public $message = '';
    public $title = false;
    public $name = false;

    public $content_type = 'text/html';
    public $charset = 'utf-8';
    public $ajax = false;

    public $options = [];
    public $cc = [];
    public $bcc = [];
    public $db_connection = [];
    public $conn = false;
    public $honeypot = '';
    public $recaptcha_secret_key = false;


    public $error_msg = array(
        'invalid_to_email' => 'Email to (receiving email address) is empty or invalid!',
        'invalid_from_name' => 'From Name is empty!',
        'invalid_from_email' => 'Email from: is empty or invalid!',
        'invalid_subject' => 'Subject is too short or empty!',
        'short' => 'is too short or empty!',
        'ajax_error' => 'Sorry, the request should be an Ajax POST',
    );

    private $error = false;
    private $attachments = [];

    public function __construct($form)
    {
        if ($form == 'contact') {
            $this->mailer = getenv('GMAIL_USERNAME');
            $this->smtp = array(
                'host' => getenv('HOSTNAME'),
                'username' => getenv('GMAIL_USERNAME'),
                'password' => getenv('GMAIL_PASSWORD')
            );
        } else {
            $this->db_connection = array(
                "servername" => "eu-cdbr-west-03.cleardb.net",//getenv('DB_HOST'),
                "username" => "bab8d7a58b622f",//getenv('DB_USER'),
                "password" => "711f992d",//getenv('DB_PASS'),
                "dbname" => "heroku_454fe75926c0540"//getenv('DB_NAME')
            );
            $this->conn = new mysqli($this->db_connection['servername'], $this->db_connection['username'], $this->db_connection['password'], $this->db_connection['dbname']);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
    }

    public function add_message($content, $label = '', $length_check = false)
    {
        $message = filter_var($content) . '<br>';
        if ($length_check) {
            if (strlen($message) < $length_check + 4) {
                $this->error .= $label . ' ' . $this->error_msg['short'] . '<br>';
                return;
            }
        }
        $this->message .= !empty($label) ? '<strong>' . $label . ':</strong> ' . $message : $message;
    }

    public function send()
    {
        if (!empty(trim($this->honeypot))) {
            return 'OK';
        }

        if ($this->recaptcha_secret_key) {

            if (!$_POST['recaptcha-response']) {
                return 'No reCaptcha response provided!';
            }

            $recaptcha_options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query([
                        'secret' => $this->recaptcha_secret_key,
                        'response' => $_POST['recaptcha-response']
                    ])
                ]
            ];

            $recapthca_context = stream_context_create($recaptcha_options);
            $recapthca_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $recapthca_context);
            $recapthca_response_keys = json_decode($recapthca_response, true);

            if (!$recapthca_response_keys['success']) {
                return 'Failed to validate the reCaptcha!';
            }
        }

        if ($this->ajax) {
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
                return $this->error_msg['ajax_error'];
            }
        }

        $to = filter_var($this->to, FILTER_VALIDATE_EMAIL);
        $from_name = filter_var($this->from_name);
        $from_email = filter_var($this->from_email, FILTER_VALIDATE_EMAIL);
        $subject = $this->subject;
        $message = nl2br($this->message);

        if (!$to || md5($to) == '496c0741682ce4dc7c7f73ca4fe8dc5e')
            $this->error .= $this->error_msg['invalid_to_email'] . '<br>';

        if (!$from_name)
            $this->error .= $this->error_msg['invalid_from_name'] . '<br>';

        if (!$from_email)
            $this->error .= $this->error_msg['invalid_from_email'] . '<br>';

        if (!$subject)
            $this->error .= $this->error_msg['invalid_subject'] . '<br>';

        if (is_array($this->smtp)) {
            if (!isset($this->smtp['host']))
                $this->error .= 'SMTP host is empty!' . '<br>';

            if (!isset($this->smtp['username'])) {
                $this->error .= 'SMTP username is empty!' . '<br>';
            }
            if (!isset($this->smtp['password']))
                $this->error .= 'SMTP password is empty!' . '<br>';

            if (!isset($this->smtp['port']))
                $this->smtp['port'] = getenv('GMAIL_PORT');

            if (!isset($this->smtp['encryption']))
                $this->smtp['encryption'] = 'tls';

            if (isset($this->smtp['mailer'])) {
                $this->mailer = $this->smtp['mailer'];
            } else {
                $this->mailer = $this->smtp['username'];
            }
        }

        if ($this->error)
            return $this->error;

        // Initialize PHPMailer
        echo "START PHP MAILER";
        $mail = new PHPMailer(true);
        echo "END PHP MAILER";

        try {
            // Set timeout to 30 seconds
            $mail->Timeout = 30;

            // Check and set SMTP
            if (is_array($this->smtp)) {
                $mail->isSMTP();
                $mail->Host = $this->smtp['host'];
                $mail->SMTPAuth = true;
                $mail->Username = $this->smtp['username'];
                $mail->Password = $this->smtp['password'];
                $mail->Port = $this->smtp['port'];
                $mail->SMTPSecure = $this->smtp['encryption'];
            }

            // Headers
            $mail->CharSet = $this->charset;
            $mail->ContentType = $this->content_type;

            // Recipients
            $mail->setFrom($this->mailer, $from_name);
            $mail->addAddress($to);
            $mail->addReplyTo($from_email, $from_name);

            // cc
            if (count($this->cc) > 0) {
                foreach ($this->cc as $cc) {
                    $mail->addCC($cc);
                }
            }

            // bcc
            if (count($this->bcc) > 0) {
                foreach ($this->bcc as $bcc) {
                    $mail->addBCC($bcc);
                }
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Options
            if (count($this->options) > 0) {
                foreach ($this->options as $option_name => $option_val) {
                    $mail->$option_name = $option_val;
                }
            }

            // Attachments
            if (count($this->attachments) > 0) {
                foreach ($this->attachments as $attachment) {
                    $mail->AddAttachment($attachment['path'], $attachment['name']);
                }
            }

            $mail->send();

            return 'OK';
        } catch (Exception $e) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }

    public function post_review()
    {
        $date = date('Y-m-d');
        $sql = "INSERT INTO reviews (name, title, message, date) 
                VALUES ('" . $_POST['name'] . "', '" . $_POST['title'] . "', '" . $_POST['message'] . "', '" . $date . "')";

        try {
            $this->conn->query($sql);
            return "OK";
        } catch (Exception $e) {
            return "DB Query Failed: " . $this->conn->error;
        }
    }

    public
    function get_products_from_db()
    {
        $sql = "SELECT * FROM products";
        $results = $this->conn->query($sql);
        $jsonData = array();

        foreach ($results as $row) {
            $jsonData[] = array(
                "productCategory" => $row['productCategory'],
                "productName" => $row['productName'],
                "productCost" => $row['productCost'],
                "productDescription" => $row['productDescription'],
                "productImage" => $row['productImage'],
            );
        };

        return json_encode(json_encode($jsonData));
    }

    public
    function get_reviews_from_db()
    {
        $sql = "SELECT * FROM reviews";
        $results = $this->conn->query($sql);
        $jsonData = array();

        foreach ($results as $row) {
            $jsonData[] = array(
                "name" => $row['name'],
                "title" => $row['title'],
                "message" => $row['message'],
            );
        }
        return json_encode(json_encode($jsonData));
    }
}
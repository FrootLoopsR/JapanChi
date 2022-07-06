<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

class PHP_Email_Form
{
    public $from_email;
    public $from_name;
    public $subject;
    public $message;
    public $to_email = 'royazami13@gmail.com';
    public $to_name = 'Roy Azami';
    public $ajax = true;


    private function write_to_console($data)
    {
        $console = $data;
        if (is_array($console))
            $console = implode(',', $console);

        echo "<script>console.log('Console: " . $console . "' );</script>";
    }

    public function send_email()
    {
        $mail = new PHPMailer(true);
        $this->write_to_console("Created Class Sending to mail " . $this->to_email);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'roee007@gmail.com';                 // SMTP username
            $mail->Password = 'Az45xc78b';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->setFrom($this->from_email, $this->from_name);
            $mail->addAddress($this->to_email, $this->to_name);     // Add a recipient
            $mail->addReplyTo($this->from_email, $this->from_name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body = $this->message;
            $this->write_to_console("Sending email to: " . $this->to_email);
            $mail->send();
            $this->write_to_console("Email sent");
            return true;
        } catch (Exception $e) {
            return false;
        }

    }
}
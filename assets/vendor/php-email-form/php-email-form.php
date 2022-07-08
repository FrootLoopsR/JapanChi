<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


class PHP_Email_Form
{
    public string $from_email;
    public string $from_name;
    public string $subject;
    public string $message;
    public string $to_email = 'roee007@gmail.com';
    public string $to_name = 'Roy Azami';

    public function send_email_via_gmail(): void
    {
        try {
            $gmail_mail = new PHPMailer(true);
            $gmail_mail->isSMTP();
            $gmail_mail->IsHTML(true); // Set email format to HTML
            // Send email using gmail SMTP server
            $gmail_mail->Host = 'ssl://smtp.gmail.com';
            $gmail_mail->SMTPSecure = 'ssl';
            // port for Send email
            $gmail_mail->Port = 465;
            $gmail_mail->SMTPDebug = 1;
            $gmail_mail->SMTPAuth = true;
            $gmail_mail->Username = getenv('GMAIL_USERNAME');
            $gmail_mail->Password = getenv('GMAIL_PASSWORD');
            $gmail_mail->Subject = $this->subject;
            $gmail_mail->Body = 'New Ticket From JapanChi <br> <strong>Email: ' . $this->from_email . ' Name: ' . $this->from_name . 'Sent a ticket</strong><br>' . $this->message;

            $gmail_mail->addAddress($this->to_email, $this->to_name);
            $gmail_mail->addCC('barak.litvinov@outlook.com', 'Barak Litvinov');
            $gmail_mail->setFrom($this->from_email, $this->from_name);
            $gmail_mail->addReplyTo($this->from_email, $this->from_name);

        } catch (Exception $e) {
            die("Error setting data: " . $e->getMessage());
        }

        try {
            $gmail_mail->send();
        } catch (Exception $e) {
            die('Mailer error' . $e->getMessage());
        }
    }
}

?>
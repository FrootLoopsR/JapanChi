<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';


class PHP_Email_Form
{
    public string $from_email;
    public string $from_name;
    public string $subject;
    public string $message;
    public string $to_email = 'royazami13@gmail.com';
    public string $to_name = 'Roy Azami';


    private function write_to_console($data)
    {
        $console = $data;
        if (is_array($console))
            $console = implode(',', $console);

        echo "<script>console.log('Console: " . $console . "' );</script>";
    }

    public function send_email_via_gmail(): void
    {
        try {
            $this->write_to_console('Entered send_email_via_gmail');
            $gmail_mail = new PHPMailer(true);
            $this->write_to_console('Created PHPMailer');

            $gmail_mail->isSMTP();
            $gmail_mail->IsHTML(true); // Set email format to HTML
            // Send email using gmail SMTP server
            $gmail_mail->Host = 'ssl://smtp.gmail.com';
            $this->write_to_console('Host' . $gmail_mail->Host);
            // port for Send email
            $gmail_mail->Port = 465;
            $this->write_to_console('Port' . $gmail_mail->Port);
            $gmail_mail->SMTPDebug = 1;
            $gmail_mail->SMTPAuth = true;
            $gmail_mail->Username = 'roee007@gmail.com';
            $this->write_to_console('User' . $gmail_mail->Username);
            $gmail_mail->Password = 'Az45xc78b';
            $this->write_to_console('Pw' . $gmail_mail->Password);
            $gmail_mail->Subject = $this->subject;
            $this->write_to_console('Subject ' . $gmail_mail->Subject);
            $gmail_mail->Body = 'New Ticket From JapanChi <br> <strong>{$this->subject}</strong> <br> <br> {$this->message}';
            $this->write_to_console('Body' . $gmail_mail->Body);

            $gmail_mail->addAddress($this->to_email, $this->to_name);
            $gmail_mail->setFrom($this->from_email, $this->from_name);
            $gmail_mail->addReplyTo($this->from_email, $this->from_name);

        } catch (Exception $e) {
            die("Error setting data: " . $e->getMessage());
        }


        //$gmail_mail->AltBody = 'This is the body in plain text for non-HTML mail clients at https://onlinecode.org/';

        try {
            $gmail_mail->send();
            die('Message of Send email using gmail SMTP server has been sent');
        } catch (Exception $e) {
            die('Mailer error' . $e->getMessage());
        }
    }

    public function send_email_via_gmail_old(): bool
    {
        $this->write_to_console("Created Class Sending to mail " . $this->to_email);
        $mail = new PHPMailer(true);
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

    public function send_email_via_mailto(): bool
    {
        if (mail($this->to_email, $this->subject, $this->message, "From: " . $this->from_email)) {
            return true;
        } else {
            return false;
        }
    }
}

?>
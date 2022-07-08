<?php

function write_to_console($data)
{
    $console = $data;
    if (is_array($console))
        $console = implode(',', $console);

    echo "<script>console.log('Console: " . $console . "' );</script>";
}

$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form)) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
write_to_console("Create Class Sending to mail ");


write_to_console("name: " . $_POST['name']);
$contact->from_name = $_POST['name'];
write_to_console("email: " . $_POST['email']);
$contact->from_email = $_POST['email'];
write_to_console("subject: " . $_POST['subject']);
$contact->subject = $_POST['subject'];
write_to_console("message: " . $_POST['message']);
$contact->message = $_POST['message'];
write_to_console("Class members set");

$contact->send_email_via_gmail();

?>

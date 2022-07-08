<?php

$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form)) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;


$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
$contact->message = $_POST['message'];

$contact->send_email_via_gmail();

?>

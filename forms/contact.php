<?php

$receiving_email_address = getenv('RECEIVING_EMAIL_ADDRESS');

if (file_exists($php_form = '../assets/vendor/php-form/php-form.php')) {
    include($php_form);
} else {
    die('Unable to load the "PHP Form" Library!');
}

$contact = new PHP_Form('contact');
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
array_push($contact->cc, getenv('CC_1'), getenv('CC_2'));

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>

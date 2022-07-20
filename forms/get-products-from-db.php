<?php
if (file_exists($php_form = '../assets/vendor/php-form/php-form.php')) {
    include($php_form);
} else {
    die('Unable to load the "PHP Form" Library!');
}

$sql_connection = new PHP_Form('SQL');
$result = $sql_connection->get_products_from_db();

echo $result;
?>
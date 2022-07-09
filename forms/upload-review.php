<?php

  if( file_exists($php_form = '../assets/vendor/php-form/php-form.php' )) {
    include( $php_form );
  } else {
    die( 'Unable to load the "PHP Form" Library!');
  }

  $post_a_review = new PHP_Form('SQL');

  $post_a_review->name = $_POST['name'];
  $post_a_review->title = $_POST['title'];

  $post_a_review->add_message( $_POST['name'], 'Name');
  $post_a_review->add_message( $_POST['title'], 'Title');
  $post_a_review->add_message( $_POST['message'], 'Message', 20);

  echo $post_a_review->post_review();
?>

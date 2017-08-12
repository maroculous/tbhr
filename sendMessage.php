<?php
if (empty($_POST['name']) || empty($_POST['email']) || empty($_REQUEST['message'])) {
  header('Location: index.html#fail');
  exit(1);
}

$message = "\n-- " . date(DATE_RFC2822) . "\nA message from $_POST[name] <$_POST[email]>:\n$_POST[message]\n";

file_put_contents('./messages.txt', $message, FILE_APPEND | LOCK_EX);

$success = mail('jham005@gmail.com', 'TBHR Enquiry', $message);
if (!$success) {
  $error = error_get_last()['message'];
  file_put_contents('./messages.txt', $error, FILE_APPEND | LOCK_EX);
  header('Location: index.html#fail');
} else
  header('Location: index.html#sent');

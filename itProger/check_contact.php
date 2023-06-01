<?php
session_start();
$username=htmlspecialchars(trim($_POST['username']));
$from=htmlspecialchars(trim($_POST['email']));
$subject=htmlspecialchars(trim($_POST['subject']));
$message=htmlspecialchars(trim($_POST['message']));

$_SESSION['username']=$username;
$_SESSION['email']=$from;
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;

if (strlen($username)<=1){$erroruser='Введите корректный юзернэйм';}
elseif (strlen($from)<5 || strpos( $from, '@')==false) {$errormail = 'Введите корректный адрес';}
elseif (strlen($subject)<=5);{$errorsubj = 'Должно быть более 5 символов';}
elseif (strlen($message)<=15);{$errormess = 'Должно быть более 15 символов';}


?>
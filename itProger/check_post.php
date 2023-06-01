<?php
//print_r($_POST);
$name=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];
if (trim($name) == ''){echo 'Поле не должно быть пустым';}
elseif (strlen(trim($name)) <=3) {
    echo 'Должно быть минимум 4 символа';
}
elseif (trim($email)=='' || trim($pass)==''||trim($_POST['message'])=='') {
    echo 'Поле не должно быть пустым';
}
else {
//    $pass=md5($pass);
//    echo "<h1>Все данные</h1><p>$name</p><p>$email</p><p>$pass</p><p>$_POST[message]</p>";
//    foreach ($_POST as $key=>$value) {
//echo "<p>$value</p>";
//}
header('Location: about.php');
exit;
}
?>
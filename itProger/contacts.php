<?php
session_start();
$title='контакты';
require_once 'blocks/header.php';

?>
<h1 class="mt-5">Контакты</h1>
<form action="check_contact.php" method="post">
    <input type="text" name="username" value="<?=$_SESSION['username']?>" placeholder="имя суда" class="form-control"><br>
    <input type="email" name="email" value="<?=$_SESSION['email']?>" placeholder="почту суда" class="form-control"><br>
    <input type="text" name="subject" value="<?=$_SESSION['subject']?>" placeholder="тему суда" class="form-control"><br>
    <textarea name="message" <?=$_SESSION['message']?> placeholder="писать суда" class="form-control"></textarea><br>
<button type="submit" class="btn btn-success">Отправить</button>




</form>



<?php
require_once 'blocks/footer.php';
?>

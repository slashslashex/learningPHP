<?php
$title='О НАС';
require 'blocks/header.php';

?>
<div class="container mt-2">
    <h1>О НАС</h1>
    <form action="check_get.php" method="get">
        <input type="text" name="username" placeholder="Введите имя" class="form-control">
        <input type="email" name="email" placeholder="Введите почту" class="form-control">
        <input type="password" name="password" placeholder="Введите пароль" class="form-control">
        <textarea name="message" class="form-control" placeholder="Введите сообщение"></textarea>
        <input type="submit" value="Отправить" class="btn btn-success">



    </form>
</div>
<?php
require 'blocks/footer.php';

?>
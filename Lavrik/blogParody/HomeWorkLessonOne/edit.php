<?php
include_once ('functions.php');

$isEdited=false;
$err='';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '')
    {
        $err = 'Заполните все поля';
    }
    else
    {
        editArticles($title, $content);
        $isEdited = true;
    }

} else
{
    $title = '';
    $content = '';
}

?>
<div class="form">
    <? if ($isEdited): ?>
        <p>Article edited succesfuly!</p>
    <? else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?= $title ?>"><br>
            Text:<br>
            <input type="text" name="content" value="<?= $content ?>"><br>
            <button>Edit</button>
            <p><?= $err ?></p>
        </form>
    <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>


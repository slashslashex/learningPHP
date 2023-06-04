<?php

	include_once('functions.php');

	/*
		your code here
		check request method
		read POST-data
		validate data
		call addArticle
	*/

$isPost = false;
$err = '';
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
    addArticle($title, $content);
        $isPost = true;
    }

} else
{
    $title = '';
    $content = '';
}

//echo $_SERVER['REQUEST_METHOD'];
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
?>
<div class="form">
    <? if ($isPost): ?>
        <p>Your article is posted!</p>
    <? else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?= $title ?>"><br>
            Text:<br>
            <input type="text" name="content" value="<?= $content ?>"><br>
            <button>Send</button>
            <p><?= $err ?></p>
        </form>
    <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>
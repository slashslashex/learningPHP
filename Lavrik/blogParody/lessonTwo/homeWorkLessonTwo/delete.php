<?php

	include_once('models/functions.php');
    addLog();
	/*
		your code here
		get id from url
		check id
		call removeArticle
	*/
$title = trim($_POST['title']);
$articles = getArticles();
$id = (int)($_GET['id'] ?? '');
removeArticle($id)

?>
Article deleted successfully!
<hr>
<a href="index.php">Move to main page</a>
<?php

	include_once('functions.php');		

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
Article deleted succesfuly!
<hr>
<a href="index.php">Move to main page</a>
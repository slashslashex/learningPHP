<?php
//зачем-то стремимся к строгой типизации, размещается в том файле, который функцию вызывает
declare(strict_types=1);
include_once ('functions.php');
$articleId=1;
var_dump (checkId($_GET['id'] ?? ''));
var_dump (checkId(12));
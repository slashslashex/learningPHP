<?php
//вот тут сессию начинаем
session_start();
$username='Alex';
$_SESSION['username']=$username;
if($_SESSION['username']=='Alex')
echo 'Сессия установлена';
//удалять сессия через unset (элемент)
//вообще удалить сеессию черерз session_destroy()

$title='ГлЫвная';
echo '<b><ins>Урок 11. Подключение файлов говна</ins></b>'.'<br>';
require_once 'blocks/header.php'; #с реквайр после ошибки стопается весь код, с инклюд после ошибки код идёт дальше

?>
<h1>глЫвная</h1>
<?php
//echo date('m.l H:i:s', time() + 10000).'<br>';
//echo date('m-d H:i:s', strtotime('+1 week -2 day -3 hour'));
//echo date('m-d H:i:s', strtotime('last monday'));
echo date('j F H:i:s', strtotime('now'));
$lis=[5,7,4,8,3,1]; echo '<br>';
unset($lis[1]);
$lis=array_values($lis);

sort($lis);
rsort($lis);
$arr=array_slice($lis, 2, count($lis));
var_dump($arr);
echo '<br>';
$arr_1=[6,3];
$arr_2=[8,7,6];
$arr_3=[array_merge($arr_1,$arr_2)];
print_r($arr_3);
echo '<br>';


//shuffle($lis);
//if (in_array(3, $lis)=='');#ответ 1 значит true, пусто значит 0 значит false
//echo 'NOT FOUNDDDDDD';
//else echo 'FOUND';
print_r($lis);
echo '<br>';
$x=floatval('10');
echo gettype($x).'<br>';
echo is_numeric($x).'<br>';#1=true
echo is_integer($x).'<br>';
echo is_double($x).'<br>';
echo is_string($x).'<br>';
echo is_bool($x).'<br>';
echo is_array($x).'<br>';
$str='example';
echo strpos($str,'am').'<br>';
$words='john,bob,alex';
$arr_words=explode(',',$words);
print_r($arr_words).'<br>';
echo '<br>'.implode(' | ', $arr_words);
//Урок 15. Работа с фаелами
//$file=fopen('text.txt', 'w');#a для добавления r для чтения
//fwrite($file, "example text\ntest");
//fclose($file);
$filename='text.txt';
$file=fopen('text.txt', 'r');
$content=fread($file, filesize($filename));
fclose($file);
echo "<pre>$content</pre>";
file_put_contents('a.txt', "exaxaxample\r\ntetetestt");
echo '<pre>';
echo file_get_contents('a.txt').'<br>';
echo'</pre>';
echo file_exists('a.txt').'<br>';
//rename('a.txt', 'new_name.txt');
//unlink('new_name.txt');#удаление
echo __FILE__.'<br>';
echo fileperms(__FILE__);
//chmod(__FILE__, 0000); #0000 недоступен никому, 0777 доступен всем
//Урок 16. Функция phpinfo() и массив $_SERVER
//phpinfo();
//echo '<pre>';
//print_r($_SERVER);
//'</pre>';

echo $_SERVER['HTTPS'];#пусто или off - начить HTTPS не подключен
echo $_SERVER['HTTP_HOST'].' - '.$_SERVER['REQUEST_URI'].' - '.$_SERVER['HTTP_USER_AGENT'];
if($_GET['source']!=""){
    $link=explode("?source=", $_SERVER['REQUEST_URI']);
    $redirect="http://".$_SERVER['HTTP_HOST'].$link[0];

    exit();
}
//
echo '<br>'.'Урок 17. Отправка почты с сайта'.'<br>';
$message='Сообщение';
$to='admin@itproger.com';
$from='example@itproger.com';
$subject='Тема сообщения';
$subject='=?utf-8?B?'.base64_encode($subject).'?=';
$headers="From: $from\r\nReply to: $from\r\nContent type: text/plain; charset=utf-8\r\n";
mail($to, $subject, $message, $headers);
echo '<br>'.'Урок 18. Куки и сессии'.'</br>';
//$username='Alex';
setcookie("username", $username, time()+180);
//print_r($_COOKIE);
echo $_COOKIE['username'].'<br>';
//сессия стартуется до начала всех выводов, го ап
//
echo 'Урок 19. Форма обратной связи'.'<br>';


require 'blocks/footer.php';
?>
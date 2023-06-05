<?php
/*
Иногда полезно вспомнить как работать с файлами
на более низком уровне, например, если файл своим размером
рискует выбить оперативную память
*/
/*
создаем файл на несколько миллионов строк

$f = fopen('db.txt', 'w');
for ($i = 0; $i<2000000; $i++)
{
    fwrite($f, mt_rand(1000000, 10000000)."\n");
}
fclose($f);
*/
/*
выводим используемую оперативную память
$a = file('db.txt');
echo memory_get_usage();
*/
/**/
$f = fopen('db.txt', 'r');
$total = 0;
$cnt = 0;
while (!feof($f))
{
    $str = rtrim(fgets($f));
//    var_dump($str);
//    break;
    if ($str !== '')
    {
        $total += $str;#вот здесь не понял
        $cnt++;        #зачем так сделано в примере
    }
}
$sred=$total/$cnt;
echo memory_get_usage().'<br>';
echo is_infinite($sred).'<br>';
echo $str.'<br>';
echo $total.'<br>';
echo $cnt.'<br>';
echo $sred;
fclose($f);

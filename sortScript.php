<?php
//$file=file('PHP syntax and functions.txt');
//$sort=sort($file);
$file2=fopen('PHP syntax and functions.txt', 'r');
$str=fread($file2, filesize('PHP syntax and functions.txt'));
$lines=explode("\n", $str);
print '<pre>';
print_r($file);
print '</pre>';
print '<pre>';
print_r($file2);
print '</pre>';
//foreach ($sort as $key=>$values)
//{
//    for ($item=$values; $item<=(count($sort)); $item++)
//
//    $f = fopen('PHP syntax and functions sorted.txt', 'a');
//    $line = "$item\n";
//    fwrite($f, $line);
//    fclose($f);
//}



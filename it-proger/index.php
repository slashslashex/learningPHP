<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP LEARNING</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
</head>
<body>
<?php
echo 'Просто вывод строк текста';
echo '<br>'.'<br>';
    echo "<b>Zdarova</b> <dfn>Zaebal</dfn>";
    echo '<br>salam';
    echo "<br>\"двойная кавычка в двойной кавычка\"";
    echo '<br>"двойная кавычка в одинарной кавычке"';
    echo '<br>\'одинарная кавычка в одинарной кавычке\'';
    //commentary test
    #commentary test2
    /* commentary
    test
    test
    test
    */
echo '<br>'.'<br>';
echo 'Вывод цифарок';
$num=5; #integer для целых чисел
#$num=45;
$num2=-0.55; #float для нецелых, с точкой
echo '<br>'.'<br>';
echo $num;
echo '<br>';
echo $num2;
echo '<br>';
$stroka='Переменные'; #string для строк, просто текста
$boolev=false; #boolean только для да или нет, логическое
echo $stroka.': '.'Первая: '.$num.'. Вторая: '.$num2;
echo '<br>'.'<br>'.'<br>';
#разные типы данных
$a=0.5; #float
$b='0.5'; #string
#приводим k одному типу (желательно) и выводим
echo 'Сложение разных типов данных через приведение их к одному типу'.'<br>';
echo $a + floatval($b) .'<br>'; #перевод переменной в функцию привода к типу float
#константы поехали
echo '<b>Задаём константы</b>'.'<br>';
define('age', 32); #можно через функцию const (str=value)
echo 'Мой возраст ='.age.'<br>';
echo '<b><ins>Следующий урок поехал. Математические действия.</ins></b>'.'<br>';
$x=10;
$y=20;
echo 'Заданные числа: '.$x.' и '.$y.'<br>';
echo '<b>Сложение: </b>';
echo $x+$y.'<br>';
echo '<b>Вычитание: </b>';
echo $x-$y.'<br>';
echo '<b>Умножение: </b>';
echo $x*$y.'<br>';
echo '<b>Деление: </b>';
echo $x/$y.'<br>';
echo '<b>Остаток при делении одного целого на другое целое: </b>';
echo $x%$y.'<br>';
echo '<dfn>Быстрые действия с переменными</dfn>'.'<br>';
echo '<b>Сложение: </b>';
echo $x=$x+10; #можно писать x+=10 тоже самое, поэтому:
$x=10;
echo '<br>'.'<b>Вычитание: </b>';
echo $x-=10;
$x=10;
echo '<br>'.'<b>Умножение: </b>';
echo $x*=10;
$x=10;
echo '<br>'.'<b>Деление: </b>';
echo $x/=10;
$x=10;
echo '<br>'.'<b>Остаток при делении одного целого на другое целое: </b>';
echo $x%=10;
echo '<br>'.'Число P = '.M_PI;
echo '<br>'.'Число E = '.M_E;
echo '<br>'.abs(-22).'<br>';#делает число положительным
echo ceil(2.5).'<br>'; #приводит число к большему
echo floor(2.5).'<br>'; #приводит число к меньшему
echo round(2.565).'<br>'; #приводит число куда удобно
echo "Рандомич = ".mt_rand(1, 9999).'<br>';#случайный выбор целого числа в выбранном диапазоне
echo "<b><ins>Следующий урок поехал. Строковые операции</ins></b>".'<br>';
$str='Zdarova';
echo "VAR: $str".'<br>'; #в двойные кавучки переменные можно пихать, в одинарные неть
echo 'Тут какой-либо инпут '.'<input type="text">'.'<br>';
$dlina=strlen($str);
echo 'Количество символов в строке $str = '.$dlina.'<br>';
echo '<b><ins>Новый урок поехал. Условные операторы.</ins></b>'.'<br>';
$a='salam';
$b=6;
$isWeatherGood=false;
if ($a!='salam!' || !$isWeatherGood){echo 'first'.'<br>';}# это || равно или, это && равно и
elseif ($b==6){$res='second'.'<br>';
echo $res;
if ($a=='salam!'){echo'<br>'.'Yes salam!'.'<br>';}}
elseif ($b>50){echo '$b>50'.'<br>';}
elseif ($b<=45){echo '$b<=45'.'<br>';}
else {echo 'kek'.'<br>';}
echo '<b><ins>Урок 7. Оператор Switch-case</ins></b>'.'<br>';
//позволяет проверить переменную на множество значений сразу, только на равно
$x=1;
switch ($x){case 5: echo 'Var: 5'.'<br>'; break;
case 7: echo 'Var: 7'.'<br>'; break;
    case 9: echo 'Var: 9'.'<br>'; break;
    case 6: echo 'Var: 6'.'<br>'; break;
default: echo 'kek'.'<br>'; break;}
echo '<b><ins>Урок 8. МАССИВЫ ДАННЫХ ГОВНА. Одномерные и многомерные (пизда)</ins></b>'.'<br>';
//одномерные
$nums=array(4, 5,7,2,0,-23,6);
$nums[1]=45;
echo$nums[1].'<br>';
$arr=[4,true,6,'8',0.4,'c',24, -16];
$arr[0]='false';
echo $arr[0].'<br>';
//ассоциативные
$list=['age'=>50, 'name'=>'Alex', 'hobby'=>'football'];
$list['name']='Bob';
echo $list['name'].'<br>';
//многомерные ебта
$matrix=[
        [4,6.4,8],
        [3,2],
        [1,5,8,'9']
];
$matrix[0][1]=4;
echo $matrix[0][1].'<br>';
echo '<b><ins>Урок 9. Циклы for, while и do while. Операторы циклов</ins></b>'.'<br>';
echo '<dfn>Сикл for</dfn>'.'<br>';
for ($i =100; $i>20;$i-=5){echo $i.'<br>';}#задаем начало цикла (i); задаем порог, до которого будет длиться цикл; задаём шаг каждой итерации
echo '<dfn>Сикл while</dfn>'.'<br>';
$u=1;
while ($u<=10){echo $u.'<br>';$u++;}
echo '<dfn>Сикл do while</dfn>'.'<br>';
$r = 100;
do {echo $r.'<br>';}while($r<10);
echo '<dfn>Операторы в сиклах</dfn>'.'<br>';
for ($el=100; $el>10;$el/=2){
    if ($el<15)
        break;
    if ($el % 2==0)#нихуя не понял вообще, почему 50/2=25 и остаток не равен 0????
        continue;
    echo $el.'<br>';}
echo '<dfn>Сиклы в связке с массивами</dfn>'.'<br>';
$list=[5,7,3,8, 'some',45.7];#строим массив
for ($i=1; $i<count($list);$i++)#задаем параметры цикла (стартовая точка, до какого порога будет диться, шаг)
{echo "Element $i: $list[$i]<br>";}#for наиболее удобен для вывода массива,
echo '<dfn>Выводим говно ассоциативного массива циклом for each</dfn>'.'<br>';
$list=['age'=>50, 'name'=>'Alex', 'hobby'=>'football'];
$arr=[5,6,7,8,9];
foreach ($list as $item=>$value){echo "Key: $item. Value: $value.<br>";}
foreach($arr as $i=>$value){echo "Index: $i. Value: $value.<br>";}
echo '<b><ins>Урок 10. Функции. Область видимости</ins></b>'.'<br>';
function info($word){echo "$word<br>";}
function math($x,$y){$res=$x+$y;info($res);}
math (4,6);
math (9,6);
function info_2($word){echo "$word<br>";}
function math_2($x,$y){$res=$x+$y;return$res;}#можно function math($x,$y){return $x+$y;}
//function math($x,$y){return $x+$y;}
$res_1=math_2(9,3);
$res_2=math_2(2,2);
info_2($res_1);
info_2($res_2);
echo 'Практический пример функции в массиве'.'<br>';
function summa($arr){$summ=0;foreach($arr as $value){$summ += $value;}return $summ;}
$list=[5,7,3];
echo summa($list).'<br>';
echo summa([3,4,67]).'<br>';
echo'----------'.'<br>';
function info_3(){$x=0;}#локальное, видно только в пределах функции
$x=10;#глобальное, видно везде
info_3();#локальное, видно только в пределах функции
echo "$x<br>";#глобальное, видно везде
//чтобы внутри функции обратиться к глобальное переменной надо уот так уот
function info_4(){global $x;$x=0;}#
function click(){static $count;$count++;echo "$count<br>";}#статик нужен для сохранения состояние при каждом новом вызове
$x=10;
info_4();
echo "$x<br>";
echo'--------click-------'.'<br>';
click();
click();
click();
echo '<b><ins>Урок 11. Подключение файлов говна</ins></b>'.'<br>';


?>
</body>
</html>
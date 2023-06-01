<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Григорьев</title>
</head>
<body>
<h1>Задачник по PHP Григорьева Романа Игоревича</h1>
<?php
echo "<b><ins>1. Вычисления и условный оператор в PHP</ins></b>".'<br>'.'<br>';
echo '<dfn>1.1 Простейшая арифметика</dfn>'.'<br>';
echo 'Даны два числа 5 и 7. Найти их сумму и произведение'.'<br>';
$a=5;
$b=7;
$summ=$a+$b;
$mult=$a*$b;
echo "Сумма равна: $summ".'<br>'."Произведение равно: $mult".'<br>'.'<br>';
echo 'Даны два числа 4 и 6. Найдите сумму их квадратов'.'<br>';
$a=4;
$b=6;
$asq=$a*$a;
$bsq=$b*$b;
$summ=$asq+$bsq;
echo "Сумма квадратов равна: $summ".'<br>'.'<br>';
echo 'Даны три числа 3, 5, 8. Найдите их среднее арифметическое'.'<br>';
$a=3;
$b=5;
$c=8;
$sred=($a+$b+$c)/3;
//$arr=[$a, $b, $c];
//$kol_vo=count($arr);
//function summa($arr){$summ=0;foreach($arr as $value){$summ += $value;}return $summ;}
////$summ=$arr[0]+$arr[1]+$arr[2];
//$sred=summa($arr)/$kol_vo;
echo "Средне арифметическое: $sred".'<br>'.'<br>';
echo 'Даны три числа x = 2,y = 6 и z = 9. Найдите  (x+1)4−2(z−2x^2+y^2)'.'<br>';
$x=2; $y=6; $z=9;
$res=($x+1)*(4-2)*($z-2*($x*$x)+($y*$y));
echo "Решение: $res<br><br>";
echo 'Даны три ненулевых  числа $a = 4, $b = 8, $c = 3. Найдите все возможные результаты деления суммы двух из них на оставшееся третье число.'.'<br>';
$a=4;$b=8;$c=3;
$res1=($a+$b)/$c;$res2=($a+$c)/$b;$res3=($b+$c)/$a;
echo "Результаты: a+b/c=$res1<br>a+c/b=$res2<br>b+c/a=$res3<br><br>";
echo 'Дано два числа 17 и 54. Найдите  сумму 40% от первого числа и 84% от второго числа'.'<br>';
$a=17;$b=54;
$aperc=($a*40)/100;$bperc=($b*84)/100;#0.4*$a+0.84*$b kek
$summ=$aperc+$bperc;
echo "Сумма равна $summ<br><br>";
echo 'Дано трехзначное число 123. Найдите  сумму его цифр'.'<br>';
$x=123;
$x=strval($x);
//$x='1234567890';
$otvet=$x[0]+$x[1]+$x[2];
echo "Ответ равен $otvet<br>";
echo '<br>'.'<dfn>1.2 Условный оператор</dfn>'.'<br>';
echo 'Дано число 15. Если оно больше 10, то увеличьте его на 100, иначе уменьшитена 30'.'<br>';
$x=15;
if ($x>10){$x+=100;}
else $x-=30;
echo "$x".'<br>'.'<br>';
echo 'Дано натуральное число 8. Если оно четное, то уменьшите  его в 2 раза, иначе увеличьте в 3 раза'.'<br>';
$x=8;
if ($x%2==0){$x/=2;}
else $x*=3;
echo "$x<br><br>";
echo 'Дано число. Если оно не меньше 50, то выведите квадрат этого числа, если же это число больше 10 и меньше 30, то выведите ноль, в остальных случаях выведите слово "Ошибка"'.'<br>';
$x=99;
if ($x>50){$x=$x*$x; echo "$x";}
elseif ($x>10 && $x<30){echo 'ноль';}
else echo 'Ошибка'.'<br>'.'<br>';
echo '<br>'.'<br>'.'Дано два числа $a = 15, $b = 4. Вывести наибольшее из них.'.'<br>';
$a=15; $b=4;
if ($a>$b){echo "$a";}
else echo "$b";
echo '<br>'.'<br>'.'Дано два числа $a = 19, $b = 143. Вывести \'Да\', если они отличаются на 100, иначе вывести \'Нет\''.'<br>';
$a=19;$b=143;
if ($a-$b>=100 || $b-$a>=100){echo 'DA';}
else echo 'NET';
echo '<br>'.'<br>'.'В данном трехзначном числе переставьте цифры так, чтобы новое число оказалось наибольшим из возможных'.'<br>';
$str=159;
echo "$str<br>";
$arr=str_split($str);
rsort($arr);
$new=implode('', $arr);
echo "$new<br>";
echo '<br>'.'<dfn>1.3 Работа с формой</dfn>'.'<br>';
echo 'Пользователь вводит номер дня недели. Вывести название дня недели'.'<br>';
$denned=0;
if ($denned==1)
{
    echo 'Понедельник';
}
elseif ($denned==2)
{
    echo 'Вторник';
}
elseif ($denned==3)
{
    echo 'Среда';
}
elseif  ($denned==4)
{
    echo 'Четверг';
}
elseif ($denned==5)
{
    echo 'Пятница';
}
elseif ($denned==6)
{
    echo 'Суббота';
}
elseif ($denned==7)
{
    echo 'Воскресенье';
}
else echo 'Неверное число';
echo '<br>'.'<br>';
echo "Пользователь вводит свой возраст. Если он больше 80 лет, то вывести 'Здравствуйте, уважаемый', иначе 'Успехов!'".'<br>';
$age=90;
if ($age>80)
{
   echo 'Здравствуйте, уважаемый';
}
else echo 'Успехов!';
echo '<br>'.'<br>';
echo "Пользователь выбирает из выпадающего списка страну (Турция, Египет или Италия), вводит количество дней для отдыха и указывает, есть ли у него скидка (чекбокс). Вывести стоимость отдыха, которая вычисляется как произведение количества дней на 400. Далее это число увеличивается на 10%, если выбран Египет,
и на 12%, если выбрана Италия. И далее это число уменьшается на 5%, если указана скидка";
echo '<br>';
?>
<form method="post">
    <?php echo 'Выберите страну'?>
    <select name="strana" required size="1">
        <option>Турция</option>
        <option>Египет</option>
        <option>Италия</option>
    </select>
    <input type="text" name="dni" required placeholder="Введите количество дней">
    <?php echo 'Скидка'?>
    <input name="skidka" type="checkbox">
    <button type="submit">Вычислить</button>
</form>
<?php
$strana=htmlspecialchars(trim($_POST['strana']));
$dni=htmlspecialchars(trim($_POST['dni']));
$cena=$dni*400;
if ($dni<=0)
{
    echo 'Количество дней должно быть больше нуля';
}
elseif ($strana=='Египет')
{
    $cena+=($cena/100*10);
}
elseif ($strana=='Италия')
{
    $cena+=($cena/100*12);
}
else $cena*=1;
if (isset($_POST['skidka']))
{
    $cena-=($cena/100*5);
}
else $cena+=0;
echo "Стоимость отдыха: $cena".'<br>'.'<br>';
echo '<b><ins>2) МассивывPHP</ins></b>'.'<br>'.'<br>';
echo '<dfn>2.1 Массивы</dfn>'




?>


</body>
</html>
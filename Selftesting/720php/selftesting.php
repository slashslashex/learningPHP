<?php
require_once 'blocks/header720.php'
?>
<h1>Самотестирование</h1>
<h2>Задачи взяты отсюда:
    <a href="https://php720.com/tasks">php720.com</a>
</h2>
<b><dfn>Задание 1. Найти сумму цифр числа</dfn></b>
<br><br>
<b>Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем. Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
    По желанию можете сделать проверку на корректность введения данных пользователем.</b>
    <form method="post">
        <input type="number" name="number" required placeholder="Введите число">
        <button type="submit">Решить</button>
    </form>
<?php
$nums=htmlspecialchars(trim($_POST['number']));
function sum_of_digits($nums)
{
    $digits=0;
    for ($i=0;$i<strlen($nums);$i++)
    {
        $digits+=$nums[$i];
    }return $digits;
}
if ($nums=='')
{
    echo 'Поле не должно быть пустым';
}
elseif ($nums<=9)
{
    echo 'Число должно быть более 9';
}
    else
    {
        echo "Сумма цифр  числе $nums равна ".sum_of_digits($nums);
    }
?>
<!--Ответ задачника:-->
<!--// число-->
<!--$number = "1547";-->
<!---->
<!--// сюда будем записывать сумму-->
<!--$sum = 0;-->
<!---->
<!--// получаем сумму цифр числа-->
<!--// доступ к каждой цифре числа можно получить через оператор доступа элементов массива-->
<!--for ($i = 0; $i < strlen($number); $i++) {-->
<!--    $sum += $number[$i];-->
<!--}-->
<!---->
<!--// выводим данные-->
<!--echo "Число: {$number}\n";-->
<!--echo "Сумма: {$sum}";-->
<br><br>
    <b><dfn>Задание 2. Проверить количество вхождения цифры в число</dfn></b>
<br><br>
<b>Вам нужно разработать программу, которая считала бы количество вхождений какой-нибуть выбранной вами цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза</b>
<br>
<form method="post">
    <input type="number" name="cifra" required placeholder="Введите цифру">
    <input type="number" name="chislo" required placeholder="Введите число">
    <button type="submit">Найти количество</button>
</form>
<?php
$cifra=htmlspecialchars(trim($_POST['cifra']));
$chislo=htmlspecialchars(trim($_POST['chislo']));
$schet=substr_count($chislo, $cifra);
if ($cifra==''||$chislo=='')
{
    echo 'Поля не должны быть пустыми';
}
elseif ($cifra>=9)
{
    echo 'Цифра должна быть не более 9';
}
else echo "Количество цифр: $schet";
//задачник ответа не дал

?>
    <br>
    <br>
    <b><dfn>Задание 3. Найти сумму чисел, которые делятся на 5</dfn></b>
<br><br>
<b>Разработайте программу, которая из чисел от Х до У находила те, которые делятся на Z и найдите сумму этих чисел. Рекомендую использовать функцию fmod для определения "делится число" или "не делится".</b>
<form method="post">
    <input type="number" name="ot" required placeholder="От">
    <input type="number" name="do" required placeholder="До">
    <input type="number" name="divider" required placeholder="Делитель">
    <button type="submit">Решить</button>
</form>
<?php
$ot=htmlspecialchars(trim($_POST['ot']));
$do=htmlspecialchars(trim($_POST['do']));
$divider=htmlspecialchars(trim($_POST['divider']));
for ($x=$ot;$x<=$do;$x++)
{
    $result=fmod(floatval($x),floatval($divider));
    if($result==0) $arr[]=$x;
}
if ($arr==[])
{
    echo '';
}
else
{
    echo 'Числа: ';
}
foreach ($arr as $value)
{
    echo "$value ";
}
$summ=array_sum($arr);
if ($ot=='' || $do=='' || $divider=='')
{
    echo 'Поля не должны быть пустыми';
}
elseif ($divider<=0)
{
    echo 'Делитель должен быть больше нуля';
}
elseif ($ot<0 || $do<0)
{
    echo 'Диапазон не должен быть отрицательным';
}
else echo "<br>Сумма чисел равна $summ";
//Решение, которое даёт задачник
//$start = 20;
//$end = 45;
//$sum = 0;
//
//// Числа от 20 до 45
//for ($i = $start; $i <= $end; $i++) {
//    if (fmod($i, 5) == 0) {
//        $sum += $i;
//    }
//}
//echo "Сумма: {$sum}\n";
?>
<br><br>
    <b><dfn>Задание 4. Найти максимальное и минимальное значение массива</dfn></b>
<br><br>
<b>Ваше задание — создать массив, наполнить его случайными значениями (можно использовать функцию rand), найти максимальное и минимальное значение массива и поменять их местами.</b>
<br>
<ins>Задайте диапазон чисел массива и количество выборки</ins><br>
<form method="post">
    <input type="number" name="ot" required placeholder="От">
    <input type="number" name="do" required placeholder="До">
    <input type="number" name="quantity" required placeholder="Количество">
    <button type="submit">Выполнить</button>
</form>
<?php
$ot=htmlspecialchars(trim($_POST['ot']));
$do=htmlspecialchars(trim($_POST['do']));
$quant=htmlspecialchars(trim($_POST['quantity']));
$arr=range($ot, $do);
$rand=array_rand($arr, $quant);
shuffle($rand);
$minkey=array_search(min($rand), $rand);
$maxkey=array_search(max($rand), $rand);
$minval=min($rand);
$maxval=max($rand);
if ($ot=='' || $do=='' ||$quant=='')
{
    echo 'Поля не должны быть пустыми';
}
elseif ($ot<0 || $do<0)
{
    echo 'Диапазон не может быть отрицательным';
}
elseif ($quant<2)
{
    echo 'Количество не может быть меньше двух';
}
elseif ($do<=$ot)
{
    echo 'Конец диапазона должен быть больше начала диапазона';
}
elseif ($quant>$do-$ot)
{
    echo 'Количество не может превышать диапазон';
}
else {
    echo 'Ваш массив: ' . '<br>' . '<pre>';
    print_r($rand);
    echo '</pre>' . '<br>';
    echo "Минимальное значение: $minval<br>";
    echo "Максимальное значение: $maxval<br>";
    echo 'Меняем местами максимальное и минимальное значения:' . '<br>';
    list($rand[$minkey], $rand[$maxkey]) = [$rand[$maxkey], $rand[$minkey]];
//    $buffer = $minkey;
//    $rand[$minkey] = $rand[$maxkey];
//    $rand[$maxkey] = $rand[$buffer];
//    буфер почему - то не сработал
    echo '<pre>';
    print_r($rand);
    echo '</pre>' . '<br>';
}
//задачник решения не дал
?>

<br><br>
<?php
if($_GET['?']!="")
{
    $link = explode("?", $_SERVER['REQUEST_URI']);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $link[0];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
}
require_once 'blocks/footer720.php'
?>
<!--Глава 3. Управляющая логика для принятия решений и повторения операций-->
Пример 3.1. Принятие решения с помощью языковой конструкции if()
<br>
<?php
$logged_in=true;
if ($logged_in)
{
print "Welcome aboard, trusted user.";
}
?>
<br>
<hr>
Пример 3.2. Выполнение ряда операторов в блоке кода языковой конструкции if()
<br>
<?php
print "This is always printed.";
if ($logged_in)
{
print "Welcome aboard, trusted user.";
print 'This is only printed if $logged_in is true.';
}
print "This is also always printed.";
?>
<br>
Пример 3.3. Применение предложения else в условном операторе if()
<br>
<?php
if ($logged_in)
{
print "Welcome aboard, trusted user.";
}
else
{
print "Howdy, stranger.";
}
?>
<br>
Пример 3.4. Применение языковой конструкции elseif()
<br>
<?php
if ($logged_in)
{
// Следующая строка кода выполняется, если проверочное
// условие $logged_in истинно
print "Welcome aboard, trusted user.";
}
elseif ($new_messages)
{
// Следующая строка кода выполняется, если проверочное
// условие $logged_in ложно, но проверочное условие
// $new_messages истинно
print "Dear stranger, there are new messages.";
}
elseif ($emergency)
{
// Следующая строка кода выполняется, если оба
// проверочных условия, $logged_in и $new_messages, ложны,
// но проверочное условие $emergency истинно
print "Stranger, there are no new messages,
but there is an emergency.";
}
?>
<br>
Пример 3.5. Сочетание условных операторов else и elseif()
<br>
<?php
if ($logged_in)
{
// Следующая строка кода выполняется, если проверочное
// условие $logged_in истинно
print "Welcome aboard, trusted user.";
}
elseif ($new_messages)
{
// Следующая строка кода выполняется, если проверочное
// условие $logged_in ложно, но проверочное условие
// $new_messages истинно
print "Dear stranger, there are new messages.";
}
elseif ($emergency)
{
// Следующая строка кода выполняется, если оба
// проверочных условия, $logged_in и $new_messages, ложны,
// но проверочное условие $emergency истинно
print "Stranger, there are no new messages,
but there is an emergency.";
}
else
{
// Следующая строка кода выполняется, если все проверочные
// условия, $logged_in, $new_messages и $emergency, ложны
print "I don't know you, you have no messages,
and there's no emergency.";
}
?>
<br>
Пример 3.6. Операция сравнения на равенство
<br>
<?php
$new_messages=10;
$max_messages=20;
$dinner='Braised Scallops';
if ($new_messages == 10)
{
print "You have ten new messages.";
}
if ($new_messages == $max_messages)
{
print "You have the maximum number of messages.";
}
if ($dinner == 'Braised Scallops')
{
print "Yum! I love seafood.";
}
?>
<br>
Пример 3.7. Операция сравнения на неравенство
<br>
<?php
$new_messages=20;

$dinner='';
if ($new_messages != 10)
{
print "You don't have ten new messages.";
}
if ($dinner != 'Braised Scallops')
{
print "I guess we're out of scallops.";
}
?>
<br>
Пример 3.8. Операции сравнения на “меньше или равно” и “больше или равно”
<?php
$age=20;
$celsius_temp=-5;
$kelvin_temp=10;
if ($age > 17) {
print "You are old enough to download the movie.";
}
if ($age >= 65) {
print "You are old enough for a discount.";
}
if ($celsius_temp <= 0) {
print "Uh-oh, your pipes may freeze.";
}
if ($kelvin_temp < 20.3) {
print "Your hydrogen is a liquid or a solid now.";
}
?>
<br>
Пример 3.9. Сравнение чисел с плавающей точкой
<br>
<?php
$price_1=1;
$price_2=2;
if(abs($price_1 - $price_2) < 0.00001)
{
print '$price_1 and $price_2 are equal.';
}
else
{
print '$price_1 and $price_2 are not equal.';
}
?>
<br>
Пример 3.10. Сравнение символьных строк
<br>
<?php
$word='zpp';
if ($word < 'baa')
{
print "Your word isn't cookie.";
}
if ($word >= 'zoo')
{
print "Your word could be zoo or zymurgy, but not zone.";
}
?>
<br>
Пример 3.11. Сравнение чисел и символьных строк
<br>
<?php
// Следующие значения сравниваются в лексикографическом порядке
if ("х54321"> "х5678")
{
print 'The string "х54321" is greater than the string "x5678".';
}
else
{
print 'The string "x54321" is not greater than the string "x5678".';
}
// Следующие значения сравниваются в числовом порядке
if ("54321" > "5678")
{
print 'The string "54321" is greater than the string "5678".';
}
else
{
print 'The string "54321" is not greater than the string "5678".';
}
// Следующие значения сравниваются в лексикографическом порядке
if ('6 pack' < '55 card stud')
{
print 'The string "6 pack" is less than the string "55 card stud".';
}
else
{
print 'The string "6 pack" is not less than the string "55 card stud".';
}
// Следующие значения сравниваются в числовом порядке
if ('6 pack' < 55)
{
print 'The string "6 pack" is less than the number 55.';
}
else
{
print 'The string "6 pack" is not less than the number 55.';
}
?>
<br>
Пример 3.12. Сравнение символьных строк с помощью функции strcmp()
<?php
$х = strcmp("х54321","х5678");
if ($х > 0)
{
print 'The string "х54321" is greater than the string "x5678".';
}
elseif ($х < 0)
{
print 'The string "x54321" is less than the string "x5678".';
}
$x = strcmp("54321","5678");
if ($x > 0)
{
print 'The string "54321" is greater than the string "5678".';
}
elseif ($x < 0)
{
print 'The string "54321" is less than the string "5678".';
}
$х = strcmp('6 pack','55 card stud');
if ($x > 0) {
print 'The string "6 pack" is greater than the string "55 card stud".';
}
elseif ($x < 0)
{
print 'The string "6 pack" is less than the string "55 card stud".';
}
$x = strcmp('6 pack',55);
if ($x > 0)
{
print 'The string "6 pack" is greater than the number 55.';
}
elseif ($x < 0)
{
print 'The string "6 pack" is less than the number 55.';
}
?>
<br>
Пример 3.13. Сравнение разных типов данных с помощью составной операции типа
"космический корабль"
<br>
<?php
// Переменной $а присваивается отрицательное число,
// поскольку 1 меньше 12.7
$а = 1 <=> 12.7;
// Переменной $b присваивается положительное число,
// поскольку символ "c" следует после символа "b"
$b = "charlie" <=> "bob";
// Сравнение числовых символьных строк осуществляется аналогично
// операциям сравнения < и >, но не функции strcmp()
$х = '6 pack' <=> '55 card stud';
if ($х > 0)
{
print 'The string "6 pack" is greater than
the string "55 card stud".';
}
elseif ($х < 0)
{
print 'The string "6 pack" is less than
the string "55 card stud".';
}
// Сравнение числовых символьных строк осуществляется аналогично
// операциям сравнения < и >, но не функции strcmp()
$х ='6 pack' <=> 55;
if ($х > 0)
{
print 'The string "6 pack" is greater than the number 55.';
}
elseif ($х < 0)
{
print 'The string "6 pack" is less than the number 55.';
}
?>
<br>
Пример 3.14. Применение операции отрицания
<br>
<?php
$finished=false;
// Все проверочное выражение ($finished == false)
// истинно, если значение переменной $finished равно false
if ($finished == false)
{
print 'Not done yet!';
}
// Все проверочное выражение (! $finished) истинно,
// если значение переменной $finished равно false
if (! $finished)
{
print 'Not done yet!';
}
?>
<br>
Пример 3.15. Операция отрицания
<br>
<?php
$first_name='wer';
$last_name='wer';
if (! strcasecmp($first_name, $last_name))
{
print '$first_name and $last_name are equal.';
}
?>
<br>
Пример 3.16. Логические операции
<br>
<?php
$age=20;
$meal='breakfast';
$dessert='souffle';
if (($age >= 13) && ($age < 65))
{
print "You are too old for a kid's discount and too
young for the senior's discount.";
}
if (($meal == 'breakfast') || ($dessert == 'souffle'))
{
print "Time to eat some eggs.";
}
?>
<br>
Пример 3.17. Вывод на экран списка, размечаемого дескриптором <\select>, в цикле, организуемом с помощью конструкции while()
<br>
<?php
$i = 1;
print '<select name="people">';
while ($i <= 10)
{
print "<option>$i</option>";
$i++;
}
print '</select>';
?>
<br>
Пример 3.18. Вывод на экран списка, размечаемого дескриптором <\select>, в цикле, организуемом с помощью конструкции for()
<br>
<?php
print '<select name="people">';
for ($i = 1; $i <= 10; $i++)
{
print "<option>$i</option>";
}
print '</select>';
?>
<br>
Пример 3.19. Применение нескольких выражений в конструкции цикла for()
<br>
<?php
print '<select name="doughnuts">';
for ($min = 1, $max = 10; $min < 50; $min += 10, $max +=10)
{
    print "<option>$min - $max</option>";
}
print '</select>';
?>







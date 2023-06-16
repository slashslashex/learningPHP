<!--Глава 2. Обработка числовых и текстовых данных-->
Пример 2.1. Встраиваемый документ
<?php
<<<HTMLBLOCK
<html>
<head><title>Menu</title></head>
<body bgcolor="#fffed9">
<h1>Dinner</h1>
<ul>
    <li> Beef Chow-Fun
    <li> Sauteed Pea Shoots
    <li> Soy Sauce Noodles </ul>
</body>
</html>
HTMLBLOCK
?>
Пример 2.2. Вывод встраиваемого документа на экран
<?php
print <<<HTMLBLOCK
<html>
<head><title>Menu</title></head>
<body bgcolor="#fffed9">
<h1>Dinner</h1>
<ul>
    <li> Beef Chow-Fun
    <li> Sauteed Pea Shoots
    <li> Soy Sauce Noodles
</ul>
</body>
</html>
HTMLBLOCK;
?>
Пример 2.3. Проверка длины усеченной символьной строки
<?php
// Переменная $_POST['zipcode'] содержит значение параметра
// "zipcode" из переданной на обработку формы
$zipcode = trim($_POST['zipcode']);
// А теперь это значение с удаленными начальными и конечными
// пробелами содержит переменная $zipcode
$zip_length = strlen($zipcode);
// выдать предупреждение, если указан почтовый индекс
// длиной меньше 5 символов
if ($zip_length != 5) {
print "Please enter a zip code that is 5 characters long.";
}
?>
Пример 2.4. Более краткая форма проверки длины усеченной символьной строки
<?php
if (strlen(trim($_POST['zipcode'])) != 5) {
print "Please enter a zip code that is 5 characters long.";
}
?>
Пример 2.5. Сравнение символьных строк с помощью операции равенства
<?php
if ($_POST['email'] == 'president@whitehouse.gov') {
print "Welcome, US President.";
}
?>
Пример 2.6. Сравнение символьных строк без учета регистра
<?php
if (strcasecmp($_POST['email'], 'president@whitehouse.gov') == 0) {
print "Welcome back, OS President.";
}
?>
Пример 2.7. Форматированный вывод цены с помощью функции printf()
<?php
$price = 5; $tax = 0.075;
printf('The dish costs $%.2f', $price * (1 + $tax));
?>
Пример 2.8. Заполнение нулями значения, выводимого на экран с помощью функции printf()
<?php
$zip = '6520';
$month = 2;
$day = 6;
$year = 2007;
printf("ZIP is %05d and the date is %02d/%02d/%d",
$zip, $month, $day, $year);
?>
Пример 2.9. Отображение чисел со знаками с помощью функции printf()
<?php
$min = -40;
$max = 40;
printf("The computer can operate between %+d and %+d degrees Celsius.",
$min, $max);
?>
Пример 2.10. Смена регистра букв
<?php
print strtolower('Beef, CHICKEN, Pork, duCK');
print strtoupper('Beef, CHICKEN, Pork, duCK');
?>
Пример 2.11. Выделение имен заглавными буквами с помощью функции ucwords()
<?php
print ucwords(strtolower('JOHN FRANKENHEIMER'));
?>
Пример 2.13. Извлечение конца символьной строки с помощью функции substr()
<?php
print 'Card: XX';
print substr($_POST['card'], -4,4);
?>
Пример 2.14. Применение функции str_replace()
<?php
$my_class='lunch';
$html = '<span class="class">Fried Bean Curd<span>
<span class="class">Oil-Soaked Fish</span>';
print str_replace('class', $my_class, $html);
?>
Пример 2.17. Операции над переменными
<?php
$price = 3.95;
$tax_rate = 0.08;
$tax_amount = $price * $tax_rate;
$total_cost = $price + $tax_amount;
$username = 'james';
$domain = '@example.com';
$email_address = $username . $domain;
print 'The tax is ' . $tax_amount;
print "\n"; // вывести разрыв строки
print 'The total cost is ' .$total_cost;
print "\n"; // вывести разрыв строки
print $email_address;
?>
Пример 2.18. Сочетание операции присваивания с арифметической операцией
<?php
// прибавить число 3 обычным способом
$price = $price + 3;
// прибавить число 3 с помощью составной операции
$price += 3;
?>
Пример 2.19. Сочетание операций присваивания и сцепления символьных строк
<?php
$username = 'james';
$domain = '@example.com';
// присоединить символьную строку из переменной $domain в
// конце строки из переменной $username обычным способом
$username = $username . $domain;
// сцепить символьные строки с помощью составной операции
$username .= $domain;
?>
Пример 2.20. Инкрементирование и декрементирование
<?php
// прибавить 1 к значению переменной $birthday
$birthday = $birthday + 1;
// прибавить еще одну 1 к значению переменной $birthday
++$birthday;
// вычесть 1 из значения переменной $years_left
$years_left = $years_left - 1;
// вычесть еще одну 1 из значения переменной $years_left
--$years_left;
?>
Пример 2.21. Вставка переменной
<?php
$email = 'jacob@example.com';
print "Send replies to: $email";
?>
Пример 2.22. Вставка в длинный блок
<?php
$page_title = 'Menu';
$meat = 'pork';
$vegetable = 'bean sprout';
print <<<MENU
<html>
<head><title>$page_title</title></head>
<body>
<ul>
<li> Barbecued $meat
<li> Sliced $meat
<li> Braised $meat with $vegetable </ul>
</body>
</html>
MENU;
?>
Пример 2.23. Вставка переменной в фигурных скобках
<?php
$preparation = 'Braise';
$meat = 'Beef';
print "$preparation $meat with Vegetables";
?>









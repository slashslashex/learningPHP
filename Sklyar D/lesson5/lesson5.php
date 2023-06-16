<!--ГЛАВА 5 Группирование логики в функциям и файлам-->
<?php
print 'Пример 5.1. Объявление функции<br>';
$user='Admin';
function page_header()
{
    print '<html><head><title>Welcome to my site</title></head>';
    print '<body bgcolor="#ffffff">';
}
print '<br>';
print 'Пример 5.2. Вызов функции<br>';
page_header();
print "Welcome, $user";
print "</body></html>";
print '<br>';
print 'Пример 5.3. Объявление функций до и после их вызова';
print '<br>';
function page_header2()
{
    print '<html><head><title>Welcome to my site</title></head>';
    print '<body bgcolor="#ffffff">';
}
page_header2();
print "Welcome, $user";
page_footer();
function page_footer()
{
    print '<hr>Thanks for visiting.';
    print ' </body></html>';
}
print '<br>';
print 'Пример 5.4. Объявление функции с одним аргументом';
print '<br>';
function page_header22($color)
{
    print '<html><head><title>Welcome to my site</title></head>';
    print '<body bgcolor="#' . $color . '">';
}
print '<br>';
print 'Пример 5.5. Указание значения аргумента функции, устанавливаемого по умолчанию';
print '<br>';
function page_header3($color = 'сс3399')
{
    print '<html><head><title>Welcome to my site</title></head>';
    print '<body bgcolor="#' . $color . '">';
}
print '<br>';
print 'Пример 5.6. Объявление функции с двумя аргументами';
print '<br>';
function page_header4($color, $title)
{
    print '<html><head><title>Welcome to ' . $title . '</title></head>';
    print '<body bgcolor="#' . $color . '">';
}
print '<br>';
print 'Пример 5.7. Вызов функции с двумя аргументами';
print '<br>';
    page_header4('66сс66','my homepage');
print '<br>';
print 'Пример 5.8. Объявление функций с несколькими необязательными аргументами';
print '<br>';
// Объявление функции с одним необязательным аргументом,
// который должен быть указан последним
function page_header5($color, $title, $header = 'Welcome') {
    print '<html><head><title>Welcome to ' . $title . '</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// Допустимые способы вызова данной функции:
page_header5('66сс99','my wonderful page');
// В этом вызове используется значение аргумента $header,
// устанавливаемое по умолчанию
page_header5('66сс99','my wonderful page','This page is great!');
// В этом вызове значение по умолчанию не используется
// Объявление функции с двумя необязательными аргументами,
// которые должны быть указаны последними
function page_header6($color, $title = 'the page',
                      $header = 'Welcome')
{
    print '<html><head><title>Welcome to ' . $title . '</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// Допустимые способы вызова данной функции:
page_header6('66сс99'); // В этом вызове используются значения
// аргументов $title и $header, устанавливаемые по умолчанию
page_header6('66сс99','my wonderful page');
// В этом вызове используется значение аргумента $header,
// устанавливаемое по умолчанию
page_header6('66сс99','my wonderful page','This page is great!');
// В этом вызове значения по умолчанию не используются
// Объявление функции со всеми тремя необязательными аргументами
function page_header7($color = '336699', $title = 'the page',
                      $header = 'Welcome')
{
    print '<html><head><title>Welcome to ' . $title . '</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// Допустимые способы вызова данной функции:
page_header7(); // В этом вызове используются значения всех
// аргументов, устанавливаемые по умолчанию
page_header7('66сс99'); // В этом вызове используются значения
// аргументов $title и $header, устанавливаемые по умолчанию
page_header7('66сс99', 'my wonderful page'); // В этом вызове
// используется значение аргумента $header,
// устанавливаемое по умолчанию
page_header7('66сс99','my wonderful page','This page is great!');
// В этом вызове значения по умолчанию не используются
print '<br>';
print 'Пример 5.9. Изменение значений аргументов в функции';
print '<br>';
function countdown($top)
{
    while ($top > 0)
    {
        print "$top..";
        $top--;
    }
    print "boom!<br>";
}
$counter = 5;
countdown($counter);
print "Now, counter is $counter";
print '<br>';
print 'Пример 5.10. Сохранение значения, возвращаемого функцией';
print '<br>';
    $number_to_display = number_format(321442019);
print "The population of the US is about: $number_to_display";
print '<br>';
print 'Пример 5.11. Возврат значения из функции';
print '<br>';
function restaurant_check($meal, $tax, $tip)
{
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}
print '<br>';
print 'Пример 5.12. Применение возвращаемого значения в условном операторе if()';
print '<br>';
// Рассчитать общую стоимость трапезы на 15,22 долларов США
// с учетом налога на добавленную стоимость (8.25%) и чаевых (15%)
    $total = restaurant_check(15.22, 8.25, 15);
print 'I only have $20 in cash, so...';
if ($total > 20)
{
    print "I must pay with my credit card.";
}
else
{
    print "I can pay with cash.";
}
print '<br>';
print 'Пример 5.13. Возврат массива из функции';
print '<br>';
function restaurant_check2($meal, $tax, $tip)
{
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_notip = $meal + $tax_amount;
    $total_tip = $meal + $tax_amount + $tip_amount;
    return array($total_notip, $total_tip);
}
print '<br>';
print 'Пример 5.14. Применение массива, возвращаемого функцией';
print '<br>';
    $totals = restaurant_check2(15.22, 8.25, 15);
if ($totals[0] < 20)
{
    print 'The total without tip is less than $20.<br>';
}
if ($totals[1] < 20)
{
    print 'The total with tip is less than $20.';
}
print '<br>';
print 'Пример 5.15. Применение нескольких операторов return в функции';
print '<br>';
function payment_method($cash_on_hand, $amount)
{
    if ($amount > $cash_on_hand)
    {
        return 'credit card';
    } else
    {
        return 'cash';
    }
}
print '<br>';
print 'Пример 5.16. Передача возвращаемого значения другой функции';
print '<br>';
$total = restaurant_check(15.22, 8.25, 15);
$method = payment_method(20, $total);
print 'I will pay with ' . $method;
print '<br>';
print 'Пример 5.17. Применение возвращаемых значений в условном операторе if()';
print '<br>';
    if (restaurant_check(15.22, 8.25, 15) < 20)
    {
        print 'Less than $20, I can pay cash.';
    }
    else
    {
        print 'Too expensive, I need my credit card.';
    }
print '<br>';
print 'Пример 5.18. Возврат логического значения true или false из функции';
print '<br>';
function can_pay_cash($cash_on_hand, $amount)
{
    if ($amount > $cash_on_hand)
    {
        return false;
    }
    else
    {
        return true;
    }
}
$total = restaurant_check(15.22,8.25,15);
if (can_pay_cash(20, $total))
{
    print "I can pay in cash.";
}
else
{
    print "Time for the credit card.";
}
print '<br>';
print 'Пример 5.19. Сочетание вызова функции с операцией присваивания проверочном выражении';
print '<br>';
function complete_bill($meal, $tax, $tip, $cash_on_hand)
{
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    if ($total_amount > $cash_on_hand)
    {
// Счет больше, чем имеется наличных
        return false; } else
        {
// этот счет можно оплатить наличными
        return $total_amount;
    }
}
if ($total = complete_bill(15.22, 8.25, 15, 20))
{
    print "I'm happy to pay $total.";
}
else
{
    print "I don't have enough money. Shall I wash some dishes?";
}
print '<br>';
print 'Пример 5.20. Область действия переменных';
print '<br>';
$dinner = 'Curry Cuttlefish';
function vegetarian_dinner()
{
    $dinner = 'Curry Cuttlefish';
    print "Dinner is $dinner, or ";
    $dinner = 'Sauteed Pea Shoots';
    print $dinner;
    print "<br>";
}
function kosher_dinner()
{
    $dinner = 'Curry Cuttlefish';
    print "Dinner is $dinner, or ";
    $dinner = 'Kung Pao Chicken';
    print $dinner;
    print "<br>";
}
print "Vegetarian ";
vegetarian_dinner();
print "Kosher ";
kosher_dinner();
print "Regular dinner is $dinner";
print '<br>';
print 'Пример 5.21. Доступ к глобальным переменным из массива $GLOBALS';
print '<br>';
function macrobiotic_dinner()
{
    $dinner = "Some Vegetables";
    print "Dinner is $dinner";
// насладиться дарами океана
    print " but I'd rather have ";
    print $GLOBALS['dinner'];
    print "<br>";
}
macrobiotic_dinner();
print "Regular dinner is: $dinner";
print '<br>';
print 'Пример 5.22. Видоизменение глобальной переменной в массиве $GLOBALS';
print '<br>';
$dinner = 'Curry Cuttlefish';
function hungry_dinner()
{
    $GLOBALS['dinner'] .= ' and Deep-Fried Taro';
}
print "Regular dinner is $dinner";
print "<br>";
hungry_dinner();
print "Hungry dinner is $dinner";
print '<br>';
print 'Пример 5.23. Доступ к глобальным переменным с помощью ключевого слова global';
print '<br>';
$dinner = 'Curry Cuttlefish';
function vegetarian_dinner2()
{
    global $dinner;
    print "Dinner was $dinner, but now it's ";
    $dinner = 'Sauteed Pea Shoots';
    print $dinner;
    print "<br>";
}
print "Regular Dinner is $dinner.\n";
vegetarian_dinner2();
print "Regular dinner is $dinner";
print '<br>';
print 'Пример 5.24. Объявление типа аргумента';
print '<br>';
function countdown2(int $top)
{
    while ($top > 0)
    {
        print "$top..";
        $top--;
    }
    print "boom!<br>";
}
$counter = 5;
countdown2($counter);
print "Now, counter is $counter";
print '<br>';
print 'Пример 5.25. Объявление возвращаемого типа';
print '<br>';
function restaurant_check3($meal, $tax, $tip): float
{
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}
print '<br>';
print 'Пример 5.26. Определение функций в отдельном файле';
print '<br>';
    /*

    <?php
    function restaurant_check($meal, $tax, $tip) {
        $tax_amount = $meal * ($tax / 100);
        $tip_amount = $meal * ($tip / 100);
        $total_amount = $meal + $tax_amount + $tip_amount;
        return $total_amount;
    }
    function payment_method($cash_on_hand, $amount) {
        if ($amount > $cash_on_hand) {
            return 'credit card'; } else {
            return 'cash'; } }
    ?>
     */
print '<br>';
print 'Пример 5.27. Обращение к отдельному файлу в исходном коде';
print '<br>';
    require 'restaurant-functions.php';
/* Счет на 25 долларов США плюс налог на добавленную
стоимость (8,875%) и чаевые (20%) */
$total_bill = restaurant_check99(25, 8.875, 20);
/* Имеется 30 долларов США наличными */
$cash = 30;
print "I need to pay with " . payment_method99($cash, $total_bill);
?>
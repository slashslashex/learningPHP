<!--ГЛАВА 4 Группирование и обработка данных в массивах-->
<?php
print 'Пример 4.1. Создание массивов';
print '<br>';
$vegetables = array('corn' => 'yellow', 'beet' => 'red', 'carrot' => 'orange');
$dinner = array(0 => 'Sweet Corn and Asparagus',
    1 => 'Lemon Chicken',
    2 => 'Braised Bamboo Fungus');
$computers = array('trs-80' => 'Radio Shack',
    2600 => 'Atari', 'Adam' => 'Coleco');
print 'Пример 4.2. Применение сокращенного синтаксиса массивов';
print '<br>';
$vegetables = ['corn' => 'yellow', 'beet' => 'red', 'carrot' => 'orange'];
$dinner = [0 => 'Sweet Corn and Asparagus',
    1 => 'Lemon Chicken',
    2 => 'Braised Bamboo Fungus'];
$computers = ['trs-80' => 'Radio Shack', 2600 => 'Atari', 'Adam' => 'Coleco'];
print 'Пример 4.3. Создание массива поэлементно';
// Массив $vegetables со строковыми ключами
$vegetables['corn'] = 'yellow';
$vegetables['beet'] = 'red';
$vegetables['carrot'] = 'orange';
// Массив $dinner с числовыми ключами
$dinner[0] = 'Sweet Corn and Asparagus';
$dinner[1] = 'Lemon Chicken';
$dinner[2] = 'Braised Bamboo Fungus';
// Массив $computers с числовыми и строковыми ключами
$computers['trs-80'] = 'Radio Shack';
$computers[2600] = 'Atari';
$computers['Adam'] = 'Coleco';
print '<br>';
print 'Пример 4.4. Взаимное превращение скалярных и нескалярных величин';
// Создание массива $vegetables
$vegetables['corn'] = 'yellow';
// Бесследное удаление строк "corn" и "yellow" и
// создание скалярной переменной $vegetables
$vegetables = 'delicious';
// Создание скалярной переменной $fruits
$fruits = 283;
// Не пройдет! Значение 283 по-прежнему остается в
// переменной $fruits, а интерпретатор РНР выдает предупреждение
//$fruits['potassium'] = 'banana';
// А в данном случае содержимое переменной $fruits
// перезаписывается, и она становится массивом
$fruits = array('potassium' => 'banana');
//Пример 4.5. Создание числовых массивов с помощью языковой конструкции array()
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
print "I want $dinner[0] and $dinner[1]";
print '<br>';
print 'Пример 4.6. Ввод в массив новых элементов с помощью сокращенного синтаксиса';
// Создать массив $lunch, состоящий из двух элементов.
// В следующей строке кода задается первый элемент
// массива $lunch[0]
$lunch[] = 'Dried Mushrooms in Brown Sauce';
// В следующей строке кода задается второй элемент
// массива $lunch[1]
$lunch[] = 'Pineapple and Yu Fungus';
// Создать массив $dinner, состоящий из трех элементов
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
// Ввести новый элемент в конце массива $dinner.
//В следующей строке кода задается четвертый элемент
// массива $dinner[3]
$dinner[] = 'Flank Skin with Spiced Flavor';
print '<br>';
print 'Пример 4.7. Определение размера массива';
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
$dishes = count($dinner);
print '<br>';
print "There are $dishes things for dinner.";
print '<br>';
print 'Пример 4.8. Перебор массива с помощью языковой конструкции foreach()';
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "<table>\n";
foreach ($meal as $key => $value) {
print "<tr><td>$key</td><td>$value</td></tr>\n";
}
print '</table>';
print '<br>';
print 'Пример 4.9. Вывод HTML-таблицы с чередованием классов CSS';
$row_styles = array('even','odd');
$style_index = 0;
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "<table>\n";
foreach ($meal as $key => $value) {
print "<tr class=$row_styles[$style_index]>";
print "<td>$key</td><td>$value</td></tr>\n";
// Смена значения переменной $style_index с 0 на 1, и обратно
$style_index = 1 - $style_index;
}
print '</table>';
print '<br>';
print 'Пример 4.10. Модификация массива с помощью языковой конструкции foreach()';
print '<br>';
$meals = array('Walnut Bun' => 1,
'Cashew Nuts and White Mushrooms' => 4.95,
'Dried Mulberries' => 3.00,
'Eggplant with Chili Sauce' => 6.50);
foreach ($meals as $dish => $price) {
// выражение $price = $price * 2 HE пройдет!
$meals[$dish] = $meals[$dish] * 2;
}
// перебрать массив снова и вывести измененные
// значения его элементов
foreach ($meals as $dish => $price)
{
printf("The new price of %s is \$%.2f<br>",$dish,$price);
}
print '<br>';
print '<br>';
print 'Пример 4.11. Применение языковой конструкции foreach() для перебора числовых массивов';
print '<br>';
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
foreach ($dinner as $dish)
{
print "You can eat: $dish<br>";
}
print '<br>';
print '<br>';
print 'Пример 4.12. Перебор числового массива с помощью языковой конструкции for()';
print '<br>';
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++)
{
print "Dish number $i is $dinner[$i]<br>";
}
print '<br>';
print '<br>';
print 'Пример 4.13. Чередование классов CSS в строках HTML-таблицы с помощью языковой конструкции for()';
print '<br>';
$row_styles = array('even', 'odd');
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
print "<table>";
for ($i = 0, $num_dishes = count($dinner);
$i < $num_dishes; $i++)
{
print '<tr class="$row_styles[$i % 2]">';
print "<td>Element $i</td><td>$dinner[$i]</td></tr>\n";
}
print '</table>';
print '<br>';
print 'Пример 4.14. Порядок вывода элементов массива в цикле, организуемом с помощью языковой конструкции foreach()';
print '<br>';
$letters[0] = 'А';
$letters[1] = 'В';
$letters[3] = 'D';
$letters[2] = 'С';
foreach ($letters as $letter)
{
print $letter;
print '<br>';
}
//Чтобы гарантировать доступ к элементам массива в числовом порядке следования их ключей,
//достаточно перебрать массив в цикле, организуемом с помощью языковой конструкции for(), следующим образом:
for ($i = 0, $num_letters = count($letters);
$i < $num_letters; $i++)
{
print $letters[$i];
}
print '<br>';
print 'Пример 4.15. Проверка наличия элемента в массиве по конкретному ключу';
print '<br>';
$meals = array('Walnut Bun' => 1,
'Cashew Nuts and White Mushrooms' => 4.95,
'Dried Mulberries' => 3.00,
'Eggplant with Chili Sauce' => 6.50,
'Shrimp Puffs' => 0); // Shrimp Puffs are free!
$books = array("The Eater's Guide to Chinese Characters",
'How to Cook and Eat in Chinese');
// Следующая проверка дает истинное значение
if (array_key_exists('Shrimp Puffs',$meals))
{
print "Yes, we have Shrimp Puffs";
}
print '<br>';
// Следующая проверка дает ложное значение
if (array_key_exists('Steak Sandwich',$meals))
{
print "We have a Steak Sandwich";
}
print '<br>';
// Следующая проверка дает истинное значение
if (array_key_exists(1, $books))
{
print "Element 1 is How to Cook and Eat in Chinese";
}
print '<br>';
print 'Пример 4.16. Проверка наличия в массиве элемента с конкретным значением';
print '<br>';
$meals = array('Walnut Bun' => 1,
'Cashew Nuts and White Mushrooms' => 4.95,
'Dried Mulberries' => 3.00,
'Eggplant with Chili Sauce' => 6.50,
'Shrimp Puffs' => 0);
$books = array("The Eater's Guide to Chinese Characters",
'How to Cook and Eat in Chinese');
// Следующая проверка дает истинное значение:
// по ключу Dried Mulberries в массиве имеется значение 3.00
if (in_array(3, $meals))
{
print 'There is a $3 item.';
print '<br>';}
// Следующая проверка дает истинное значение
if (in_array('How to Cook and Eat in Chinese', $books))
{
print "We have How to Cook and Eat in Chinese";
print '<br>';
}
// Следующая проверка дает ложное значение:
// в функции in_array() учитывается регистр букв
if (in_array("the eater's guide to Chinese characters", $books))
{
print "We have the Eater's Guide to Chinese Characters.";
print '<br>';
}
print '<br>';
print 'Пример 4.17. Поиск элемента в массиве по конкретному значению';
print '<br>';
$meals = array('Walnut Bun' => 1,
'Cashew Nuts and White Mushrooms' => 4.95,
'Dried Mulberries' => 3.00,
'Eggplant with Chili Sauce' => 6.50,
'Shrimp Puffs' => 0);
$dish = array_search(6.50, $meals);
if ($dish)
{
print "$dish costs \$6.50";
print '<br>';
}
print '<br>';
print 'Пример 4.18. Оперирование элементами массива';
print '<br>';
$dishes=[];
$dishes['Beef Chow Foon'] = 12;
$dishes['Beef Chow Foon']++;
$dishes['Roast Duck'] = 3;
$dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];
if ($dishes['total'] > 15)
{
print "You ate a lot: ";
print '<br>';
}
print 'You ate ' . $dishes['Beef Chow Foon'] . ' dishes of Beef Chow Foon.';
print '<br>';
print 'Пример 4.19. Вставка элементов массива в символьные строки, заключаемые в двойные кавычки';
print '<br>';
$meals['breakfast'] = 'Walnut Bun';
$meals['lunch'] = 'Eggplant with Chili Sauce';
$amounts = array(3, 6);
print "For breakfast, I'd like $meals[breakfast] and for lunch,\n";
print "I'd like $meals[lunch]. I want $amounts[0] at breakfast and\n";
print "$amounts[1] at lunch.";
print '<br>';
print 'Пример 4.20. Вставка элементов массива в символьные строки по ключам, заключаемым в фигурные скобки';
print '<br>';
$meals['Walnut Bun'] = '$3.95';
$hosts['www.example.com'] = 'website';
print "A Walnut Bun costs {$meals['Walnut Bun']}.\n";
print '<br>';
print "www.example.com is a {$hosts['www.example.com']}.";
print '<br>';
print 'Пример 4.21. Формирование символьной строки из элементов массива с помощью функции implode()';
print '<br>';
$dimsum = array('Chicken Bun','Stuffed Duck Web','Turnip Cake');
$menu = implode(', ', $dimsum);
print $menu;
print '<br>';
//Чтобы вывести весь массив без разделения его элементов заданным ограничителем, достаточно
//указать пустую строку в качестве первого аргумента при вызове функции implode():
$letters = array('А','В','С' ,'D');
print implode('', $letters);
print '<br>';
print 'Пример 4.22. Вывод строк HTML-таблицы на экран с помощью функции implode()';
print '<br>';
$dimsum = array('Chicken Bun','Stuffed Duck Web','Turnip Cake');
print '<tr><td>' . implode ('</td> <td>', $dimsum) . '</td></tr>';
print '<br>';
print 'Пример 4.23. Преобразование символьной строки в массив с помощью функции explode()';
print '<br>';
$fish = 'Bass, Carp, Pike, Flounder';
$fish_list = explode(', ', $fish);
print "The second fish is $fish_list[1]";
print '<br>';
print 'Пример 4.24. Сортировка массива с помощью функции sort()';
print '<br>';
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "Before Sorting:";
print '<br>';
foreach ($dinner as $key => $value)
{
print "dinner: $key $value<br>";
}
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
sort($dinner);
sort($meal);
print "After Sorting:";
print '<br>';
foreach ($dinner as $key => $value)
{
print "dinner: $key $value\n";
print '<br>';
}
foreach ($meal as $key => $value)
{
print "meal: $key $value\n";
print '<br>';
}
print '<br>';
print 'Пример 4.25. Сортировка массива с помощью функции asort()';
print '<br>';
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "Before Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
asort($meal);
print "After Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
print 'Пример 4.26. Сортировка массива с помощью функции ksort()';
print '<br>';
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "Before Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
ksort($meal);
print "After Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
print 'Пример 4.27. Сортировка массива с помощью функции arsort()';
print '<br>';
$meal = array('breakfast' => 'Walnut Bun', 'lunch' => 'Cashew Nuts and White Mushrooms', 'snack' => 'Dried Mulberries', 'dinner' => 'Eggplant with Chili Sauce');
print "Before Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
arsort($meal);
print "After Sorting:\n";
print '<br>';
foreach ($meal as $key => $value)
{
print "meal: $key $value<br>";
}
print '<br>';
print 'Пример 4.28. Создание многомерных массивов с помощью языковой конструкции array() или сокращенного синтаксиса []';
print '<br>';
$meals = array('breakfast' => ['Walnut Bun','Coffee'],
'lunch' => ['Cashew Nuts', 'White Mushrooms'],
'snack' => ['Dried Mulberries','Salted Sesame Crab']);
$lunches = [ ['Chicken','Eggplant','Rice'],
['Beef','Scallions','Noodles'],
['Eggplant','Tofu'] ];
$flavors = array('Japanese' => array('hot' => 'wasabi', 'salty' => 'soy sauce'),
'Chinese' => array('hot' => 'mustard', 'pepper-salty' => 'prickly ash'));
print '<br>';
print 'Пример 4.29. Доступ к элементам многомерного массива';
print '<br>';
print $meals['lunch'][1]; // White Mushrooms (Белые грибы)
print '<br>';
print $meals['snack'][0]; // Dried Mulberries (Сушеная шелковица)
print '<br>';
print $lunches[0][0]; // Chicken (Цыпленок)
print '<br>';
print $lunches[2][1]; // Tofu (Соевый сыр)
print '<br>';
print $flavors['Japanese']['salty']; // soy sauce (соевый соус)
print '<br>';
print $flavors['Chinese']['hot']; // mustard (горчица)
print '<br>';
print 'Пример 4.30. Манипулирование многомерными массивами';
print '<br>';
$prices['dinner']['Sweet Corn and Asparagus'] = 12.50;
$prices['lunch']['Cashew Nuts and White Mushrooms'] = 4.95;
$prices['dinner']['Braised Bamboo Fungus'] = 8.95;
$prices['dinner']['total'] =
$prices['dinner']['Sweet Corn and Asparagus'] +
$prices['dinner']['Braised Bamboo Fungus'];
$specials[0][0] = 'Chestnut Bun';
$specials[0][1] = 'Walnut Bun';
$specials[0][2] = 'Peanut Bun';
$specials[1][0] = 'Chestnut Salad';
$specials[1][1] = 'Walnut Salad';
// Если опустить индекс, новый элемент будет введен в конце массива.
// В следующей строке кода создается элемент массива $specials[1][2]
$specials[1][] = 'Peanut Salad';
print '<br>';
print 'Пример 4.31. Перебор многомерного массива во вложенном цикле, организованном с помощью';
print '<br>';
//языковой конструкции foreach()
$flavors = array('Japanese' => array('hot' => 'wasabi', 'salty' => 'soy sauce'),
'Chinese' => array('hot' => 'mustard', 'pepper-salty' => 'prickly ash'));
// Переменная $culture содержит ключ, а переменная
// $culture_flavors - значение (в данном случае — массив)
foreach ($flavors as $culture => $culture_flavors)
{
// Переменная $flavor содержит ключ, а переменная
// $example — значение
foreach ($culture_flavors as $flavor => $example)
{
print "A $culture $flavor flavor is $example.<br>";
} }
print '<br>';
print 'Пример 4.32. Перебор многомерного массива во вложенном цикле, организуемом с помощью языковой конструкции for()';
print '<br>';
$specials = array( array('Chestnut Bun', 'Walnut Bun', 'Peanut Bun'),
array('Chestnut Salad', 'Walnut Salad', 'Peanut Salad') );
// Переменная $num_specials содержит значение 2: количество
// элементов в первой размерности массива $specials
for ($i = 0, $num_specials = count($specials); $i < $num_specials;
$i++)
{
// Переменная $num_sub содержит значение 3: количество
// элементов в каждом подмассиве
for ($m = 0, $num_sub = count($specials[$i]);
$m < $num_sub; $m++)
{
print "Element [$i][$m] is " . $specials[$i][$m] . "<br>";
}
}
print '<br>';
print 'Пример 4.33. Вставка значения элемента многомерного массива';
print '<br>';
$specials=[['Chestnut Bun', 'Walnut Bun', 'Peanut Bun'],
    ['Chestnut Salad', 'Walnut Salad', 'Peanut Salad']];
//$specials = array( array('Chestnut Bun', 'Walnut Bun', 'Peanut Bun'), array('Chestnut Salad', 'Walnut Salad', 'Peanut Salad') );
// Переменная $num_specials содержит значение 2: количество
// элементов в первой размерности массива $specials
for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++)
{
// Переменная $num_sub содержит значение 3: количество
// элементов в каждом подмассиве
    for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++)
    {
        print "Element [$i][$m] is ".$specials[$i][$m].'<br>';
    }
}
print '<br>';




?>



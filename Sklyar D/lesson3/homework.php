<?php
/*
$x = strcmp('6 pack',55);
if ($x > 0) {
    print 'The string "6 pack" is greater than the number 55.';
} elseif ($x < 0) {
    print 'The string "6 pack" is less than the number 55.'; }

$first_name='Joe';
$last_name='Joe';
if (! strcasecmp($first_name, $last_name)) {
    print '$first_name and $last_name are equal.'; }

print '<select name="people">';
for ($i = 1; $i <= 10; $i++) {
print "<option>\$i</option>\n";
}
print '</select>';
*/
/*
1. Определите истинность или ложность приведенных ниже выражений, не прибегая к помощи
интерпретатора РНР.
a. 100.00 - 100
b. "zero"
c. "false"
d. 0 + "true"
e. 0.000
f. "0.0"
g. strcmp("false","False")
h. 0 <=> "0"
2. Выясните результат, выводимый приведенной ниже программой, не прибегая к помощи интер-
претатора РНР.
$аgе = 12;
$shoe_size = 13;
if ($аgе > $shoe_size)
print "Message 1.";
elseif (($shoe_size++) && ($age > 20))
print "Message 2.";
else
print "Message 3.";
print "Age: $age. Shoe Size: $shoe_size";
3. Воспользуйтесь конструкцией цикла while(), чтобы вывести на экран величины температур
в пределах от -50 до 50 градусов по Фаренгейту и эквивалентные им величины температур
в градусах Цельсия. По температурной шкале Фаренгейта вода замерзает при температуре 23
градуса и закипает при 212 градусах. А по температурной шкале Цельсия вода замерзает при
температуре 0 градусов и закипает при 100 градусах. Таким образом, для преобразования
температуры по Фаренгейту в температуру по Цельсию следует вычесть из ее величины 32,
умножить полученную разность на 5 и разделить на 9. А для преобразования температуры
по Цельсию в температуру по Фаренгейту следует умножить ее величину на 9, разделить
полученный результат на 5 и прибавить 32.
4. Видоизмените выполнение задания в упражнении 3, воспользовавшись конструкцией цикла
for() вместо конструкции цикла while()
*/
/*
1.Не понял, что от меня требуется в задании
2.
print "Message 3.";
print "Age: $age. Shoe Size: $shoe_size";
*/
//3.
$tempF=-50;
$tempC=((($tempF-32)*5)/9);

print '<ul>';
while ($tempF<=50)
{

    print "<li> Temperature in Fahrenheit: $tempF; Temperature in Celsius: $tempC";
    $tempF++;
    $tempC=((($tempF-32)*5)/9);

}
print '</ul>';
//4.
//$tF=-50;
print '<hr>';
print '<ul>';
for ($tF=-50; $tF<=50; $tF++)
{
    $tC=((($tF-32)*5)/9);
    print "<li> Temperature in Fahrenheit: $tF; Temperature in Celsius: $tC";
}
print '</ul>';
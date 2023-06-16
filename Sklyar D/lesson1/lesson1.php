<!--Глава 1. Краткое введение в РНР-->
Пример 1.1. Здравствуй, мир!
<br>
<html>
<head><title>PHP says hello</title></head>
<body>
<b>
    <?php
    print "Hello, World!";
    ?>
</b>
</body>
</html>
<hr>
Пример 1.2. HTML-форма для передачи введенных данных на обработку
<br>
<form method="POST" action="sayhello.php">
    Your Name: <input type="text" name="user" />
    <br/>
    <button type="submit">Say Hello</button>
</form>
<hr>
Пример 1.3. Динамические данные
<br>
<?php
print "Hello, ";
// вывести на экран значение параметра 'user'
// из переданной на обработку формы
print $_POST['user'];
print "!";
?>
<hr>
Пример 1.4. Вывод формы на экран
<br>
<?php
print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
Your Name: <input type="text" name="user" />
<br/>
<button type="submit">Say Hello</button>
</form>
_HTML_;
?>
<hr>
Пример 1.5. Вывод формы или приветствия на экран
<br>
<?php
// вывести на экран приветствие, если форма
// передана на обработку
if ($_POST['user']) {
    print "Hello ";
// вывести на экран значение параметра 'user' из
// переданной на обработку формы
    print $_POST['user'];
    print "!";
} else {
// иначе - вывести на экран саму форму
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
Your Name: <input type="text" name="user" />
<br/>
<button type="submit">Say Hello</button>
</form>
_HTML_;
}
?>
<hr>
Пример 1.6. Вывод отформатированного числа на экран
<br>
<?php print "The population of the US is about: ";
print number_format(320853904);
?>
<hr>
Пример 1.7. Отображение информации из базы данных
<br>
<?php
// использовать базу данных SQLite из файла 'dinner.db'
$db = new PDO('sqlite:dinner.db');
// определить, какие блюда имеются
$meals = array('breakfast','lunch','dinner');
// проверить, содержит ли параметр "meal" переданной
// на обработку формы одно из строковых значений
// "breakfast", "lunch" или "dinner"
if (in_array($_POST['meal'], $meals))
{
// Если данный параметр содержит указанное значение,
// получить все блюда для указанной трапезы
    $stmt = $db->prepare('SELECT dish,price FROM meals
WHERE meal LIKE ?');
    $stmt->execute(array($_POST['meal']));
    $rows = $stmt->fetchAll();
// Если блюда в базе данных не обнаружены, сообщить от этом
    if (count($rows) == 0)
    {
        print "No dishes available.";
    } else
    {
// вывести на экран каждое блюдо и цену на него
// в отдельной строке HTML-таблицы
        print '<table><tr><th>Dish</th><th>Price</th></tr>';
        foreach ($rows as $row)
        {
            print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
        }
        print "</table>";
    }
} else
    {
// Это сообщение выводится на экран в том случае,
// если параметр "meal" переданной на обработку формы
// не содержит ни одно из строковых значений
// "breakfast", "lunch" или "dinner"
        print "Unknown meal.";
    }

?>
<hr>
Пример 1.8. Несколько начальных и конечных пар дескрипторов
<br>
Five plus five is:
<?php print 5 + 5; ?>
<p>
    Four plus four is:
    <?php
    print 4 + 4;
    ?>
<p>
    <img src="vacation.jpg" alt="My Vacation" />

<?php
//ГЛАВА 8 Хранение информации в базах данных
print '<br>Пример 8.1. Подключение к программе базы данных (mysql) с помощью объекта типа PDO<br>';
//$db = new PDO ('mysql:host=127.0.0.1, dbname = restaurant;',
//    'root', 'toor');
print '<br>Пример 8.2. Перехват исключений, возникающих при ошибках подключения к базе данных<br>';
//генерация исключений
/*
try
{
    $db = new PDO ('mysql:dbname = restaurant;host=127.0.0.1',
    'root', 'toor');
} catch (PDOException $e)
{
    print "Coulnd't connect to the database: ".$e->getMessage();
}
print '<br>Пример 8.3. Создание таблицы dishes в базе данных<br>';
*/
//это надо вносить в консоль БД
/*
CREATE TABLE dishes
(
        dish_id INTEGER PRIMARY KEY,
    dish_name VARCHAR (255),
    price DECIMAL(4,2),
    is_spicy INT
)
*/
print '<br>Пример 8.4. Отправка запроса SQL с командой CREATE TABLE программе базы данных (sqlite)<br>';

try
{
    $db = new PDO('sqlite:D:/PhpStorm 2021.1.1/projects/learningPHP/Sklyar D/Database/restaurant');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->exec("CREATE TABLE dishes
                                    (
                            dish_id INTEGER PRIMARY KEY,
                            dish_name VARCHAR (255),
                            price DECIMAL(4,2),
                            is_spicy INT
                                    )");
}
catch (PDOException $e)
{
    print "Coulnd't connect to the database: ".$e->getMessage();
}

print '<br>Пример 8.5. Удаление таблицы из базы данных<br>';
//DROP TABLE dishes
print '<br>Пример 8.6. Ввод информации в базу данных с помощью метода ехес()<br>';
/*
try
{
    $db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy)
                                        VALUES ('Sesame Seed Puff', 2.50, 0)");
}
catch (PDOException $e)
{
    print "Couldn't insert a row: ".$e->getMessage();
}
*/
print '<br>Пример 8.7. Проверка ошибок выполнения запроса SQL с помощью метода ехес()<br>';
try
{
$db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
$db->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
$affectedRows = $db->exec("INSERT INTO dishes (dish_size, dish_name, price, is_spicy)
                                    VALUES ('large', 'Sesame See Puff', 2.50, 0)");
}
catch (PDOException $e)
{
    print 'Couldnt insert a row: '.$e->getMessage();
}
print '<br>Пример 8.8. Работа с базой данных в негласном режиме выдачи ошибок<br>';
// Конструктор всегда генерирует исключение,
// если ему не удастся выполнить свою задачу
/*
try
{
$db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
}
catch (PDOException $e)
{
    print 'Couldnt connect: '. $e->getMessage();
}
$result = $db->exec("INSERT INTO dishes(dish_size, dish_name, price, is_spicy)
                              VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
if (false === $result)
{
    $error = $db->errorInfo();
    print "Couldnt insert!<br>";
    print "SQL Error = {$error[0]}, DB Error = {$error[1]}, Message = {$error[2]}<br>";
}
*/
//В PHP 8.0 и выше, при использовании PDO, метод errorInfo() больше не возвращает ошибки выполнения запроса.
//Вместо этого, он возвращает информацию о состоянии подключения к базе данных.
//Код из учебника теперь будет выбрасывать Fatal Error. Можно заключить блок в $result и if в блок try,
//чтобы не было Fatal Error, но никаких данных в массиве $error не будет и выдавать через принт ничего не будет.
try {
    $db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
    $result = $db->exec("INSERT INTO dishes(dish_size, dish_name, price, is_spicy) VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
    if (false === $result) {
        $error = $db->errorInfo();
        print "Couldnt insert!\n";
        print "SQL Error = {$error[0]}, DB Error = {$error[1]}, Message = {$error[2]}\n";
    }
} catch (PDOException $e) {
    print 'Couldnt connect: ' . $e->getMessage();
}
print '<br>Пример 8.9. Работа с базой данных в режиме предупреждения об ошибках<br>';
// Конструктор всегда генерирует исключение,
// если ему не удастся выполнить свою задачу
try
{
$db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
}
catch (PDOException $e)
{
    print 'Couldnt connect: '. $e->getMessage()."<br>";
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$result = $db->exec("INSERT INTO dishes(dish_size, dish_name, price, is_spicy)
                              VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
if (false === $result)
{
    $error = $db->errorInfo();
    print "Couldnt insert!<br>";
    print "SQL Error = {$error[0]}, DB Error = {$error[1]}, Message = {$error[2]}<br>";

}
//в таком случае код срабатывает, если подключить errmode warning
print '<br>Пример 8.10. Ввод данных<br>';
//INSERT INTO имя_таблицы (столбец1[,столбец2, столбец3, ...])
// VALUES (значение1[,значение2, значение3, ...])
print '<br>Пример 8.11. Ввод нового блюда в таблицу<br>';
//INSERT INTO dishes (dish_id, dish_name, price, is_spicy)
// VALUES (1, 'Braised Sea Cucumber', 6.50, 0)
print '<br>Пример 8.12. Заключение строкового значения в кавычки<br>';
//INSERT INTO dishes (dish_id, dish_name, price, is_spicy)
// VALUES (2, 'General Tso''s Chicken', 6.75, 1)
print '<br>Пример 8.13. Ввод строки со значениями для некоторых столбцов таблицы<br>';
//INSERT INTO dishes (dish_name, is_spicy)
// VALUES ('Salt Baked Scallops', 0)
print '<br>Пример 8.14. Ввод строки со значениями для всех столбцов таблицы<br>';
//INSERT INTO dishes
// VALUES (1, 'Braised Sea Cucumber', 6.50, 0)
print '<br>Пример 8.15. Изменение данных в таблице с помощью метода ехес()<br>';
try
{
    $db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Кабачок под соусом, приправленным красным стручковым
// перцем, считается блюдом со специями. Если не имеет
// значения, сколько строк таблицы затронет данный запрос,
// то сохранять значение, возвращаемое методом ехес(),
// совсем не обязательно
    $db->exec("UPDATE dishes SET is_spicy = 1 
                        WHERE dish_name = 'Eggplant with Chili Sauce'");
// Омар под соусом, приправленным красным стручковым
// перцем, считается дорогим блюдом со специями
    $db->exec("UPDATE dishes SET is_spicy = 1, price = price*2
                        WHERE dish_name = 'Lobster with Chili Sauce'");
}
catch (PDOException $e)
{
    print 'Couldnt insert a row: '.$e->getMessage();
}
print '<br>Пример 8.16. Удаление данных из таблицы с помощью метода ехес()<br>';
try
{
$db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// удалить дорогие блюда из таблицы
$make_thing_cheaper=true;
if ($make_thing_cheaper=true)
{
    $db->exec("DELETE FROM dishes WHERE price > 19.95");
}
else
// или же удалить из нее все блюда
{
    $db->exec("DELETE FROM dishes");
}
}
catch (PDOException $e)
{
    print 'Couldnt delete row: '.$e->getMessage();
}
print '<br>Пример 8.17. Обновление данных в таблице<br>';
//UPDATE имя_таблицы SET столбец1= значение1[,столбец2= значение2,
// столбец3= значение3, ...] [WHERE логическое_выражение]
print '<br>Пример 8.18. Установка строкового или числового значения в столбце таблицы<br>';
//изменить цену на 5.50 во всех строках таблицы
//UPDATE dishes SET price = 5.50
//изменить на 1 значение в столбце is_spicy во всех строках таблицы
//UPDATE dishes SET is_spicy = 1
print '<br>Пример 8.19. Употребление имени столбца в выражении, указываемом в команде UPDATE<br>';
//UPDATE dishes SET price = price * 2
print '<br>Пример 8.20. Употребление предложения WHERE в команде UPDATE<br>';
//изменить состояние блюда "Кабачок под соусом, приправленным
//красным стручковым перцем" на блюдо со специями
//UPDATE dishes SET is_spicy = 1
//WHERE dish_name = 'Eggplant with Chili Sauce'
//уменьшить цену на блюдо "Цыпленок генерала Цо"
//UPDATE dishes SET price = price - 1
//WHERE dish_name = 'General Tso's Chicken'
print '<br>Пример 8.21. Выявление количества строк таблицы, затронутых при выполнении запроса SQL
с командой UPDATE<br>';
// увеличить цены на некоторые блюда
try {
    $count = $db->exec("UPDATE dishes SET price=5 WHERE price > 3");
    print 'Changed the price of ' . $count . ' rows';
}
catch (PDOException $e)
{
    print $e->getMessage();
}
print '<br>Пример 8.22. Удаление отдельных строк из таблицы<br>';
//DELETE FROM имя_таблицы [WHERE логическое_выражение]
print '<br>Пример 8.23. Удаление всех строк из таблицы<br>';
//DELETE FROM dishes
print '<br>Пример 8.24. Удаление некоторых строк из таблицы<br>';
//удалить из таблицы строки, где цена на блюда превышает 10.00
//DELETE FROM dishes WHERE price > 10.00
//удалить из таблицы строки, где значение в столбце dish_name
//точно соответствует наименованию блюда "Walnut Bun" (Булочка
//с грецкими орехами)
//DELETE FROM dishes WHERE dish_name = 'Walnut Bun'
print '<brПример 8.25. Небезопасный ввод данных из формы><br>';
//$db->exec("INSERT INTO dishes (dish_name) VALUES('$_POST[new_dish_name]')");
/*
пример вредоносной команды
х'); DELETE FROM dishes; INSERT INTO dishes (dish_name) VALUES ('y.
При вставке эти данные превращаются в следующий запрос:
INSERT INTO DISHES (dish_name) VALUES ('x');
DELETE FROM dishes; INSERT INTO dishes (dish_name) VALUES ('у')
*/
print '<br>Пример 8.26. Безопасный ввод данных из формы<br>';
/*
$stmt = $db->prepare('INSERT INTO dishes (dish_name) VALUES (?)');
$stmt->execute([$_POST['new_dish_name']]);
*/
print '<br>Пример 8.27. Употребление нескольких замещающих знаков в запросе SQL<br>';
/*
$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy)
                            VALUES (?,?,?)');
$stmt->execute([$_POST['new_dish_name'], $_POST['new_price'], $_POST['is_spicy']]);
*/
print '<br>Пример 8.28. Программа для ввода записей в таблицу dishes базы данных<br>';
?>
<a href="CompleteInsertForm.php">here</a>
<br>
Пример 8.29. Форма для ввода записей в таблицу dishes базы данных
<br>
<a href="insertForm.php">here</a>
<?php
print '<br>Пример 8.30. Извлечение строк из таблицы с помощью методов query() и fetch()<br>';
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch())
{
    print '<pre>';
    print_r($row);
    print "$row[dish_name], $row[price]<br>";
    print '</pre>';
}
print '<br>Пример 8.31. Извлечение всех строк из таблицы без организации цикла<br>';
$q = $db->query('SELECT dish_name, price FROM dishes');
// Переменная $rows будет содержать четырехэлементный
// массив, в каждом элементе которого находится по одной
// строке, извлекаемой из таблицы базы данных
$rows = $q->fetchAll();
print '<pre>';
print_r($rows);
print '</pre>';
print '<br>Пример 8.32. Извлечение информации из таблицы базы данных<br>';
//SELECT столбец1[,столбец2, столбец3, ...] FROM имя_таблицы
print '<br>Пример 8.33. Извлечение столбцов dish_name и price<br>';
//SELECT dish_name, price FROM dishes
print '<br>Пример 8.34. Применение знака * в запросе SQL с командой SELECT<br>';
//SELECT * FROM dishes
print '<br>Пример 8.35. Ограничение, накладываемое на строки, возвращаемые из таблицы по запросу SQL с командой
SELECT<br>';
//SELECT столбец1[, столбец2, столбец3, ...] FROM имя__таблицы WHERE логическое_выражение
print '<br>Пример 8.36. Извлечение определенных блюд из таблицы<br>';
//SELECT dish_name, price FROM dishes WHERE price > 5.00
//; извлечь блюда, названия которых точно соответствуют "Walnut Bun"
//SELECT price FROM dishes WHERE dish_name = 'Walnut Bun'
//; извлечь блюда по цене свыше 5.00, но не больше 10.00
//SELECT dish_name FROM dishes WHERE price > 5.00 AND price <= 10.00
//; извлечь блюда по цене свыше 5.00, но не больше 10.00 или же
//; блюда, названия которых точно соответствуют "Walnut Bun", но
//; по любой цене
//SELECT dish_name, price FROM dishes WHERE (price > 5.00 AND price <= 10.00)
//OR dish_name = 'Walnut Bun'
print '<br>Пример 8.37. Извлечение строки из таблицы связыванием методов query() и fetch() в це-
почку<br>';
$cheapest_dish_info = $db->query('SELECT dish_name, price
                                            FROM dishes
                                            ORDER BY price
                                            LIMIT 1')->fetch();
print "$cheapest_dish_info[0], $cheapest_dish_info[1]";
print '<pre>';
print_r($cheapest_dish_info);
print '</pre>';
print '<br>Пример 8.38. Упорядочение строк, возвращаемых по запросу с командой SELECT<br>';
//SELECT dish_name FROM dishes ORDER BY price
print '<br>Пример 8.40. Упорядочение строк по нескольким столбцам<br>';
//SELECT dish_name FROM dishes ORDER BY price DESC, dish_name
print '<br>Пример 8.41. Ограничение количества строк, возвращаемых из таблицы по запросу SQL с командой 
SELECT<br>';
//SELECT * FROM dishes ORDER BY price LIMIT 1
print '<br>Пример 8.42. Дополнительное количества строк, возвращаемых из таблицы по запросу SQL с 
командой SELECT<br>';
//SELECT dish_name, price FROM dishes ORDER BY dish_name LIMIT 10
print '<br>Пример 8.43. Применение разных стилей извлечения<br>';
// При наличии только числовых индексов значения очень легко
// объединяются вместе
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_NUM))
{
    print implode(', ', $row).'<br>';
}
// При наличии объекта для получения значений используется
// синтаксис доступа к свойствам этого объекта
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_OBJ))
{
    print "{$row->dish_name} has price {$row->price} <br>";
}
print '<br>Пример 8.44. Установка стиля извлечения по умолчанию для команды в запросе SQL<br>';
$q = $db->query('SELECT dish_name, price FROM dishes');
// Теперь методу fetch() не нужно больше ничего передавать,
// т.к. обо всем позаботится метод setFetchMode()
$q->setFetchMode(PDO::FETCH_NUM);
while ($row = $q->fetch())
{
    print implode(', ', $row). '<br>';
}
// Вызывать метод setFetchMode() или передавать что-нибудь
// методу fetch() не нужно, т.к. обо всем позаботится
// метод setAttribute()
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch())
{
    print implode(', ', $row).'<br>';
}
$anotherQuery = $db->query('SELECT dish_name FROM dishes WHERE price<5');
// Каждый подчиненный массив в многомерном массиве $moreDishes
// также проиндексирован числами
$moreDishes = $anotherQuery->fetchAll();
print '<br>Пример 8.45. Применение замещающего знака в запросе SQL с командой SELECT<br>';
/*
$stmt = $db->prepare('SELECT dish_name, price FROM dishes WHERE dish_name LIKE ?');
$stmt->execute([$_POST['dish_search']]);
while ($row = $stmt->fetch())
{
    // ... сделать что-нибудь с переменной $row ...
}
*/
print '<br>Пример 8.46. Применение подстановочных символов в запросах SQL с командой SELECT<br>';
//; извлечь из таблицы все строки с наименованиями блюд,
//; начинающихся с буквы D
//SELECT * FROM dishes WHERE dish_name LIKE 'D%'
//; извлечь из таблицы все строки с наименованиями блюд
//; Fried Cod, Fried Bod, Fried Nod и т.д.
//SELECT * FROM dishes WHERE dish_name LIKE 'Fried _od'
print '<br>Пример 8.47. Применение подстановочных символов в запросе SQL с командой UPDATE<br>';
//UPDATE dishes SET price = price * 2 WHERE dish_name LIKE '%chili%'
print '<br>Пример 8.48. Применение подстановочных символов в запросе SQL с командой DELETE<br>';
//DELETE FROM dishes WHERE dish_name LIKE '%Shrimp'
print '<br>Пример 8.49. Экранирование подстановочных символов<br>';
//SELECT * FROM dishes WHERE dish_name LIKE '%50\% off%'
print '<br>Пример 8.50. Составление запроса SQL с командой SELECT без применения замещающих знаков<br>';
// Сначала заключишь переданное на обработку значение в кавычки
$dish = $db->quote($_POST['dish_search']);
// Затем экранировать знаками обратной косой черты знаки
// подчеркивания и процента
$dish = strtr($dish, array('_'=>'\_', '%'=>'\%'));
// После санобработки значение переменной $dish может
// быть вставлено в запрос SQL
//[]=>('_'=>'\_', '%'=>'\%')
$stmt = $db->query("SELECT dish_name, price FROM dishes WHERE dish_name LIKE $dish");
print '<br>Пример 8.51. Неверное применение знаков замещения в запросе SQL с командой UPDATE<br>';
/*
$stmt = $db->prepare('UPDATE dishes SET price = 1 WHERE dish_name LIKE ?');
$stmt->execute([$_POST['dish_name']]);
*/
print '<br>Пример 8.52. Правильное применение метода quote() и функции strtr() в команде UPDATE<br>';
// Сначала заключить переданное на обработку значение в кавычки
$dish = $db->quote($_POST['dish_name']);
// Затем предварить знаки подчеркивания и процентов знаками
// обратной косой черты
$dish = strtr($dish, ['_'=>'\_', '%'=>'\%']);
// После санобработки значение переменной $dish может
// быть вставлено в запрос SQL
$db->exec("UPDATE dishes SET price = 1 WHERE dish_name LIKE $dish");
print '<br>Законченная форма. Пример 8.53. Программа для поиска записей в таблице dishes<br>';
?>
<a href="retrieveForm.php">Here</a>





















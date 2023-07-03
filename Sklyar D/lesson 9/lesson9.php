<?php
//Глава 9. Манипулирование файлами
session_start();
$_SESSION['username'] = 'Jacob';
print '<br>Пример 9.1. Содержимое файла page-template.html, используемого в примере 9.2<br>';
print '<a href="page-template.html">here</a>';
print '<br>Пример 9.2. Чтение, видоизменение и вывод шаблона страницы на экран<br>';
// загрузить файл шаблона из предыдущего примера
$page = file_get_contents('page-template.html');
// ввести заглавие страницы
$page = str_replace('{page_title}', 'Welcome', $page);
// окрасить страницу голубым цветом после полудня и
// зеленым цветом с утра
if (date('H'>=12))
{
    $page = str_replace('{color}', 'white', $page);
}
else
{
    $page = str_replace('{color}', 'green', $page);
}
// взять имя пользователя из переменной сохраненного
// предыдущего сеанса
$page = str_replace('{name}', $_SESSION['username'] ?? '', $page);
// вывести полученные результаты на экран
print $page;
print '<br>Пример 9.3. Запись в файл с помощью функции file_put_contents()<br>';
// загрузить файл шаблона из предыдущего примера
$page = file_get_contents('page-template.html');
// ввести заглавие страницы
$page = str_replace('{page_title}', 'Welcome', $page);
// окрасить страницу голубым цветом после полудня и
// зеленым цветом с утра
if (date('H'>=12))
{
    $page = str_replace('{color}', 'blue', $page);
}
else
{
    $page = str_replace('{color}', 'green', $page);
}
// взять имя пользователя из переменной сохраненного
// предыдущего сеанса
$page = str_replace('{name}', $_SESSION['username'] ?? '', $page);
// записать полученные результаты в файл page.html
file_put_contents('page.html', $page);
print '<br>Пример 9.4. Доступ к каждой строке в файле<br>';
foreach (file('addresses.txt') as $line)
{
    $line = trim($line);
    $info = explode('|', $line);
    print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</a><li><br>";
}
print '<br>Пример 9.6. Чтение файла построчно<br>';
$fh = fopen('addresses.txt', 'rb');
while ((! feof($fh)) && ($line = fgets($fh)))
{
    $line = trim($line);
    $info = explode('|', $line);
    print '<li><a href="mailto: ' . $info[0] . '">' . $info[1] .'</a></li><br>';
}
fclose($fh);
print '<br>Пример 9.7. Открытие файла в Windows<br>';
$fh = fopen('с:/windows/system32/settings.txt','rb');
print '<br>Пример 9.8. Запись данных в файл<br>';
try {
    $db = new PDO('sqlite:../Database/restaurant');
} catch (PDOException $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
// открыть файл dishes.txt для записи
$fh = fopen('dishes.txt', 'wb');
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch())
{
    // записать каждую строку (с завершающим знаком перевода
    // строки) в файл dishes.txt
    fwrite($fh, "The price of $row[0] is $row[1] \n");
}
fclose($fh);
print '<br>Пример 9.9. Содержимое файла dishes.csv<br>';
//"Fish Ball with Vegetables",4.25,0
//"Spicy Salt Baked Prawns",5.50,1
//"Steamed Rock Cod",11.95,0
//"Sauteed String Beans",3.15,1
//"Confucius ""Chicken""",4.75,0
print '<br>Пример 9.10. Ввод данных формата CSV в таблицу базы данных<br>';
try {
    $db = new PDO('sqlite:../Database/restaurant');
} catch (PDOException $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
$fh = fopen('dishes.csv', 'rb');
$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy)
                            VALUES (?,?,?)');
while ((!feof($fh)) && ($info = fgetcsv($fh)))
{
    // Элемент массива $info[0] содержит наименование блюда
    // из первого поля в строке, считанной из файла dishes.csv.
    // Элемент массива $info[1] содержит цену на блюдо
    // из второго поля в считанной строке.
    // Элемент массива $info[2] содержит состояние, обозначающее
    // наличие специй в блюде, из третьего поля в считанной строке.
    // Ввести упомянутое содержимое массива $info отдельной строкой
    // в таблицу базы данных
//    $stmt->execute($info);
    print "Inserted $info[0]<br>";
}
fclose($fh);
print '<br>Пример 9.11. Запись данных в файл формата CSV<br>';
try {
    $db = new PDO('sqlite:../Database/restaurant');
} catch (PDOException $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
// открыть файл формата CSV для записи
$fh = fopen('dish-list.csv', 'wb');
$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM))
{
// записать в массив $row данные в виде строки
// формата CSV. Функция fputcsv() добавляет
// знак перевода строки в конце записываемой строки
    fputcsv($fh, $row);
}
fclose($fh);
print '<br>Пример 9.12. Смена типа страницы на CSV<br>';
// уведомить веб-клиента, что ему предполагается передать
// файл формата CSV
//это скачивает ??? файл
//header('Content-Type: text/csv');
// уведомить веб-клиента, что содержимое файла формата CSV
// следует просматривать в отдельной программе
//это скачивает ??? файл с указанным названием
//header('Content-Disposition: attachment; filename="dishes.csv"');
//две команды выше нужно использовать вместе
print '<br>Пример 9.13. законченная программа Отправки файла формата CSV браузеру<br>';
/*
try {
    $db = new PDO('sqlite:../Database/restaurant');
} catch (PDOException $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
// уведомить веб-клиента, что ему передается файл формата CSV
// под названием dishes.csv
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dishes.csv"');
// открыть файл с дескриптором потока вывода
$fh = fopen('php://output', 'wb');
// извлечь информацию из таблицы базы данных и
// вывести ее на экран
$dishes = $db->query('SELECT dish_name, price,
is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
fputcsv($fh, $row);
}
*/
print '<br>Пример 9.14. Проверка существования файла<br>';
if (file_exists('/usr/local/htdocs/index.html')) {
    print "Index file is there.";
} else {
    print "No index file in /usr/local/htdocs.";
}
print '<br>Пример 9.15. Проверка на полномочия читать файл<br>';
$template_file = 'page-template.html';
if (is_readable($template_file)) {
    $template = file_get_contents($template_file);
} else {
    print "Can't read template file.";
}
print '<br>Пример 9.16. Проверка на полномочия записывать файл<br>';
$log_file = '/var/log/users.log';
if (is_writeable($log_file)) {
    $fh = fopen($log_file,'ab');
    fwrite($fh, $_SESSION['username'] . ' at '
        . strftime('%c') . "\n");
    fclose($fh);
} else {
    print "Cant write to log file.";
}
print '<br>Пример 9.17. Выявление ошибок при выполнении функции fopen() или fclose()<br>';
try {
    $db = new PDO('sqlite:../Database/restaurant');
} catch (Exception $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
// открыть файл dishes.txt для записи
$fh = fopen('/usr/local/dishes.txt','wb');
if (! $fh) {
    print "Error opening dishes.txt: $php_errormsg";
} else {
    $q = $db->query("SELECT dish_name, price FROM dishes");
    while ($row = $q->fetch()) {
// записать каждую строку с оконечным знаком
// перевода строки в файл dishes.txt
        fwrite($fh, "The price of $row[0] is $row[1] \n");
    }
    if (! fclose($fh)) {
print "Error closing dishes.txt: $php_errormsg";
} }
print '<br>Пример 9.18. Выявление ошибки при выполнении функции file_get_contents()<br>';
$page = file_get_contents('page-template.html');
// Обратите внимание на три знака равенства в следующем
// проверочном выражении
if ($page === false) {
    print "Couldn't load template: $php_errormsg";
} else {
// ... здесь следует обработка выявленной ошибки
}
print '<br>Пример 9.19. Выявление ошибок при выполнении функций fopen(), fgets() и fclose()<br>';
$fh = fopen('addresses.txt','rb');
if (! $fh) {
    print "Error opening addresses.txt: $php_errormsg";
} else {
    while (! feof($fh)) {
        $line = fgets($fh);
        if ($line !== false) {
            $line = trim($line);
            $info = explode('|', $line);
            print '<li><a href="mailto:' . $info[0] . '">'
                . $info[1] ."</li>\n";
        } }
    if (! fclose($fh)) {
        print "Error closing addresses.txt: $php_errormsg";
    } }
print '<br>Пример 9.20. Выявление и обработка ошибок, возвращаемых функцией file_put_contents()<br>';
// загрузить файл из примера 9.1
$page = file_get_contents('page-template.html');
// ввести заглавие страницы
$page = str_replace('{page_title}', 'Welcome', $page);
// окрасить страницу голубым цветом после полудня и
// зеленым цветом с утра
if (date('Н' >= 12)) {
    $page = str_replace('{color}', 'blue', $page);
} else {
    $page = str_replace('{color}', 'green', $page);
}
// взять имя пользователя из переменной сохраненного
// предыдущего сеанса работы
$page = str_replace('{name}', $_SESSION['username'], $page);
$result = file_put_contents('page.html', $page);
// непременно проверить, возвращает ли функция file_put_contents()
// логическое значение false или же значение -1
if (($result === false) || ($result == -1)) {
print "Couldn't save HTML to page.html";
}
print '<br>Пример 9.21. Очистка параметра, вставляемого из переданной на обработку формы в путь к
файлу<br>';
// удалить знаки косой черты (/) из имени пользователя,
// введенного в форме
$user = str_replace('/', '', $_POST['user']);
// удалить последовательности из двух точек (..) из
// имени пользователя, введенного в форме
$user = str_replace('..', '', $user);
if (is_readable("/usr/local/data/$user")) {
    print 'User profile for ' . htmlentities($user) .': <br/>';
    print file_get_contents("/usr/local/data/$user");
}
print '<br>Пример 9.22. Очистка пути к файлу с помощью функции realpath()<br>';
$filename = realpath("/usr/local/data/$_POST[user]");
// убедиться в том, что файл указан в переменной $filename
// по пути /usr/local/data
if (('/usr/local/data/' == substr($filename, 0, 16)) &&
    is_readable($filename)) {
    print 'User profile for ' . htmlentities($_POST['user']) .': <br/>';
    print file_get_contents($filename);
} else {
    print "Invalid user entered.";
}




















<?php
require '/PhpStorm 2021.1.1/projects/learningPHP/Sklyar D/lesson7/FormHelper.php';
try
{
    $db = new PDO('sqlite:D:\PhpStorm 2021.1.1\projects\learningPHP\Sklyar D\Database\restaurant');
}
catch (PDOException $e)
{
    print 'Couldnt connect: '.$e->getMessage();
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function showForm($errors=[])
{
    // установить свои значения по умолчанию:
    // цена составляет 5 долларов США
    $defaults = ['price'=>'5.00'];
    // создать объект $form с надлежащими свойствами по умолчанию
    $form = new FormHelper ($defaults);
    // Ради ясности весь код HTML-разметки и отображения
    // формы вынесен в отдельный файл
    include 'insertForm.php';
}
function validateForm()
{
    $input = [];
    $errors = [];
    // обязательное наименование блюда
    $input['dish_name'] = trim($_POST['dish_name'] ?? '');
    if (! strlen($input['dish_name']))
    {
        $errors[] = 'Please enter the name of the dish';
    }
    // цена должна быть указана достоверным положительным числом
    // с плавающей точкой
    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($input['price']<=0)
    {
        $errors[] = 'Please enter a valid price.';
    }
    // по умолчанию в элементе ввода is_spicy устанавливается
    // значение 'no'
    $input['is_spicy'] = $_POST['is_spicy'] ?? 'no';
    return [$errors, $input];
}
function processForm($input)
{
    // получить в этой функции доступ к глобальной переменной $db
    global $db;
    // установить в переменной $is_spicy значение в зависимости
    // от состояния одноименного флажка
    if ($input['is_spicy'] == 'yes')
    {
        $is_spicy = 1;
    }
    else
    {
        $is_spicy = 0;
    }
    try
    {
        $stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy) 
                                    VALUES (?,?,?)');
        $stmt->execute([$input['dish_name'], $input['price'], $is_spicy]);
        // сообщить пользователю о вводе блюда в базу данных
        print 'Added '.htmlentities($input['dish_name']).' to the database.';
    }
    catch (PDOException $e)
    {
        print 'Couldnt add your dish to the database.';
    }
}
// Основная логика функционирования страницы:
// - Если форма передана на обработку, проверить достоверность
// данных, обработать их и снова отобразить форму.
// - Если форма не передана на обработку, отобразить ее снова
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Если функция validate_form() возвратит ошибки,
    // передать их функции show_form()
    list($errors, $input) = validateForm();
    if ($errors)
    {
        showForm();
    }
    else
    {
        // Переданные данные из формы достоверны, обработать их
        processForm($input);
    }
}
else
{
    // Данные из формы не переданы, отобразить ее снова
    showForm();
}























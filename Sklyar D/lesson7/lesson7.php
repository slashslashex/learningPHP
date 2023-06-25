<?php
//ГЛАВА 7 Создание веб-форм для обмена данными с пользователями
print '<br>Пример 7.1. Отображение приветствия на странице<br>';
/*
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    print 'Hello, '.$_POST['my_name'];
}
else
{
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
    Your name is <input type="text" name="my_name">
    <br>
    <button>Say Hello</button>
</form>
_HTML_;
}
*/
print '<br>Пример 7.2. Двухэлементная форма<br>';
?>
<a href="catalog.php">here</a>
<br>
Пример 7.4. Элементы формы с несколькими значениями
<br>
<a href="eat.php">here</a>
<?php
/*
print '<br>Пример 7.6. Отображение приветствия "Hello" на странице с применением функций<br>';
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    processForm();
}
else
{
    showForm();
}
function processForm()
{
    print 'Hello, '.$_POST['my_name'];
}
function showForm()
{
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
    Your name is <input type="text" name="my_name">
    <br>
    <button>Say Hello</button>
</form>
_HTML_;
}
*/
print 'Пример 7.7. Проверка достоверности данных из формы<br>';
/*
if ($_SERVER['REQUEST_METHOD']=='POST')
    if (validateForm())
    {
        processForm();
    }
    else
    {
        showForm();
    }
else
{
    showForm();
}
function validateForm()
{
    if (strlen($_POST['my_name']) < 3)
    {
        return false;
    }
    else
    {
        return true;
    }
}
*/
print '<br>Пример 7.8. Отображение сообщений об ошибках вместе с формой<br>';
/*
function processForm()
{
    print 'Hello, '. $_POST['my_name'];
}
function showForm($errors = [])
{
    print <<<HTML
<form method="post" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="my_name">
    <br>
    <input type="submit" value="Say Hello">
</form>
HTML;
    if ($errors)
    {
        print 'Please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print ' </li></ul>';
    }
}
function validateForm()
{
    $errors=[];
    if (strlen($_POST['my_name']) < 3)
    {
        $errors[]= 'Your name must be at least 3 characters long';
    }
    return $errors;
}


if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if ($formErrors = validateForm())
    {
        showForm($formErrors);
    }
    else
    {
        processForm();
    }
}
else
{
    showForm();
}
*/
print '<br>Пример 7.9. Проверка достоверности данных в обязательном элементе<br>';
/*
$_POST['email']='0';
if (strlen($_POST['email']) == 0)
{
    $errors[] = "You must enter an email address.";
}
*/
print '<br>Пример 7.10. Фильтрация целочисленных входных данных<br>';
/*
$ok = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
if (is_null($ok) || ($ok === false))
{
    $errors[] = 'Please enter a valid age.';
}
print_r($_POST);
*/
print '<br>Пример 7.11. Фильтрация числовых входных данных с плавающей точкой<br>';
/*
$ok = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
if (is_null($ok) || ($ok === false)) {
    $errors[] = 'Please enter a valid price.'; }
print '<br>Пример 7.12. Совместное применение функций trim() и strlen()<br>';
$_POST['name']=0;
print '<pre>';
print_r($_POST);
print_r($errors);
if (strlen(trim($_POST['name'])) == 0) {
    $errors[] = "Your name is required.";
}
*/
print '<br>Пример 7.13. Составление массива из преобразованных входных данных<br>';
/*function validateForm()
{
    $errors=[];
    $input=[];
    $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    if (is_null($input['age']) || ($input['age'] === false))
    {
        $errors[] = 'Please enter a valid age.';
    }
    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if (is_null($input['price']) || ($input['price'] === false))
    {
        $errors[]='Please enter a valid price.';
    }
    $input['name'] = trim($_POST['name'] ?? '');
    if (strlen($input['name']) == 0)
    {
        $errors[]='Your name is required.';
    }
    return array($errors, $input);
}
*/
print '<br>Пример 7.14. Обработка ошибок и видоизмененных входных данных<br>';
/*
// Логика выполнения верных действий на
// основании метода запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// Если функции validate_form() возвращает ошибки,
// передать их функции show_form()
    list($form_errors, $input) = validateForm();
    if ($form_errors)
    {
        showForm($form_errors);
    }
    else
    {
        processForm($input);
    }
}
else
{
    showForm() ;
}
//прошлый код
function processForm()
{
    print 'Hello, '. $_POST['my_name'];
}
function showForm($errors = [])
{
    print <<<HTML
<form method="post" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="my_name">
    <br>
    <input type="submit" value="Say Hello">
</form>
HTML;
    if ($errors)
    {
        print 'Please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print ' </li></ul>';
    }
}


print '<pre>';
print_r(validateForm());
*/
print '<br>Пример 7.15. Проверка целочисленного диапазона<br>';
$input['age'] = filter_input(INPUT_POST, 'age',
    FILTER_VALIDATE_INT, array('options' => array ('min_range' => 18, 'max_range' => 65)));
if (is_null($input['age']) || ($input['age'] === false))
{
    $errors[] = 'Please enter a valid age between 18 and 65.';
}
//В фильтре FILTER_VALIDATE_FLOAT не
//поддерживаются варианты выбора min_range и max_range, и поэтому
//сравнивать их необходимо самостоятельно
$input['price'] = filter_input(INPUT_POST, 'price',
FILTER_VALIDATE_FLOAT);
if (is_null($input['price']) || ($input['price'] === false) ||
($input['price'] < 10.00) || ($input['price'] > 50.00)) {
$errors[] = 'Please enter a valid price between $10 and $50.'; }
print '<br>Пример 7.16. Проверка диапазона дат<br>';
// создать объект типа DateTime с датой шестимесячной давности
$range_start = new DateTime('6 months ago');
// создать объект типа DateTime с текущей датой
$range_end = new DateTime();
// в элементе массива $_POST['year'] хранится год,
// состоящий из четырех цифр;
// в элементе массива $_POST['month'] хранится месяц,
// состоящий из двух цифр;
// в элементе массива $_POST['day'] хранится день,
// состоящий из двух цифр
$input['year'] = filter_input(INPUT_POST, 'year',
    FILTER_VALIDATE_INT,
    array('options' => array('min_range' => 1900,
        'max_range' => 2100)));
$input['month'] = filter_input(INPUT_POST, 'month',
    FILTER_VALIDATE_INT,
    array('options' => array('min_range' => 1,
        'max_range' => 12)));
$input['day'] = filter_input(INPUT_POST, 'day',
    FILTER_VALIDATE_INT,
    array('options' => array('min_range' => 1,
        'max_range' => 31)));
// Для сравнения с логическим значением false операция ===
// не требуется, т.к. нулевое значение является недопустимым
// вариантом выбора года, месяца или дня. В функции checkdate()
// проверяется допустимое количество дней в данном месяце и году
if ($input['year'] && $input ['month'] && $input['day'] &&
    checkdate($input['month'], $input['day'], $input['year']))
{
    $submitted_date = new DateTime(strtotime(
        $input['year'] . '-' .
        $input['month'] . '-' .
        $input['day']));
    if (($range_start > $submitted_date) ||
        ($range_end < $submitted_date))
    {
        $errors[] =
            'Please choose a date less than six months old.';
    }
}
else
{
// Это сообщение выводится в том случае, если пользователь
// пропустит один из параметров или введет в форме дату
// вроде 31 февраля
    $errors[] = 'Please enter a valid date.';
}
print '<br>Пример 7.17. Проверка синтаксиса адреса электронной почты<br>';
$input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!$input['email'])
{
    $errors[] = 'Please enter a valid email address';
}
print '<br>Пример 7.18. Отображение списка, размечаемого дескриптором <\select><br>';
/*
$sweets = ['Sesame Seed Puff', 'Coconut Milk Gelatin Square', 'Brown Sugar Cake', 'Sweet Rice and Meat'];
function generateOptions($options)
{
    $html = '';
    foreach ($options as $option)
    {
        $html .= "<option>$option</option><br>";
    }
    return $html;
}
//отобразить форму
function showForm()
{
    $sweets = generateOptions($GLOBALS['sweets']);
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
    Your order: <select name="order">
    $sweets
</select>
<br>
<button>Order</button>
</form>
_HTML_;
}
showForm();
*/
/*
Массив вариантов выбора из списка, размечаемого дескриптором <select>, применяется в теле
функции validate_form() аналогично следующему:
$input['order'] = $_POST['order'];
if (! in_array($input['order'], $GLOBALS['sweets'])) {
$errors[] = 'Please choose a valid order.'; }
 */
print '<br>Пример 7.19. Список, размечаемый дескриптором <\select>, с разными вариантами выбора и
значениями элементов<br>';
/*
$sweets = ['puff' => 'Sesame Seed Puff',
            'square' => 'Coconut Milk Gelatin Square',
            'cake' => 'Brown Sugar Cake',
            'ricemeat' => 'Sweet Rice and Meat'];
function generateOptionsWithValue($options)
{
    $html = '';
    foreach ($options as $value => $option)
    {
        $html .= "<option value='$value'>$option</option><br>";
    }
    return $html;
}
function showForm()
{
    $sweets = generateOptionsWithValue($GLOBALS['sweets']);
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
    Your order: <select name="order">
    $sweets
</select>
<br>
<button>Order</button>
</form>
_HTML_;
}
showForm();
*/
print '<br>Пример 7.20. Проверка достоверности значения, передаваемого на обработку из списка, разме-
чаемого дескриптором <\select><br>';
/*
$input['order'] = $_POST['order'] ?? '';
if (! array_key_exists($input['order'] , $GLOBALS['sweets']))
{
    $errors[] = 'Please choose a valid order.';
}
*/
print '<br>Пример 7.21. Очистка символьной строки от дескрипторов HTML-разметки<br>';
/*
$_POST['comments'] = 'I
<b>love</b> sweet <div
class="fancy">rice</div> &
tea.';
// удалить дескрипторы HTML-разметки из комментариев
$comments = strip_tags($_POST['comments']);
// а теперь вывести содержимое переменной $comments на экран
print $comments;
*/
print '<br>Пример 7.22. Кодирование HTML-представлений символов в строке<br>';
/*
$comments = htmlentities($_POST['comments']);
// Теперь содержимое переменной $comments можно вывести на экран
print $comments;
// вообще выводится вот так:
//I &lt;b&gt;love&lt;/b&gt; sweet &lt;div class=&quot;fancy
//&quot;&gt;rice&lt;/div&gt; &amp; tea.
*/
print '<br>Пример 7.23. Построение массива значений, устанавливаемых по умолчанию<br>';
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST;
} else {
    $defaults = array('delivery' => 'yes', 'size' => 'medium', 'main_dish' => array('taro','tripe'),
        'sweet' => 'cake');
}
*/
print '<br>Пример 7.24. Установка значения по умолчанию в текстовом поле<br>';
/*
print '<input type="text" name="my_name" value="' .
    htmlentities($defaults['my_name'] ?? ''). '">';
print '<br><br>';
print '<textarea name="comments">';
print htmlentities($defaults['comments'] ?? '');
print '</textarea>';
*/
print '<br>Пример 7.26. Установка значения по умолчанию в списке, размечаемого дескриптором <\select><br>';
/*
$sweets = array('puff' => 'Sesame Seed Puff', 'square' => 'Coconut Milk Gelatin Square',
'cake' => 'Brown Sugar Cake', 'ricemeat' => 'Sweet Rice and Meat');
print '<select name="sweet">';
// Знак > обозначает значение элемента выбора,
// а переменная $lаbеl — отображаемый элемент списка
foreach ($sweets as $option => $label) {
    print '<option value="' .$option . '"';
    if ($option == $defaults['sweet']) {
        print ' selected'; }
    print "> $label</option>\n";
}
print '</select>';
*/
print '<br>Пример 7.27. Установка значений по умолчанию в списке, размечаемом дескриптором <\select>
и состоящем из многозначных элементов<br>';
/*
$main_dishes = array('cuke' => 'Braised Sea Cucumber', 'stomach' => "Sauteed Pig's Stomach",
    'tripe' => 'Sauteed Tripe with Wine Sauce', 'taro' => 'Stewed Pork with Taro',
    'giblets' => 'Baked Giblets with Salt', 'abalone' => 'Abalone with Marrow and Duck Feet');
print '<select name="main_dish[]" multiple>';
$selected_options = array();
foreach ($defaults['main_dish'] as $option) {
    $selected_options[$option] = true;
}
// вывести дескрипторы <option>
foreach ($main_dishes as $option => $label)
{
    print '<option value="' . htmlentities($option) . '"';
if (array_key_exists($option, $selected_options))
{
print ' selected';
}
print '>' . htmlentities($label) . '</option>';
print "<br>";
}
print '</select>';
*/
print '<br>Пример 7.28. Установка значений по умолчанию в кнопках-переключателях и флажках<br>';
/*
print '<input type="checkbox" name="delivery" value="yes"';
if ($defaults['delivery'] == 'yes') { print ' checked'; }
print '> Delivery?';
$checkbox_options = array('small' => 'Small', 'medium' => 'Medium', 'large' => 'Large');
foreach ($checkbox_options as $value => $label) {
    print '<input type="radio" name="size" value="'.$value. '"';
    if ($defaults['size'] == $value) { print ' checked'; }
    print "> $label ";
}
*/
print '<br>Пример 7.29. Вспомогательный класс для отображения и обработки элементов заполняемой
формы<br>';
?>
FormHelper.php<br>
Пример 7.30. Полноценная форма с отображением устанавливаемых по умолчанию значений,
проверкой достоверности и обработкой переданных данных
<?php
require 'FormHelper.php';
// Установить массивы с вариантами выбора из списка,
// размечаемого дескриптором <select>. Следующие массивы
// требуются в функциях display_form(), validate_form()
// и process_form(), и поэтому они объявляются в глобальной
// области действия
$sweets = ['puff' => 'Sesame Seed Puff',
            'square' => 'Coconut Milk Gelatin Square',
            'cake' => 'Brown Sugar Cake',
            'ricemeat' => 'Sweet Rice and Meat'];
$main_dishes = ['cuke' => 'Braised Sea Cucumber',
                'stomach' => "Sauted Pig's Stomach",
                'tripe' => 'Sauteed Tripe with Wine Sauce',
                'taro' => 'Stewed Pork with Taro',
                'giblets' => 'Bakes Giblets with Salt',
                'abalone' => 'Abalone with Marrow and Duck Feet'];
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
        showForm($errors);
    }
    else
    {
        // Переданные данные из формы достоверны, обработать их
        processForm($input);
    }
}
else
{
    showForm();
}
function showForm($errors = [])
{
    $defaults = ['delivery' => 'yes',
                    'size' => 'medium'];
    // создать объект $form с надлежащими свойствами по умолчанию
    $form = new FormHelper($defaults);
    // Ради ясности весь код HTML-разметки и отображения
    // формы вынесен в отдельный файл
    include 'completeForm.php';
}

function validateForm()
{
    $input = [];
    $errors = [];
    // обязательное имя
    $input['name'] = trim($_POST['name'] ?? '');
    if (! strlen($input['name']))
    {
        $errors[] = 'Please enter your name.';
    }
    // обязательный размер блюда
    $input['size'] = $_POST['size'] ?? '';
    if (! in_array($input['size'], ['small', 'medium', 'large']))
    {
        $errors[] = 'Please select a size.';
    }
    // обязательное сладкое блюдо
    $input['sweet'] = $_POST['sweet'] ?? '';
    if (! array_key_exists($input['sweet'], $GLOBALS['sweets']))
    {
        $errors[] = 'Please select a valid sweet item.';
    }
    // два обязательных блюда
    $input['main_dish'] = $_POST['main_dish'] ?? [];
    if (count($input['main_dish']) !=2)
    {
        $errors[] = 'Please select exactly two main dishes.';
    }
    else
    {
        // Если выбрано два основных блюда, убедиться в их
        // достоверности
        if (! (array_key_exists($input['main_dish'][0],
                        $GLOBALS['main_dishes']) &&
                        array_key_exists($input['main_dish'][1],
                        $GLOBALS['main_dishes'])))
        {
            $errors[] = 'Please select exactly two valid main dishes.';
        }
    }
    // Если выбрана доставка, то в комментариях должны быть
    // указаны ее подробности
    $input['delivery'] = $_POST['delivery'] ?? 'no';
    $input['comments'] = trim($_POST['comments'] ?? '');
    if (($input['delivery'] == 'yes') &&
                (! strlen($input['comments'])))
    {
        $errors[]= 'Please enter your address for delivery.';
    }
    return [$errors, $input];
}
function processForm($input)
{
    // найти полные наименования основных и сладких блюд
    // в массивах $GLOBALS['sweets'] и $GLOBALS['main_dishes']
    $sweet = $GLOBALS['sweets'][$input['sweet']];
    $main_dish_1 = $GLOBALS['main_dishes'][$input['main_dish'][0]];
    $main_dish_2 = $GLOBALS['main_dishes'][$input['main_dish'][1]];
    if (isset($input['delivery']) && ($input['delivery'] == 'yes'))
    {
        $delivery = 'do';
    }
    else
    {
        $delivery = 'do not';
    }
    // составить текст сообщения с заказом трапезы
    $message =<<<_ORDER_
Thank you for your order, {$input['name']}.
You requested the {$input['size']} size of $sweet,
$main_dish_1 and $main_dish_2.
You $delivery want delivery.
_ORDER_;
if (strlen(trim($input['comments'])))
{
    $message .= 'Your comments: '.$input['comments'];
}
// отправить сообщение шеф-повару
mail('chef@restaurant.example.com', 'New Order', $message);
// вывести сообщение на экран, но закодировать его любыми
// HTML-представлениями и преобразовать знаки перевода строки
// в дескрипторы <br/>
print nl2br(htmlentities($message, ENT_HTML5));
}
?>
Пример 7.31. Код HTML и РНР для разметки и отображения формы<br>
<a href="completeForm.php">Here</a>





















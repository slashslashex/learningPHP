<?php
// загрузить вспомогательный класс для составления форм
require '../lesson7/FormHelper.php';
// подключиться к базе данных
try
{
    $db = new PDO('sqlite:../Database/restaurant') ;
}
catch (PDOException $e)
{
    echo "Can't connect: ".$e->getMessage();
    exit;
}
// установить исключения при ошибках в базе данных
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// установить режим извлечения строк таблицы в виде объектов
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// задать варианты выбора из списка формы, определяющие
// наличие специй в блюде
$spicy_choices = ['no', 'yes', 'either'];
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
        processForm();
    }
}
else
{
    // Данные из формы не переданы, отобразить ее снова
    showForm();
}

function showForm($errors = [])
{
    // установить свои значения по умолчанию
    $defaults = ['min_price' => '5.00',
        'max_price' => '25.00'];
    // Создать объект $form с надлежащими свойствами по умолчанию
    $form = new FormHelper ($defaults);
    // Ради ясности весь код HTML-разметки и отображения
    // формы вынесен в отдельный файл
    include 'retrieveForm.php';
}

function validateForm()
{
    $input = [];
    $errors = [];
    // удалить любые начальные и конечные пробелы из переданного
    // на обработку наименования блюда
    $input['dish_name'] = trim($_POST['dish_name'] ?? '');
    // Минимальная цена на блюдо должна быть
    // достоверным числом с плавающей точкой
    $input['min_price'] = filter_input(INPUT_POST, 'min_price',
                                        FILTER_VALIDATE_FLOAT);
    if ($input['min_price'] === null || $input['min_price'] === false)
    {
        $errors[] = 'Please enter a valid minimum price.';
    }
    // Максимальная цена на блюдо должна быть
    // достоверным числом с плавающей точкой
    $input['max_price'] = filter_input(INPUT_POST, 'max_price',
                                        FILTER_VALIDATE_FLOAT);
    if ($input['max_price'] === null || $input['max_price'] === false)
    {
        $errors[] = 'Please enter a valid ,aximum price.';
    }
    // Минимальная цена на блюдо должна быть меньше
    // максимальной цены
    if ($input['min_price'] >= $input['max_price'])
    {
        $errors[] = 'Minimum price must be less than maximum price.';
    }
    $input['is_spicy'] = $_POST['is_spicy'] ?? '';
    if (!array_key_exists($input['is_spicy'], $GLOBALS['spicy_choices']))
    {
        $errors[] = 'Please choose a valid spicy option.';
    }
}
function processForm($input)
{
    // получить доступ к глобальной переменной $db
    // в теле данной функции
    global $db;
    // составить запрос к базе данных
    $sql = 'SELECT dish_name, price, is_spicy FROM dishes WHERE price >= ? AND price <= ?';
    // Если наименование блюда передано, ввести его в
    // предложение WHERE. С помощью метода quote() и
    // функции strtr() предотвращается действие вводимых
    // пользователем подстановочных символов
    if (strlen($input['dish_name']))
    {
        $dish = $db->quote($input['dish_name']);
        $dish = strtr($dish, ['_'=>'\_', '%'=>'\%']);
        $sql .= " AND dish_name LIKE $dish";
    }
    // Если в элементе ввода is_spicy установлено значение
    // 'yes' или 'no', ввести в запрос SQL соответствующее
    // логическое условие. (Если же установлено значение "either",
    // вводить логическое условие в предложение WHERE не нужно.)
    $spicy_choice = $GLOBALS['spicy_choices'][$input['is_spicy']];
    if ($spicy_choice == 'yes')
    {
        $sql .= ' AND is_spicy = 1';
    }
    elseif ($spicy_choice == 'no')
    {
        $sql .= ' AND is_spicy = 0';
    }
    // отправить запрос программе базы данных и получить
    // в ответ все нужные строки из таблицы
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['min_price'], $input['max_price']));
    if (count($dishes) == 0)
    {
        echo 'No dishes matched.';
    }
    else
    {
        print '<table>';
        print
            '<tr><th>Dish name</th><th>Price</th><th>Spicy?</th></tr>';
        foreach ($dishes as $dish)
        {
            if ($dish->is_spicy == 1)
            {
                $spicy = 'Yes';
            }
            else
            {
                $spicy = 'No';
            }
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
                            htmlentities($dish->dish_name),
                            $dish->price, $spicy);
        }
    }
}
//ошибка, не знаю из-за чего, учебник блевотина


















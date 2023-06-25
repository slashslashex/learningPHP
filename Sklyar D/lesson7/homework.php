<?php
/*
1. Что будет содержать массив $_POST после передачи на обработку приведенной ниже формы,
где выбран третий элемент из списка Braised Noodles (Тушеное мясо с лапшой), первый и
последний элементы из списка Sweet (Сладкое), а в текстовом поле введено значение 4?
<form method="POST" action="order,php">
Braised Noodles with: <select name="noodle">
<option>crab meat</option>
<option>mushroom</option>
<option>barbecued pork</option>
<option>shredded ginger and green onion</option>
</select>
<br/>
Sweet: <select name="sweet[]" multiple>
<option value="puff"> Sesame Seed Puff
<option value="square"> Coconut Milk Gelatin Square
<option value="cake"> Brown Sugar Cake
<option value="ricemeat"> Sweet Rice and Meat
</select>
<br/>
Sweet Quantity: <input type="text" name="sweet_q">
<br/>
<input type="submit" name="submit" value="Order">
</form>
2. Напишите функцию process_form(), выводящую на экран все параметры переданной на
обработку формы и их значения. Можете допустить, что параметры формы имеют только
скалярные значения.
3. Напишите программу, выполняющую основные арифметические операции. С этой целью отоб-
разите форму с текстовым полем для ввода двух операндов и список, размечаемых дескрип-
тором <select>, для выбора операции сложения, вычитания, умножения или деления. Орга-
низуйте проверку достоверности вводимых данных, чтобы они были числовыми и пригодными
для выполнения выбранной арифметической операции. Функция обработки вводимых данных
должна отображать операнды, операцию и результат ее выполнения. Так, если введены опе-
ранды 4 и 2 и выбрана операция умножения, то функция обработки вводимых данных должна
отобразить следующее: 4*2 = 8.
4. Напишите программу, отображающую, проверяющую достоверность и обрабатывающую форму
для ввода сведений о доставленной посылке. Эта форма должна содержать поля ввода адресов
отправителя и получателя, а также размеров и веса посылки. При проверке достоверности
данных из переданной на обработку формы должно быть установлено, что вес посылки не
превышает 150 фунтов (около 68 кг), а любой из ее размеров — 36 дюймов (порядка 91 см).
Можете также допустить, что в форме введены адреса США, но в таком случае проверьте
правильность ввода обозначения штата и почтового индекса. Функция обработки формы в
вашей программе должна выводить на экран сведения о посылке в виде организованного,
отформатированного отчета.
5. Видоизмените (дополнительно) функцию process_form(), перечисляющую все параметры
переданной на обработку формы и их значения, а также правильно обрабатывающую те пара-
метры переданной на обработку формы, которые содержат массивы в качестве своих значений.
Напомним, что элементы массива сами могут содержать массивы.
 */
//1. Массив Пост будет выдавать следующее:
/*
noodle => crab meat
sweet => [[0] => 'puff', [1] => 'ricemeat']
sweet_q => 4
submit => Order
*/
//2.
function process_form()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        foreach ($_POST as $key => $value)
        {
            echo $key . ': ' . $value . '<br>';
        }
    }
}
//3.
?>
    <form method="post" name="calculations">
        <input type="number" name="first" required>
        <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="second" required>
        <button>Do</button>
    </form>
<?php
function getAnswer()
{
    $answer = "$_POST[first] $_POST[operation] $_POST[second] = ";
    $x = $_POST['first'];
    $y = $_POST['second'];
    $operation = $_POST['operation'];
    if ($operation == '+' ?? '')
    {
        $answer = $answer.$x + $y;
        print $answer;
    }
    elseif ($operation == '-' ?? '')
    {
        $answer = $answer.$x - $y;
        print $answer;
    }
    elseif ($operation == '*' ?? '')
    {
        $answer = $answer.$x * $y;
        print $answer;
    }
    elseif ($operation == '/' ?? '')
    {
        $answer = $answer.$x / $y;
        print $answer;
    }
}
print getAnswer();
//4.
?>
    <form method="post" name="delivery">
        Введите адрес отправителя<br>
        <textarea name="sender" required><?= $_POST['sender'] ?></textarea>
        <br>
        Введите адрес получателя<br>
        <textarea name="receiver" required><?= $_POST['receiver'] ?></textarea><br>
        Введите размер посылки (не более 91 см с любой стороны)<br>
        <input type="number" name="side1" required>x<input type="number" name="side2" required>x<input type="number" name="side3" required>
        <br>Введите вес посылки (не более 68 кг)<br>
        <input type="number" name="weight" required><br>
        <button>Send</button>
    </form>
    <br>
<?php
function processForm()
{
    print<<<FORM
<table>
    <tr>
        <td>Адрес отправителя:</td>
        <td>{$_POST['sender']}</td>
    </tr>
    <tr>
        <td>Aдрес получателя:</td>
        <td>{$_POST['receiver']}</td>
    </tr>
    <tr>
        <td>Pазмер посылки:</td>
        <td>{$_POST['side1']}х{$_POST['side2']}х{$_POST['side3']}</td>
    </tr>
    <tr>
        <td>Bес посылки: </td>
        <td>{$_POST['weight']} килограмм</td>
    </tr>
</table>
FORM;
}
if ($_POST['side1'] > 91 ?? '' || $_POST['side2'] > 91 ?? '' || $_POST['side3'] > 91 ?? '')
{
    print 'Мы не берём в обработку посылки не соответствующие допустимому размеру';
}
elseif ($_POST['weight'] > 68 ?? '')
{
    print 'Посылка не должна превышать вес в 68 кг';
}
else processForm();
//5.
//не понял
function modifiedProcess_form() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        foreach ($_POST as $key => $value)
        {
            if (is_array($value))
            {
                echo "$key: " . implode(', ', $value) . '<br>';
            }
            else
            {
                echo "$key: $value" . '<br>';
            }
        }
    }
}






















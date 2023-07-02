<?php
/*
В последующих упражнениях применяется таблица dishes базы данных, имеющая следующую
структуру:
CREATE TABLE dishes (
dish_id INT,
dish_name VARCHAR(255),
price DECIMAL(4,2),
is_spicy INT
)
Ниже приведен образец данных, размещаемых в таблице dishes.
INSERT INTO dishes VALUES (1,'Walnut Bun',1.00,0)
INSERT INTO dishes VALUES (2,'Cashew Nuts and White Mushrooms',4.95,0)
INSERT INTO dishes VALUES (3,'Dried Mulberries',3.00,0)
INSERT INTO dishes VALUES (4,'Eggplant with Chili Sauce',6.50,1)
INSERT INTO dishes VALUES (5,'Red Bean Bun',1.00,0)
INSERT INTO dishes VALUES (6,'General Tso''s Chicken',5.50,1)
1. Напишите программу, в которой все блюда, находящиеся в таблице dishes, перечисляются
отсортированными по цене.
2. Напишите программу, отображающую форму с запросом блюд по их цене. После передачи
формы на обработку программа должна вывести наименования и цены тех блюд, которые
стоят не меньше, чем указано в форме. Не извлекайте из таблицы базы данных строки или
столбцы, которые не подлежат выводу на экран.
3. Напишите программу, отображающую форму со списком наименований блюд, размечаемым
дескриптором <select>. Составьте такой список из наименований блюд, извлеченных из базы
данных. После передачи формы на обработку программа должна вывести из таблицы всю
информацию о выбранном блюде, в том числе идентификатор, наименование, цену и наличие
специй в данном блюде.
4. Создайте новую таблицу для хранения информации о посетителе ресторана. В этой таблице
должна храниться следующая информация о каждом посетителе ресторана: идентификатор
посетителя, имя, номер телефона, а также идентификатор излюбленного блюда посетителя.
Напишите программу, отображающую форму для ввода нового посетителя в таблицу. Часть
формы, предназначенная для ввода излюбленного блюда посетителя, должна быть реализована
в виде списка наименований блюд, размечаемого дескриптором <select>. Идентификатор
посетителя должен формироваться вашей программой, а не вводиться в заполняемой форме.
*/
//1.
//SELECT * FROM dishes ORDER BY price
//2.
print <<<SEARCHFORM
<form action="$_SERVER[PHP_SELF]" method="post">
    <table>
        <tr>
            <td>Enter price to search</td>
        </tr>
    </table>
    <input type="number" name="userPrice">
    <button>List food</button>
</form>
SEARCHFORM;
$searchPrice = $_POST['userPrice'] ?? '';
$db = new PDO('sqlite:../Database/restaurant');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $q = $db->query("SELECT dish_name, price FROM dishes
                         WHERE price <= $searchPrice ORDER BY price");
    while ($row = $q->fetch(PDO::FETCH_NUM)) {
        echo implode(' price is ', $row) . '<br>';
    }

} catch (PDOException $e) {
    echo '';
}
//3.
$select = $db->query("SELECT dish_name FROM dishes ORDER BY dish_name");
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <select name="dish">
            <?php
            while ($row = $select->fetch())
            {
                echo implode('<option value="'.$row['dish_name'].'">', $row).'</option>';
            }
            ?>
        </select>
        <button>Show info</button>
    </form>
<?php
$dish = $_POST['dish'] ?? '';
$search = $db->query("SELECT * FROM dishes WHERE dish_name = '$dish'");
$row = $search->fetch();
$spice = '';
if ($row['is_spicy'] ?? '' == 0)
{
    $spice .= 'No!';
}
else $spice .= 'Yes!';
if ($dish){
    print <<<DISH
<table>
    <tr>
        <td>Dish ID: $row[dish_id]</td>
    </tr>
    <tr>    
        <td>Name: $row[dish_name]</td>
    </tr>    
        <td>Price: $row[price]$</td>
    <tr>    
        <td>Spicy? $spice</td>
    </tr>
</table>
DISH;
}
//4.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$clientsDish = $db->query("SELECT dish_name FROM dishes ORDER BY dish_name");
?>
<table>
    <tr><td>Enter new client</td></tr>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <tr><td>Name of the client <input type="text" name="name"></td></tr>
        <tr><td>Client phone number <input type="number" name="phone"></td></tr>
        <tr><td>Favorite dish ID <select name="dishSelect">
                    <?php
                    while ($row = $clientsDish->fetch())
                    {
                        echo implode('<option value="'.$row['dish_name'].'">', $row).'</option>';
                    }
                    ?>
                </select></td></tr>
        <tr><td><button style="cursor: pointer">Enter new client</button></td></tr>
    </form>
</table>
<?php
$favoriteDish = $_POST['dishSelect'] ?? '';
$searchFavorite = $db->query("SELECT * FROM dishes WHERE dish_name = '$favoriteDish'");
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$foundedDish = $searchFavorite->fetch();
$stmt = $db->prepare('INSERT INTO clients (client_name, phone_number, favorite_dish_id)
                            VALUES (?,?,?)');
if ($favoriteDish)
{
    try
    {
        $stmt->execute([$name, $phone, $foundedDish['dish_id']]);
    }
    catch (PDOException $e)
    {
        print $e;
    }
}
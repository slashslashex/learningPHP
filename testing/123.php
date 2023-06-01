<form method="post">
    <p><select name="hero">
            <option>выбирайтестрануизсписка</option>
            <option value="1">Италия</option>
            <option value="2">Греция</option>
            <option value="3">Россия</option>
        </select></p>
    <p><b>сколько дней отдыха?</b></p>
    <input  type="text"  name="a"  /><p><b>есть ли у вас скидка?</b></p>
    <input  type="checkbox" name="option"  value="b"><Br><p>
        <input type="submit"  value="Отправить"></p>
</form>
<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
if (isset($_POST['hero']))
{
    if($_POST['hero']  == 1)
    {
            if(isset($_POST['b']))
        {
                echo" вИталиюсоскидкой". ($_POST['a']*400*1.12*0.95);
        }
            else
            {
                echo" вИталию без скидки ". ($_POST['a']*400*1.12);
            }
    }
elseif(  $_POST['hero'] == 2)
{
    if(isset($_POST['b']))
{
    echo" вГрециюсоскидкой". ($_POST['a']*400*1.1*0.95);
}
else
{
    echo"Грециябезскидкии".($_POST['a']*400*1.1);
}
}
    elseif($_POST['hero']  == 3)
{
    if(isset($_POST['b']))
{
    echo" вРоссию со скидкой". ($_POST['a']*400*0.95);
}
else
{
    echo"Poccия без скидкии".($_POST['a']*400);
}
}
}
?>

</body>
</html
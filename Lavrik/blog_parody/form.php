<?php
$isSend=false;
if ($_SERVER['REQUEST_METHOD']==='POST')
{
$name=trim($_POST['name']);
$phone=trim($_POST['phone']);
$dt=date("Y-d-m H:i:s");
$mailBody="$dt\n$phone\n$name";
mail('1@1.ru', 'New app on site', $mailBody);
$isSend=true;
}
else
{

};



echo $_SERVER['REQUEST_METHOD'];
echo '<pre>';
print_r($_POST);
echo '</pre>';


?>
<div class="form">
<form method="post">
    Name:<br>
    <input type="text" name="name"><br>
    Phone:<br>
    <input type="text" name="phone"><br>
    <button>Send</button>
</form>
</div>

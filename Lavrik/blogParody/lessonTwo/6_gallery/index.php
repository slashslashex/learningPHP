<?php
include_once ('model/gallery.php');
//загрузка будет в простейшем виде

$isSend = false;
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    var_dump($_FILES['file']);
    $file = ($_FILES['file']);
//    if ($file['size']===0) {
//        $err = 'Файл не выбран или превышает максимальный размер';
    if ($file['name']==='')
    {
        $err = 'Файл не выбран';
    } elseif ($file['size']===0)
    {
        $err = 'Файл слишком большой';
    }
//    всегда создаем только белый список
    elseif (!checkImageName($file['name']))
    {
        $err = 'Только jpg';
    }
    else
    {
        copy($file['tmp_name'], 'images/'.mt_rand(1000, 100000).'.jpg');
//        var_dump($file);
        $isSend = true;
    }

}

//echo $_SERVER['REQUEST_METHOD'];
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

?>
<div class="form">
    <? if ($isSend): ?>
        <p>Your image is done!</p>
    <? else: ?>
        <!--enctype нужно прописывать при отправке файлов, иначе
        отправится в стандартной кодировке URL ENCODED, могут быть проблемы, файл в принципе
        на сервер может не попасть-->
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button>Send</button>
            <p><?= $err ?></p>
        </form>
    <? endif; ?>
</div>
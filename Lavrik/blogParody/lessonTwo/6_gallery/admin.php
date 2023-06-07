<?php
include_once ('model/gallery.php');
//это модерн
$files = scandir('images');
$images = array_filter($files, function ($f)
{
    return is_file("images/$f") && checkImageName($f);
});
/*
так можно делать руками (велосипед)
фильтруется директория по критериям "проверка на файл+*.jpg" в массив
$files = scandir('images');
$images = [];
foreach ($files as $f)
{
    if (is_file("images/$f") && preg_match('/.*\.jpg$/', $f))
    {
        $images[] = $f;
    }
}
*/
/*
echo '<pre>';
print_r($files);
print_r($images);
echo '</pre>';
*/
?>
<div class="gallery">
    <? foreach ($images as $img): ?>
        <img src="images/<?=$img?>" alt="" width="100">
    <?endforeach;?>
</div>

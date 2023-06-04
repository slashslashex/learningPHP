<?php
function getApps() : array
{
//    считываем файл, он возвращает строку
    $str=file_get_contents('db/apps.txt');
//    функция преобразовывает данные из джсон в обычный пхп
// обьект или массив, принимает первым параметром строку, если второй параметр
// не передан - будет создан обьект. Указывае тру чтобы все распаршенные
// джсон обьекты превратились в ассоциативные массивы
    return json_decode($str, true);
}
function addApp(string $name, string $phone) : bool
{
    $dt=date("Y-d-m H:i:s");
//собираем данные из формы в массив
    $app=['dt'=>$dt, 'name'=>$name, 'phone'=>$phone];
    $allApps=getApps();
    $allApps[]=$app;
    return saveApps($allApps);
}
function saveApps(array $apps) : bool
{
//    преобразовывает пхп данные в джсон (для массива апп, который только что пришел)
//    создает строку
   $str= json_encode($apps);
//   функция принимает два параметра (имя файла и строка которую туда нужно поместить)
//    работает в жестком режиме, полностью заменяет файл
   file_put_contents('db/apps.txt', $str);
   return true;
}


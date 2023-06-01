<?php
$arr=[4,1,6,3,2,9];
echo "Входной массив: ".implode(', ', $arr). '<br>';#implode превращает массив в строку серез разделитель
echo 'Итераций: '. (count($arr)-1)*(count($arr)/2).'<br>';
//общее число итераций: n-1*n/2 где n это общее количество элементов в массиве
//минус один нужно, чтобы сократить один элемент, так как индексы массива начинаются с нуля
$outer_iteration=1;
//начинаем считать с 1
$inner_iteration=1;
for ($a=0; $a<count($arr)-1;$a++){
    echo '==Внешняя итерация: ' . $outer_iteration++ . '<br>';
    $flag = 0;
    for ($i = 0; $i<count($arr) -$a -1; $i++) {
        echo 'Внутренняя итерация: ' . $inner_iteration++ . '<br>';
    $elem1=$arr[$i];
    $elem2=$arr[$i+1];
    if ($elem1>$elem2){
        echo "$elem1>$elem2".'<br>';
        echo 'Переставляем элементы'.'<br>';
        $arr[$i]=$elem2;
        $arr[$i+1]=$elem1;
        $flag=1;
    }
        else echo "$elem1<$elem2".'<br>';
        echo 'Не переставляем'.'<br>';
    }
    if ($flag==0){break;}
echo 'Получено: '.implode(',',$arr).'<br>';
}
//тут попроще
//function bubble_sort(&$array)
//{
//    for ($i=0; $i < count($array); $i++)
//    {
//        for ($y=($i+1); $y < count($array); $y++)
//        {
//            if ($array[$i] > $array[$y])
//            {
//                $c = $array[$i];
//                $array[$i] = $array[$y];
//                $array[$y] = $c;
//            }
//        }
//    }
//}
//
//$arr = [92, 64, 87, 18, 17, 66, 50, 88, 99, 77];
//
//bubble_sort($arr);
//
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
//коммент с форума: Чудовищно долгая сортировка. Банальная бинарная сортировка значительно быстрее пузырька.
?>
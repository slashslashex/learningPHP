<?php
/*
1. Согласно данным Бюро переписи населения США в 2010 году, самыми крупными в Соединен-
ных Штатах Америки были следующие города:
• Нью-Йорк (8175133 человек)
• Лос-Анджелес, шт. Калифорния (3792621 человек)
• Чикаго, шт. Иллинойс (2695598 человек)
• Хьюстон, шт. Техас (2100263 человек)
• Филадельфия, шт. Пенсильвания (1526006 человек)
• Феникс, шт. Аризона (1445632 человек)
• Сан-Антонио, шт. Техас (1327407 человек)
• Сан-Диего, шт. Калифорния (1307402 человек)
• Даллас, шт. Техас (1197816 человек)
• Сан-Хосе, шт. Калифорния (945942 человек)
Определите один массив (или ряд массивов), хранящий местоположение и население пере-
численных выше городов. Выведите на экран таблицу со сведениями о местоположении и
населении, а также общее население всех десяти городов.
2. Видоизмените выполнение задания в предыдущем упражнении таким образом, чтобы строки
в результирующей таблице были упорядочены сначала по населению, а затем по названиям
городов.
3. Видоизмените выполнение задания в первом упражнении таким образом, чтобы таблица со-
держала также строки с общим населением каждого штата, упомянутого в перечне самых
крупных городов США.
4. Выясните, как хранить каждый из приведенных ниже видов информации в массиве, а за-
тем предоставьте пример кода, в котором создается такой массив, состоящий из нескольких
элементов. Например, в следующем ассоциативном массиве в качестве ключа служит Ф.И.О.
учащегося, а качестве значения — ассоциативный массив, состоящий из классов и идентифи-
кационных номеров учащихся:
$students =
[ 'James D. McCawley' => [ 'grade' => 'A+', 'id' => 271231 ],
'Buwei Yang Chao' => [ 'grade' => 'A', 'id' => 818211] ];
• Классы и идентификационные номера учащихся в классе.
• Количество каждого товара в запасах на складе.
• Школьные обеды, состоящие из разных блюд (закуски, салаты, напитки и т.д.), а также
их стоимость на каждый день недели.
• Имена членов вашей семьи.
• Имена, возраст и родство членов вашей семьи.
*/
//1.
$stat=
    [
        'Нью-Йорк'=>8175133,
        'Лос-Анджелес'=>3792621,
        'Чикаго'=>2695598,
        'Хьюстон'=>2100263,
        'Филадельфия'=>1526006,
        'Феникс'=>1445632,
        'Сан-Антонио'=>1327407,
        'Сан-Диего'=>1307402,
        'Даллас'=>1197816,
        'Сан-Хосе'=>945942,
    ];
$totalPopul=array_sum($stat);
print '<ul>';
foreach ($stat as $city=>$popul)
{
    print "<li> В городе $city население составляет $popul человек";
}
print '</ul>';
print '<hr>';
print "Общее население в этих городах составляет $totalPopul человек";
//2.
print '<hr>';
print 'Ниже города сортированы по количеству жителей:';
asort($stat);
$totalPopul=array_sum($stat);
print '<ul>';
foreach ($stat as $city=>$popul)
{
    print "<li> В городе $city население составляет $popul человек";
}
print '</ul>';
print '<hr>';
print "Общее население в этих городах составляет $totalPopul человек";
print '<hr>';
print 'Ниже города сортированы в алфавитном порядке:';
ksort($stat);
$totalPopul=array_sum($stat);
print '<ul>';
foreach ($stat as $city=>$popul)
{
    print "<li> В городе $city население составляет $popul человек";
}
print '</ul>';
//3. Не понял, что от меня требуется. В задании нет общего
// количества населения для каждого штата
//4.
$school=
    [
        'classRoomNumber1'=>['StudName1'=>'StudId1','StudName2'=>'StudId2','StudName3'=>'StudId3'],
        'classRoomNumber2'=>['StudName1'=>'StudId2','StudName2'=>'StudId2','StudName3'=>'StudId3'],
        'classRoomNumber3'=>['StudName1'=>'StudId3','StudName2'=>'StudId2','StudName3'=>'StudId3'],
        'classRoomNumber4'=>['StudName1'=>'StudId4','StudName2'=>'StudId2','StudName3'=>'StudId3'],
    ];
$goods=
    [
        'warehouseNumber1'=>['goodsName1'=>'quantity', 'goodsName2'=>'quantity', 'goodsName3'=>'quantity'],
        'warehouseNumber2'=>['goodsName1'=>'quantity','goodsName2'=>'quantity', 'goodsName3'=>'quantity'],
        'warehouseNumber3'=>['goodsName1'=>'quantity','goodsName2'=>'quantity','goodsName3'=>'quantity'],
        'warehouseNumber4'=>['goodsName1'=>'quantity','goodsName2'=>'quantity', 'goodsName3'=>'quantity'],
    ];
$lunches=
    [
        'Monday'=>['dish1'=>'MondayPrice','dish2'=>'MondayPrice','dish3'=>'MondayPrice'],
        'Tuesday'=>['dish1'=>'TuesdayPrice','dish2'=>'TuesdayPrice','dish3'=>'TuesdayPrice'],
        'Wednesday'=>['dish1'=>'WednesdayPrice','dish2'=>'WednesdayPrice','dish3'=>'WednesdayPrice'],
        'thursday'=>['dish1'=>'thursdayPrice','dish2'=>'thursdayPrice','dish3'=>'thursdayPrice'],
        'friday'=>['dish1'=>'fridayPrice','dish2'=>'fridayPrice','dish3'=>'fridayPrice'],

    ];
$familyShort=['Mom'=>'MomName', 'Dad'=>'DadName'];
$familyFull=
    [
        'Mom'=>['Name'=>'MomName', 'Age'=>'MomAge'],
        'Dad'=>['Name'=>'DadName', 'Age'=>'DadAge'],
        'Bro'=>['Name'=>'BroName', 'Age'=>'BroAge']
    ];
print '<pre>';
print_r($school);
print '</pre>';

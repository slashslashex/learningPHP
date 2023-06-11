<?php
/*
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

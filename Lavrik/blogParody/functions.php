<?php

function getArticles()
{
    return
[
    '1'=>[
        'id'=>1,
        'title'=>'Hello, World',
        'content'=>'Hello Multiverse! text text'
        ],
    '2'=>[
        'id'=>2,
        'title'=>'Other article',
        'content'=>'Other article text text'
        ],
    '3'=>[
        'id'=>3,
        'title'=>'One more article',
        'content'=>'One more article text text'
        ]
];
}

function checkId(string $id) : bool
//строгая типизация функции: приводим айди к строковому типу, возвращаем булевое
{
//    проверяет что строка состоит только из цифр
return ctype_digit($id);
}
<?php
//ГЛАВА 6 Оперирование объектами, объединяя данные и логику
print 'Пример 6.1. Определение класса<br>';
/*
class Entree
{
    public $name;
    public $ingredients = [];
    public function hasIngredients ($ingredient)
    {
        return in_array($ingredient, $this->ingredients);
    }
}
*/
print '<br>Пример 6.2. Создание и применение объектов<br>';
/*
// создать экземпляр и присвоить его переменной $soup
$soup = new Entree();
// установить свойства экземпляра в переменной $soup
$soup->name = 'Chicken Soup';
$soup->ingredients = ['chicken', 'water'];
// создать отдельный экземпляр и присвоить его
// переменной $sandwich
$sandwich = new Entree();
// установить свойства экземпляра в переменной $sandwich
$sandwich->name = 'Chicken Sandwich';
$sandwich->ingredients = ['chicken', 'bread'];

foreach (['chicken', 'lemon', 'bread', 'water'] as $ing)
{
    if ($soup->hasIngredients($ing))
    {
        print "Soup contains $ing.<br>";
    }
    if ($sandwich->hasIngredients($ing))
    {
        print "Sandwich contains $ing.<br>";
    }
}
*/
print '<br>Пример 6.3. Определение статического метода<br>';
/*
class Entree
{
    public $name;
    public $ingredients = [];
    public function hasIngredient ($ingredient)
    {
        return in_array($ingredient, $this->ingredients);
    }
    public static function getSizes()
    {
        return ['small', 'medium', 'large'];
    }
}
*/
print '<br>Пример 6.4. Вызов статического метода<br>';
/*
$sizes = Entree::getSizes();
*/
print '<br>Пример 6.5. Инициализация объекта в конструкторе<br>';
/*
class Entree
{
    public $name;
    public $ingredients = [];
    public function __construct($name, $ingredients)
    {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient)
    {
        return in_array($ingredient, $this->ingredients);
    }
}
*/
print '<br>Пример 6.6. Вызов конструктора<br>';
/*
// Суп, его название и ингредиенты
$soup = new Entree('Chicken Soup', ['chicken', 'water']);
// Сэндвич, его название и ингредиенты
$sandwich = new Entree('Chicken Sandwich', ['chicken', 'bread']);
*/
print '<br>Пример 6.7. Генерирование исключения<br>';
class Entree
{
    public $name;
    public $ingredients = [];
    public function __construct($name, $ingredients)
    {
        if (!is_array($ingredients))
        {
            throw new Exception('$ingredients must be array');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient)
    {
        return in_array($ingredient, $this->ingredients);
    }
}
print '<br>Пример 6.8. Создание условий для генерирования исключения<br>';
/*
$drink = new Entree('Glass of Milk', 'milk');
if ($drink->hasIngredients('milk'))
{
    print "Yummy!";
}
*/
print '<br>Пример 6.9. Обработка исключения<br>';

try
{
    $drink = new Entree('Glass of Milk', 'milk');
    if ($drink->hasIngredient('milk')) {
        print "Yummy!";
    }
}
    catch (Exception $e)
    {
        print "Couldn't create the drink: ".$e->getMessage();
    }

print '<br>Пример 6.10. Расширение класса Entree<br>';
/*
class ComboMeal extends Entree
{
    public function hasIngredient($ingredient)
    {
        foreach ($this->ingredients as $entree)
        {
            if ($entree->hasIngredient($ingredient))
            {
                return true;
            }
        }
        return false;
    }
}
*/
print '<br>Пример 6.11. Применение подкласса<br>';
// Суп, его название и ингредиенты
$soup = new Entree('Chicken Soup', array('chicken', 'water'));
// Сендвич, его название и ингредиенты
$sandwich = new Entree('Chicken Sandwich', array('chicken', 'bread'));
// Составное блюдо
$combo = new ComboMeal('Soup + Sandwich', array($soup, $sandwich));
print '<pre>';
print_r($combo);
foreach (['chicken','water','pickles'] as $ing)
{
    if ($combo->hasIngredient($ing))
    {
        print "Something in the combo contains $ing.<br>";
    }
}
print '<br>Пример 6.12. Ввод конструктора в подкласс<br>';
class ComboMeal extends Entree
{
    public function __construct($name, $entrees)
    {
        parent::__construct($name, $entrees);
        foreach ($entrees as $entree)
        {
            if (!$entree instanceof Entree)
            {
                throw new Exception('Elements of $entrees must be Entree objects');
            }
        }
    }
    public function hasIngredient($ingredient)
    {
        foreach ($this->ingredients as $entree)
        {
            if ($entree->hasIngredient($ingredient))
            {
                return true;
            }
        }
        return false;
    }
}
print '<br>Пример 6.13. Изменение доступности свойств<br>';
/*
class Entree {
private $name;
protected $ingredients = array();
//Свойство $name объявлено закрытым, и поэтому ниже
//предоставляется метод для чтения его значения
public function getName() {
    return $this->name;
}
public function __construct($name, $ingredients) {
    if (! is_array($ingredients)) {
        throw new Exception('$ingredients must be an array');
    }
    $this->name = $name;
    $this->ingredients = $ingredients;
}
public function hasIngredient($ingredient) {
    return in_array($ingredient, $this->ingredients);
} }
*/
print '<br>Пример 6.14. Определение класса в пространстве имен<br>';
/*
namespace Tiny;
class Fruit
{
    public static function munch($bite)
    {
        print "Here is a tiny munch of $bite.";
    }
}
\Tiny\Fruit::munch("banana");
*/
print '<br>Пример 6.15. Применение ключевого слова use<br>';
/*
use Tiny\Eating\Fruit as Snack;
use Tiny\Fruit;
// Приведенная ниже строка кода равнозначна
// такой строке кода: \Tiny\Eating\Fruit::munch();
Snack::munch("strawberry");
// Приведенная ниже строка кода равнозначна
// такой строке кода: \Tiny\Fruit::munch();
Fruit::munch("orange");
*/








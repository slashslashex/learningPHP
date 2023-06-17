<?php
/*
1. Создайте класс Ingredient. Каждый экземпляр этого класса должен представлять
отдельный ингредиент блюда, а также отслеживать наименование ингредиента
и его стоимость.
2. Введите в свой новый класс Ingredient метод, изменяющий стоимость ингредиента блюда.
3. Создайте подкласс, производный от представленного в этой главе класса Entree.
Этот подкласс должен принимать объекты типа Ingredient вместо символьной строки
с наименованиями ингредиентов для их обозначения. Введите в этот подкласс метод,
возвращающий общую стоимость блюда.
4. Разместите свой класс Ingredient в собственном пространстве имен и внесите
изменения в другой код, где применяется класс Ingredient, чтобы этот код
функционировал надлежащим образом.
*/
//1.
/*
class Ingredient
{
    public $name;
    public $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }
}
*/
//2.
/*
class Ingredient
{
    public $name;
    public $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function changeCost($cost) {
        $this->cost = $cost;
    }
}
*/
//3.
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
}

class Ingredient
{
    public $name;
    public $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function changeCost($cost)
    {
        $this->cost = $cost;
    }
}

class EntreeWithIngredients extends Entree
{
    public function __construct($name, $ingredients)
    {
        parent::__construct($name, $ingredients);
    }

    public function getTotalCost()
    {
        $totalCost = 0;
        foreach ($this->ingredients as $ingredient) {
            $totalCost += $ingredient->cost;
        }
        return $totalCost;
    }
}
$broccoli = new Ingredient('Broccoli', '5.25');
$cucumber = new Ingredient('Cucumber', '1.15');
$carrot = new Ingredient('Carrot', '3.00');
$broccoli->changeCost(3);
print '<pre>';
print_r($broccoli);
print '<br>';
$salad = new EntreeWithIngredients('salad', [$broccoli, $cucumber, $carrot]);
print '<pre>';
print_r($salad);
print '<br>';
print $salad->getTotalCost();
*/
//4.
include ('namespace.php');
use MyNamespace\Ingredient as ingr;
use MyNamespace\EntreeWithIngredients as EWI;
$ingredient1 = new ingr ('Масло', 2);
$ingredient2 = new ingr ('Соль', 1);
$ingredients = [$ingredient1, $ingredient2];
$dish = new EWI ('Блюдо', $ingredients);
$totalCost = $dish->getTotalCost();
echo 'Общая стоимость блюда: ' . $totalCost . ' $.<br>';
print '<pre>';
print_r($dish);
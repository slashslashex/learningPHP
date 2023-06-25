<?php
namespace MyNamespace;
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
/*
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
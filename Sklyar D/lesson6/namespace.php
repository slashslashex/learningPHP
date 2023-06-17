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
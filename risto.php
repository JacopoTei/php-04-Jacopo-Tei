<?php
class Restaurant {
    public $dishes;
    public $drinks;

    public function __construct($_dishes, $_drinks) {
        $this->dishes = $_dishes;
        $this->drinks = $_drinks;
    }

    public function getMenuWithPrices() {
        $menu = [];

        foreach ($this->dishes as $dish) {
            $menu[$dish] = $this->getDishPrice($dish);
        }

        foreach ($this->drinks as $drink) {
            $menu[$drink] = $this->getDrinkPrice($drink);
        }

        return $menu;
    }

    public function getDishPrice($dish) {
        $dishPrices = [
            "carbonara" => 10.99,
            "amatriciana" => 9.99,
            "gricia" => 11.99,
        ];

        return isset($dishPrices[$dish]) ? $dishPrices[$dish] : 0;
    }

    public function getDrinkPrice($drink) {
        $drinkPrices = [
            "acqua" => 1.99,
            "coca" => 2.49,
            "vino" => 15.99,
        ];

        return isset($drinkPrices[$drink]) ? $drinkPrices[$drink] : 0;
    }
}

$dishMenu = ["carbonara", "amatriciana", "gricia"];
$drinksMenu = ["acqua", "coca", "vino"];

$restaurant = new Restaurant($dishMenu, $drinksMenu);
$menuWithPrices = $restaurant->getMenuWithPrices();

echo "Questo è il nostro menu:\n";

foreach ($menuWithPrices as $item => $price) {
    echo "$item: $price euro\n";
}

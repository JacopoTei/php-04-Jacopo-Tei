<?php
class Restaurant {
    public $dishes;
    public $drinks;

    public function __construct($_dishes, $_drinks) {
        $this->dishes = $_dishes;
        $this->drinks = $_drinks;
    }

    public function getMenuWithPrices($dishPrices, $drinkPrices) {
        $menu = [];

        foreach ($this->dishes as $dish) {
            $menu[$dish] = $this->getDishPrice($dish, $dishPrices);
        }

        foreach ($this->drinks as $drink) {
            $menu[$drink] = $this->getDrinkPrice($drink, $drinkPrices);
        }

        return $menu;
    }

    public function addDish($dish, $price, &$dishPrices) {
        $this->dishes[$dish] = $price;
     
        $dishPrices[$dish] = $price;

        echo "Ho aggiunto un nuovo piatto ($dish, $price euro) al menu.\n";
    }

    private function getDishPrice($dish, $dishPrices) {
        return isset($dishPrices[$dish]) ? $dishPrices[$dish] : 0;
    }

    private function getDrinkPrice($drink, $drinkPrices) {
        return isset($drinkPrices[$drink]) ? $drinkPrices[$drink] : 0;
    }
}

$dishMenu = ["carbonara", "amatriciana", "gricia"];
$drinksMenu = ["acqua", "coca", "vino"];

$restaurant = new Restaurant($dishMenu, $drinksMenu);

$dishPrices = [
    "carbonara" => 10.99,
    "amatriciana" => 9.99,
    "gricia" => 11.99,
];

$drinkPrices = [
    "acqua" => 1.99,
    "coca" => 2.49,
    "vino" => 15.99,
];

$menuWithPrices = $restaurant->getMenuWithPrices($dishPrices, $drinkPrices);

echo "Questo è il nostro menu:\n";

foreach ($menuWithPrices as $item => $price) {
    echo "$item: $price euro\n";
}

$restaurant->addDish("lasagna", 12.99, $dishPrices);

<?php
class RAM {
    public $size;

    public function __construct($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }
}

class Motherboard {
    public $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }
}

class VideoCard {
    public $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class Computer {
    public $ram;
    public $motherboard;
    public $videoCard;
    public $otherComponent;

    public function __construct(RAM $ram, Motherboard $motherboard, VideoCard $videoCard, $otherComponent) {
        $this->ram = $ram;
        $this->motherboard = $motherboard;
        $this->videoCard = $videoCard;
        $this->otherComponent = $otherComponent;
    }

    public function getComputerSpecs() {
        $specs = "RAM: " . $this->ram->getSize() . "GB, ";
        $specs .= "Motherboard: " . $this->motherboard->getModel() . ", ";
        $specs .= "Video Card: " . $this->videoCard->getBrand() . ", ";
        $specs .= "Other Component: " . $this->otherComponent;
        return $specs;
    }
}

$ram = new RAM(8); // Specifica la dimensione della RAM in GB
$motherboard = new Motherboard("ASUS"); // Specifica il modello della scheda madre
$videoCard = new VideoCard("NVIDIA"); // Specifica la marca della scheda video
$otherComponent = "Altre specifiche";

$computer = new Computer($ram, $motherboard, $videoCard, $otherComponent);
$computerSpecs = $computer->getComputerSpecs();
echo "Specifiche del computer: " . $computerSpecs;

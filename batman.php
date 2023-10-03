<?php

class BatMobile {
    public $front;
    public $back;

    public function __construct(Front $_front, Back $_back){
        $this->front = $_front;
        $this->back = $_back;
    }

    public function pulsanteAttacca(){
        $this->front->attacca();
    }

    public function pulsanteDifendi(){
        $this->back->difendi();
    }
}

abstract class Back {
    abstract public function difendi();
}

class Fumo extends Back {
    public function difendi(){
        echo "non mi vedi \n";
    }
}

class Scudo extends Back {
    public function difendi(){
        echo "non mi prendi \n";
    }
}

abstract class Front {
    abstract public function attacca();
}

class Razzi extends Front {
    public function attacca(){
        echo "Bum \n";
    }
}

class Laser extends Front {
    public $color;

    public function __construct($_color){
        $this->color = $_color;
    }

    public function attacca(){
        echo "pew di colore " . $this->color . "\n";
    }
}

$razzi1 = new Razzi();
$scudo1 = new Scudo();
$batman1 = new BatMobile($razzi1, $scudo1);

$batman1->pulsanteAttacca();
$batman1->pulsanteDifendi();

$batman2 = new BatMobile(new Razzi , new Scudo());
$batman2->pulsanteAttacca();
$batman3 = new BatMobile (new Laser ('Verde'), new Fumo);
$batman3->pulsanteDifendi();
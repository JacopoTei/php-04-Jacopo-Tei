<?php

class Jeeg {
    public $armR;
    public $armL;
    public $legs;
    
    public function __construct(Arms $_armR, Arms $_armL, Legs $_legs){
        $this->armR = $_armR;
        $this->armL = $_armL;
        $this->legs = $_legs;
    }

    public function atkR(){
        $this->armR->atk();
    }

    public function atkL(){
        $this->armL->atk();
    }

    public function move(){
        $this->legs->move();
    }

    public function combo(){
        $this->atkR();
        $this->atkL();
    }

    public function dinAtk($side){
        if ($side == 'dx'){
            $this->atkR();
        } elseif ($side == 'sx'){
            $this->atkL();
        }
    }
}

abstract class Arms { 
    abstract public function atk();
}

class Trivella extends Arms {
    public function atk(){
        echo "ti faccio diventare un colabrodo \n";
    }
}

class Lanciafiamme extends Arms {
    public function atk(){
        echo "Napalm \n";
    }
}

class Minigun extends Arms {
    public function atk(){
        echo "ti buco \n";
    }
}

abstract class Legs {
    abstract public function move();
}

class Piedi extends Legs {
    public function move(){
        echo "guarda come piando \n";
    }
}

$jeeg1 = new Jeeg(new Trivella(), new Lanciafiamme(), new Piedi());
$jeeg1->atkR();
$jeeg1->combo();

$jeeg2 = new Jeeg(new Minigun(), new Lanciafiamme(), new Piedi());
$jeeg2->atkL();

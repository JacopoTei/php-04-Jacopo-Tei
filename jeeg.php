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
        }else{
            echo "Il Jeeg robot non capisce e va in errore\n";
        }
    }
}

$jeeg1 = new Jeeg(new Minigun(), new Lanciafiamme(), new Propulsori());

$jeeg1->dinAtk('sx');
$jeeg1->dinAtk('dx');
$jeeg1->dinAtk('pluto');

$jeeg2 = new Jeeg(new Trivella(), new Trivella(), new Piedi());


abstract class Arms { 
    abstract public function atk();
}

class Trivella extends Arms {
    public function atk(){
        echo "Ti faccio diventare un colabrodo\n";
    }
}

class Lanciafiamme extends Arms {
    public function atk(){
        echo "Napalm\n";
    }
}

class Minigun extends Arms {
    public function atk(){
        echo "Ti buco\n";
    }
}

abstract class Legs {
    abstract public function move();
}

class Piedi extends Legs {
    public function move(){
        echo "Guarda come pianco\n";
    }
}

class Cingoli extends Legs{
    public function move(){
        echo "Posso camminare su qualsiasi superficie\n";
    }
}

class Propulsori extends Legs{
    public function move(){
        echo "Volo a velocità mach-10\n";
    }
}

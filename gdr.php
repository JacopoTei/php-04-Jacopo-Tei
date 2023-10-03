<?php
class Personaggio {
    private $nome;
    private $classe;
    private $salute;
    private $mana;

    public function __construct($nome, $classe, $salute, $mana) {
        $this->nome = $nome;
        $this->classe = $classe;
        $this->salute = $salute;
        $this->mana = $mana;
    }

    public function attacca(Personaggio $avversario) {
        $danno = rand(1, 10);
        echo $this->nome . " attacca " . $avversario->getNome() . " infliggendo " . $danno . " danni \n";
        $avversario->subisciDanno($danno);
    }

    public function subisciDanno($danno) {
        $this->salute -= $danno;
        if ($this->salute < 0) {
            $this->salute = 0;
        }
        echo $this->nome . " ha " . $this->salute . " punti salute rimanenti \n";
    }

    public function getNome() {
        return $this->nome;
    }
    public function aumentaMana($quantita) {
        $this->mana += $quantita;
        echo $this->nome . " ha aumentato il suo mana di " . $quantita . " punti \n";
    }
}

class OggettoMagico {
    private $nome;
    private $effetto;

    public function __construct($nome, $effetto) {
        $this->nome = $nome;
        $this->effetto = $effetto;
    }

    public function usa(Personaggio $personaggio) {
        $personaggio->aumentaMana($this->effetto);
        echo $personaggio->getNome() . " ha usato " . $this->nome . " e ha aumentato il suo mana \n";
    }
}



class GiocoDiRuolo {
    public function inizia() {
        $personaggio1 = new Personaggio("Guerriero", "Guerriero", 100, 50);
        $personaggio2 = new Personaggio("Mago", "Mago", 80, 100);

        $spadaMagica = new OggettoMagico("Spada Magica", 20);
        $pozioneMana = new OggettoMagico("Pozione Mana", 30);

        echo "Inizia il combattimento tra " . $personaggio1->getNome() . " e " . $personaggio2->getNome() . "\n";

        $personaggio1->attacca($personaggio2);
        $personaggio2->attacca($personaggio1);

        $spadaMagica->usa($personaggio1);
        $pozioneMana->usa($personaggio2);
    }
}

$gioco = new GiocoDiRuolo();
$gioco->inizia();


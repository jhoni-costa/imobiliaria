<?php
require_once 'Pessoa.php';

class Proprietario extends Pessoa{

    private $diaRepasse;

    public function getDiaRepasse(){
        return $this->diaRepasse;
    }
    public function setDiaRepasse($diaRepasse){
        $this->diaRepasse = $diaRepasse;
    }
}
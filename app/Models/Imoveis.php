<?php
require_once 'AbstractObj.php';

class Imoveis extends AbstractObj{
    
    private int $id;
    private string $rua;
    private string $numero;
    private string $cep;
    private string $cidade;
    private string $estado;
    
    /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function getRua(){
        return $this->rua;
    }
    public function setRua(int $rua){
        $this->rua = $rua;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero(int $numero){
        $this->numero = $numero;
    }
    public function getCep(){
        return $this->cep;
    }
    public function setCep(int $cep){
        $this->cep = $cep;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade(int $cidade){
        $this->cidade = $cidade;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado(int $estado){
        $this->estado = $estado;
    }
}
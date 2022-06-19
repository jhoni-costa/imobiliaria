<?php
require_once 'AbstractObj.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe com os atributos de um Imovel                                               *
 *                                                                                          *
 ********************************************************************************************/
class Imovel extends AbstractObj{
    
    private $id;
    private $rua;
    private $numero;
    private $cep;
    private $cidade;
    private $estado;
    private $proprietarioId;

    private $proprietario;
    
    /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getRua(){
        return $this->rua;
    }
    public function setRua($rua){
        $this->rua = $rua;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getCep(){
        return $this->cep;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getProprietarioId(){
        return $this->proprietarioId;
    }
    public function setProprietarioId($proprietarioId){
        $this->proprietarioId = $proprietarioId;
    }
    public function getProprietario(){
        return $this->proprietario;
    }
    public function setProprietario($proprietario){
        $this->proprietario = $proprietario;
    }
}
<?php
require_once 'AbstractObj.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 20/06/2022                                                                        *
 * @desc Classe com os atributos de um Repasse                                              *
 *                                                                                          *
 ********************************************************************************************/

class Repasse extends AbstractObj{

    private $id;
    private $contratoId;
    private $valor;
    private $dataRepasse;
    private $numeroRepasse;
    private $mesReferencia;
    private $anoReferencia;
    private $statusRepasse;

    /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getContratoId(){
        return $this->contratoId;
    }
    public function setContratoId($contratoId){
        $this->contratoId = $contratoId;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function getDataRepasse(){
        return $this->dataRepasse;
    }
    public function setDataRepasse($dataRepasse){
        $this->dataRepasse = $dataRepasse;
    }
    public function getNumeroRepasse(){
        return $this->numeroRepasse;
    }
    public function setNumeroRepasse($numeroRepasse){
        $this->numeroRepasse = $numeroRepasse;
    }
    public function getMesReferencia(){
        return $this->mesReferencia;
    }
    public function setMesReferencia($mesReferencia){
        $this->mesReferencia = $mesReferencia;
    }
    public function getAnoReferencia(){
        return $this->anoReferencia;
    }
    public function setAnoReferencia($anoReferencia){
        $this->anoReferencia = $anoReferencia;
    }
    public function getStatusRepasse(){
        return $this->statusRepasse;
    }
    public function setStatusRepasse($statusRepasse){
        $this->statusRepasse = $statusRepasse;
    }
}
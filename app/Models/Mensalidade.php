<?php
require_once 'AbstractObj.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 20/06/2022                                                                        *
 * @desc Classe com os atributos de uma Mensalidade                                         *
 *                                                                                          *
 ********************************************************************************************/

class Mensalidade extends AbstractObj{

    private $id;
    private $contratoId;
    private $valor;
    private $dataVencimento;
    private $dataPagamento;
    private $numeroParcela;
    private $mesReferencia;
    private $anoReferencia;
    private $statusPagamento;


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
    public function getDataVencimento(){
        return $this->dataVencimento;
    }
    public function setDataVencimento($dataVencimento){
        $this->dataVencimento = $dataVencimento;
    }
    public function getDataPagamento(){
        return $this->dataPagamento;
    }
    public function setDataPagamento($dataPagamento){
        $this->dataPagamento = $dataPagamento;
    }
    public function getNumeroParcela(){
        return $this->numeroParcela;
    }
    public function setNumeroParcela($numeroParcela){
        $this->numeroParcela = $numeroParcela;
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
    public function getStatusPagamento(){
        return $this->statusPagamento;
    }
    public function setStatusPagamento($statusPagamento){
        $this->statusPagamento = $statusPagamento;
    }
}
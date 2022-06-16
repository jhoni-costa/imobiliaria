<?php
require_once 'AbstractObj.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe com os atributos de um Contrato                                             *
 *                                                                                          *
 ********************************************************************************************/
class Contrato extends AbstractObj{

    private int $id;
    private int $imovelId;
    private int $clienteId;
    private int $proprietarioId;
    private date $dataInicio;
    private date $dataFim;
    private float $taxaAdmistracao;
    private float $valorAluguel;
    private float $valorCondominio;
    private float $valorIPTU;

     /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function getImovelId(){
        return $this->imovelId;
    }
    public function setImovelId(int $imovelId){
        $this->imovelId = $imovelId;
    }
    public function getClienteId(){
        return $this->clienteId;
    }
    public function setClienteId(int $clienteId){
        $this->clienteId = $clienteId;
    }
    public function getProprietarioId(){
        return $this->proprietarioId;
    }
    public function setProprietarioId(int $proprietarioId){
        $this->proprietarioId = $proprietarioId;
    }
    public function getDataInicio(){
        return $this->dataInicio;
    }
    public function setDataInicio(date $dataInicio){
        $this->dataInicio = $dataInicio;
    }
    public function getDataFim(){
        return $this->dataFim;
    }
    public function setDataFim(date $dataFim){
        $this->dataFim = $dataFim;
    }
    public function getTaxaAdmistracao(){
        return $this->taxaAdmistracao;
    }
    public function setTaxaAdmistracao(float $taxaAdmistracao){
        $this->taxaAdmistracao = $taxaAdmistracao;
    }
    public function getValorAluguel(){
        return $this->valorAluguel;
    }
    public function setValorAluguel(float $valorAluguel){
        $this->valorAluguel = $valorAluguel;
    }
    public function getValorCondominio(){
        return $this->valorCondominio;
    }
    public function setValorCondominio(float $valorCondominio){
        $this->valorCondominio = $valorCondominio;
    }
    public function getValorIPTU(){
        return $this->valorIPTU;
    }
    public function setValorIPTU(float $valorIPTU){
        $this->valorIPTU = $valorIPTU;
    }
    
    
}
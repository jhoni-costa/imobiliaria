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

    private $id;
    private $imovelId;
    private $clienteId;
    private $proprietarioId;
    private $dataInicio;
    private $dataFim;
    private $taxaAdmistracao;
    private $valorAluguel;
    private $valorCondominio;
    private $valorIPTU;

     /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getImovelId(){
        return $this->imovelId;
    }
    public function setImovelId($imovelId){
        $this->imovelId = $imovelId;
    }
    public function getClienteId(){
        return $this->clienteId;
    }
    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }
    public function getProprietarioId(){
        return $this->proprietarioId;
    }
    public function setProprietarioId($proprietarioId){
        $this->proprietarioId = $proprietarioId;
    }
    public function getDataInicio(){
        return $this->dataInicio;
    }
    public function setDataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
    public function getDataFim(){
        return $this->dataFim;
    }
    public function setDataFim($dataFim){
        $this->dataFim = $dataFim;
    }
    public function getTaxaAdministracao(){
        return $this->taxaAdmistracao;
    }
    public function setTaxaAdministracao($taxaAdmistracao){
        $this->taxaAdmistracao = $taxaAdmistracao;
    }
    public function getValorAluguel(){
        return $this->valorAluguel;
    }
    public function setValorAluguel($valorAluguel){
        $this->valorAluguel = $valorAluguel;
    }
    public function getValorCondominio(){
        return $this->valorCondominio;
    }
    public function setValorCondominio($valorCondominio){
        $this->valorCondominio = $valorCondominio;
    }
    public function getValorIPTU(){
        return $this->valorIPTU;
    }
    public function setValorIPTU($valorIPTU){
        $this->valorIPTU = $valorIPTU;
    }
    
    /* Mensalidade: 
        Cobran??a de aluguel que ser?? enviada ao locat??rio com as taxas de aluguel, IPTU e Condom??nio */
    public function getValorMensalidade(){
        return $this->getTaxaAdministracao() + $this->getValorAluguel() + ($this->getValorIPTU()/12) + $this->getValorCondominio();
    }
    
    /* Repasse:
        Valor que ser?? repassado da imobili??ria para o locador do im??vel descontando a Taxa de Administra????o.
        Aluguel e IPTU s??o repassados, condom??nio ?? pago pela imobili??ria */
    public function getValorRepasse(){
        return $this->getValorAluguel() + ($this->getValorIPTU()/12);
    }

}
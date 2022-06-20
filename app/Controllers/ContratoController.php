<?php
require_once '../app/Models/Contrato.php';
require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 20/06/2022                                                                        *
 * @desc Controller da entidade Contrato                                                     *
 *                                                                                          *
 ********************************************************************************************/
class ContratoController extends AbstractCrud{
    
    protected $tableName = "tb_contrato";

    public function insert($contrato){     
        $arrayContrato = [
            "imovel_id" => $contrato->getImovelId(),
            "cliente_id" => $contrato->getClienteId(),
            "proprietario_id"=> $contrato->getProprietarioId(),
            "data_inicio" => $contrato->getDataInicio(),
            "data_fim" => $contrato->getDataFim(),
            "taxa_administracao" => $contrato->getTaxaAdministracao(),
            "valor_aluguel" => $contrato->getValorAluguel(),
            "valor_condominio" => $contrato->getValorCondominio(),
            "valor_iptu" => $contrato->getValorIptu()
        ];   
        return parent::insert($arrayContrato);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrContrato = $this->fetchRow($query);
        $contrato = new Contrato();
        $contrato->setId($arrContrato['id']);
        $contrato->setClienteId($arrContrato['cliente_id']);
        $contrato->setProprietarioId($arrContrato['proprietario_id']);
        $contrato->setDataInicio($arrContrato['data_inicio']);
        $contrato->setDataFim($arrContrato['data_fim']);
        $contrato->setTaxaAdministracao($arrContrato['taxa_administracao']);
        $contrato->setValorAluguel($arrContrato['valor_aluguel']);
        $contrato->setValorCondominio($arrContrato['valor_condominio']);
        $contrato->setValorIPTU($arrContrato['valor_iptu']);
        return $contrato;
    }
    
    public function getAll(){
        $query = "select * from {$this->tableName} inner join tb_proprietario on tb_proprietario.id = tb_contrato.proprietario_id";
        $arrImoveis = $this->fetchAll($query);
        // $this->pe($arrImoveis);
        $arr = [];
        foreach($arrImoveis as $data){
            $contrato = new Contrato();
            $contrato->setId($arrContrato['id']);
            $contrato->setClienteId($arrContrato['cliente_id']);
            $contrato->setProprietarioId($arrContrato['proprietario_id']);
            $contrato->setDataInicio($arrContrato['data_inicio']);
            $contrato->setDataFim($arrContrato['data_fim']);
            $contrato->setTaxaAdministracao($arrContrato['taxa_administracao']);
            $contrato->setValorAluguel($arrContrato['valor_aluguel']);
            $contrato->setValorCondominio($arrContrato['valor_condominio']);
            $contrato->setValorIPTU($arrContrato['valor_iptu']);
            $arr[] = $contrato;
        }
        return $arr;
    }

    public function update($contrato, $where = ""){
        $arrayContrato = [
            "cliente_id" => $contrato->getClienteId(),
            "proprietario_id"=> $contrato->getProprietarioId(),
            "data_inicio" => $contrato->getDataInicio(),
            "data_fim" => $contrato->getDataFim(),
            "taxa_administracao" => $contrato->getTaxaAdmistracao(),
            "valor_aluguel" => $contrato->getValorAluguel(),
            "valor_condominio" => $contrato->getValorCondominio(),
            "valor_iptu" => $contrato->getValorIPTU()
        ];
        return parent::update($arrayContrato, "id = {$contrato->getId()}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }
}
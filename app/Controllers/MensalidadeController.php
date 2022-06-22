<?php
ini_set('display_errors', 'on');
error_reporting(-1);
require_once '../app/Models/Mensalidade.php';
require_once "../app/Models/Contrato.php"; 

require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 20/06/2022                                                                        *
 * @desc Controller da entidade Mensalidade                                                *
 *                                                                                          *
 ********************************************************************************************/
class MensalidadeController extends AbstractCrud{
    
    protected $tableName = "tb_mensalidade";

    public function insert($mensalidade){
        $arrayMensalidade = [
            "contrato_id" => $mensalidade->getContratoId(),
            "valor" => $mensalidade->getValor(),
            "data_vencimento"=> $mensalidade->getDataVencimento(),
            "data_pagamento"=> $mensalidade->getDataPagamento(),
            "numero_parcela"=> $mensalidade->getNumeroParcela(),
            "mes_referencia"=> $mensalidade->getMesReferencia(),
            "ano_referencia"=> $mensalidade->getAnoReferencia()
        ]; 
        return parent::insert($arrayMensalidade);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrayMensalidade = $this->fetchRow($query);
        $mensalidade = new Mensalidade();
        $mensalidade->setId($arrayMensalidade['id']);
        $mensalidade->setContratoId($arrayMensalidade['contrato_id']);
        $mensalidade->setValor($arrayMensalidade['valor']);
        $mensalidade->setDataVencimento($arrayMensalidade['data_vencimento']);
        $mensalidade->setDataPagamento($arrayMensalidade['data_pagamento']);
        $mensalidade->setNumeroParcela($arrayMensalidade['numero_parcela']);
        $mensalidade->setMesReferencia($arrayMensalidade['mes_referencia']);
        $mensalidade->setAnoReferencia($arrayMensalidade['ano_referencia']);
        $mensalidade->setStatusPagamento($arrayMensalidade['status_pagamento']);

        return $mensalidade;
    }
    public function getByImovelId($imovelId){
        $query = "
                select 
                        {$this->tableName}.id as mensalidade_id,
                        {$this->tableName}.* 
                    from
                        {$this->tableName} 
                            inner join tb_contrato on tb_contrato.id = {$this->tableName}.contrato_id
                    where
                        tb_contrato.imovel_id = {$imovelId}";
        
        $arrayMensalidade = $this->fetchAll($query);
        // $this->pe($query);
        $arr = [];
        foreach($arrayMensalidade as $data){
            $mensalidade = new Mensalidade();
            $mensalidade->setId($data['mensalidade_id']);
            $mensalidade->setContratoId($data['contrato_id']);
            $mensalidade->setValor($data['valor']);
            $mensalidade->setDataVencimento($data['data_vencimento']);
            $mensalidade->setDataPagamento($data['data_pagamento']);
            $mensalidade->setNumeroParcela($data['numero_parcela']);
            $mensalidade->setMesReferencia($data['mes_referencia']);
            $mensalidade->setAnoReferencia($data['ano_referencia']);
            $mensalidade->setStatusPagamento($data['status_pagamento']);
            $arr[] = $mensalidade;
        }
        return $arr;
    }
    public function getAll(){
        $query = "select * from {$this->tableName}";
        $arrayMensalidade = $this->fetchAll($query);
        $arr = [];
        foreach($arrayMensalidade as $data){
            $mensalidade = new Mensalidade();
            $mensalidade->setId($data['id']);
            $mensalidade->setContratoId($data['contrato_id']);
            $mensalidade->setValor($data['valor']);
            $mensalidade->setDataVencimento($data['data_vencimento']);
            $mensalidade->setDataPagamento($data['data_pagamento']);
            $mensalidade->setNumeroParcela($data['numero_parcela']);
            $mensalidade->setMesReferencia($data['mes_referencia']);
            $mensalidade->setAnoReferencia($data['ano_referencia']);
            $mensalidade->setStatusPagamento($data['status_pagamento']);
            $arr[] = $mensalidade;
        }
        return $arr;
    }
    public function update($mensalidade, $where = ""){
        $arrayMensalidade = [
            "contrato_id" => $mensalidade->getContratoId(),
            "valor" => $mensalidade->getValor(),
            "data_vencimento"=> $mensalidade->getDataVencimento(),
            "data_pagamento"=> $mensalidade->getDataPagamento(),
            "numero_parcela"=> $mensalidade->getNumeroParcela(),
            "mes_referencia"=> $mensalidade->getMesReferencia(),
            "ano_referencia"=> $mensalidade->getAnoReferencia(),
            "status_pagamento" => $mensalidade->getStatusPagamento()
        ]; 
        return parent::update($arrayMensalidade, "id = {$mensalidade->getId()}");
    }
    public function validaPagamento($id){
        $arrayMensalidade = [
            "data_pagamento"=> date('Y-m-d'),
            "status_pagamento" => '1'
        ]; 
        return parent::update($arrayMensalidade, "id = {$id}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }

    public function gerarMensalidadesAno($contrato){
        // $this->pe($contrato);
        $mes_atual = date('m');
        $ano_atual = date('Y');
        
        for($numParcela = 1; $numParcela <= 12; $numParcela++){
                                    
            $mensalidade = new Mensalidade();
            $mensalidade->setContratoId($contrato->getId());
            $mensalidade->setValor($contrato->getValorMensalidade());
            $mensalidade->setNumeroParcela($numParcela);
            $mensalidade->setAnoReferencia($ano_atual);
            $mensalidade->setMesReferencia($mes_atual++);
            $mensalidade->setDataPagamento('0000-00-00');
            if($mes_atual == 13){
                $mes_atual = 1;
                $ano_atual++;
            }
            $dataVencimento = "{$ano_atual}-{$mes_atual}-01";
            // Vencimento é sempre no primeiro dia do mês
            $mensalidade->setDataVencimento($dataVencimento);
            // $this->pe($mensalidade);
            $this->insert($mensalidade);
        }

    }
}
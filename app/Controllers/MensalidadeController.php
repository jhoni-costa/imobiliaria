<?php
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
    public function getAll(){
        $query = "select * from {$this->tableName}";
        $arrClientes = $this->fetchAll($query);
        $arr = [];
        foreach($arrClientes as $data){
            $mensalidade = new Mensalidade();
            $mensalidade->setId($arrayMensalidade['id']);
            $mensalidade->setContratoId($arrayMensalidade['contrato_id']);
            $mensalidade->setValor($arrayMensalidade['valor']);
            $mensalidade->setDataVencimento($arrayMensalidade['data_vencimento']);
            $mensalidade->setDataPagamento($arrayMensalidade['data_pagamento']);
            $mensaldiade->setNumeroParcela($arrayMensalidade['numero_parcela']);
            $mensalidade->setMesReferencia($arrayMensalidade['mes_referencia']);
            $mensalidade->setAnoReferencia($arrayMensalidade['ano_referencia']);
            $mensalidade->setStatusPagamento($arrayMensalidade['status_pagamento']);
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

    public function delete($id){
        parent::delete("id = {$id}");
    }

    public function gerarMensalidadesAno($contrato){
        $mes_atual = date('m');
        $ano_atual = date('y');
        
        for($numParcela = 1; $numParcela <= 12; $numParcela++){
                                    
            $mensalidade = new Mensalidade();
            $mensalidade->setContratoId($contrato->getId());
            $mensalidade->setValor($contrato->getValorMensalidade());
            $mensalidade->setNumeroParcela($numParcela);
            $mensalidade->setAnoReferencia($ano_atual);
            $mensalidade->setMesReferencia($mes_atual++);
            if($mes_atual == 13){
                $mes_atual = 1;
                $ano_atual++;
            }
            $dataVencimento = "{$ano_atual}-{$mes_atual}-01";
            // Vencimento é sempre no primeiro dia do mês
            $mensalidade->setDataVencimento($dataVencimento);

            $this->insert($mensalidade);
        }

    }
}
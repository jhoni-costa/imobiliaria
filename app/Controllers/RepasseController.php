<?php
ini_set('display_errors', 'on');
error_reporting(-1);
require_once '../app/Models/Repasse.php';
require_once '../app/Models/Contrato.php';
require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 20/06/2022                                                                        *
 * @desc Controller da entidade Repasse                                                *
 *                                                                                          *
 ********************************************************************************************/
class RepasseController extends AbstractCrud{
    
    protected $tableName = "tb_repasse";

    public function insert($repasse){
        $arrayRepasse = [
            "contrato_id" => $repasse->getContratoId(),
            "valor" => $repasse->getValor(),
            "data_repasse"=> $repasse->getDataRepasse(),
            "numero_repasse"=> $repasse->getNumeroRepasse(),
            "mes_referencia"=> $repasse->getMesReferencia(),
            "ano_referencia"=> $repasse->getAnoReferencia()
        ]; 
        return parent::insert($arrayRepasse);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrayRepasse = $this->fetchRow($query);
        $repasse = new Repasse();
        $repasse->setId($arrayRepasse['id']);
        $repasse->setContratoId($arrayRepasse['contrato_id']);
        $repasse->setValor($arrayRepasse['valor']);
        $repasse->setDataRepasse($arrayRepasse['data_repasse']);
        $repasse->setNumeroRepasse($arrayRepasse['numero_repasse']);
        $repasse->setMesReferencia($arrayRepasse['mes_referencia']);
        $repasse->setAnoReferencia($arrayRepasse['ano_referencia']);
        $repasse->setStatusRepasse($arrayRepasse['status_repasse']);

        return $repasse;
    }
    public function getByImovelId($imovelId){
        $query = "
                select 
                        {$this->tableName}.id as repasse_id,
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
            $repasse = new Repasse();
            $repasse->setId($data['repasse_id']);
            $repasse->setContratoId($data['contrato_id']);
            $repasse->setValor($data['valor']);
            $repasse->setDataRepasse($data['data_repasse']);
            $repasse->setNumeroRepasse($data['numero_repasse']);
            $repasse->setMesReferencia($data['mes_referencia']);
            $repasse->setAnoReferencia($data['ano_referencia']);
            $repasse->setStatusRepasse($data['status_repasse']);
            $arr[] = $repasse;
        }
        return $arr;
    }
    public function getAll(){
        $query = "select * from {$this->tableName}";
        $arrClientes = $this->fetchAll($query);
        $arr = [];
        foreach($arrClientes as $data){
            $repasse = new Repasse();
            $repasse->setId($arrayRepasse['id']);
            $repasse->setContratoId($arrayRepasse['contrato_id']);
            $repasse->setValor($arrayRepasse['valor']);
            $repasse->setDataRepasse($arrayRepasse['data_repasse']);
            $repasse->setNumeroRepasse($arrayRepasse['numero_repasse']);
            $repasse->setMesReferencia($arrayRepasse['mes_referencia']);
            $repasse->setAnoReferencia($arrayRepasse['ano_referencia']);
            $repasse->setStatusRepasse($arrayRepasse['status_repasse']);
            $arr[] = $repasse;
        }
        return $arr;
    }
    public function update($repasse, $where = ""){
        $arrayRepasse = [
            "contrato_id" => $repasse->getContratoId(),
            "valor" => $repasse->getValor(),
            "data_repasse"=> $repasse->getDataRepasse(),
            "numero_repasse"=> $repasse->getNumeroRepasse(),
            "mes_referencia"=> $repasse->getMesReferencia(),
            "ano_referencia"=> $repasse->getAnoReferencia(),
            "status_repasse" => $repasse->getStatusRepasse()
        ]; 
        return parent::update($arrayRepasse, "id = {$repasse->getId()}");
    }
    public function validaRepasse($id){
        $array = [
            "status_repasse" => '1'
        ]; 
        return parent::update($array, "id = {$id}");
    }
    public function delete($id){
        parent::delete("id = {$id}");
    }

    public function gerarRepassesAno($contrato){
        $mes_atual = date('m');
        $ano_atual = date('y');
        

        for($numParcela = 1; $numParcela <= 12; $numParcela++){
                                    
            $repasse = new Repasse();
            $repasse->setContratoId($contrato->getId());
            $repasse->setValor($contrato->getValorRepasse());
            $repasse->setNumeroRepasse($numParcela);
            $repasse->setAnoReferencia($ano_atual);
            $repasse->setMesReferencia($mes_atual++);
            if($mes_atual == 13){
                $mes_atual = 1;
                $ano_atual++;
            }
            $dataRepasse = "{$ano_atual}-{$mes_atual}-01";
            // Vencimento é sempre no primeiro dia do mês
            $repasse->setDataRepasse($dataRepasse);

            $this->insert($repasse);
        }
    }
}
<?php
require_once '../app/Models/Repasse.php';
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
            "ano_referencia"=> $repasse->getAnoReferencia(),
            "status_repasse" => $repasse->getStatusRepasse()
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

    public function delete($id){
        parent::delete("id = {$id}");
    }
}
<?php
require_once '../app/Models/Imovel.php';
require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Controller da entidade Imovel                                                     *
 *                                                                                          *
 ********************************************************************************************/
class ImovelController extends AbstractCrud{
    
    protected $tableName = "tb_imovel";

    public function insert($imovel){     
        $arrayImovel = [
            "rua" => $imovel->getRua(),
            "numero" => $imovel->getNumero(),
            "cep"=> $imovel->getCep(),
            "cidade" => $imovel->getCidade(),
            "estado" => $imovel->getEstado(),
            "proprietario_id" => $imovel->getProprietarioId()
        ];   
        return parent::insert($arrayImovel);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrImovel = $this->fetchRow($query);
        $imovel = new Imovel();
        $imovel->setId($arrImovel['id']);
        $imovel->setRua($arrImovel['rua']);
        $imovel->setNumero($arrImovel['numero']);
        $imovel->setCep($arrImovel['cep']);
        $imovel->setCidade($arrImovel['cidade']);
        $imovel->setProprietarioId($arrImovel['proprietario_id']);
        return $imovel;
    }
    
    public function getAll(){
        $query = "select * from {$this->tableName} inner join tb_proprietario on tb_proprietario.id = tb_imovel.proprietario_id";
        $arrImoveis = $this->fetchAll($query);
        // $this->pe($arrImoveis);
        $arr = [];
        foreach($arrImoveis as $data){
            $imovel = new Imovel();
            $imovel->setId($data['id']);
            $imovel->setRua($data['rua']);
            $imovel->setNumero($data['numero']);
            $imovel->setCep($data['cep']);
            $imovel->setCidade($data['cidade']);
            $imovel->setEstado($data['estado']);
            $imovel->setProprietarioId($data['proprietario_id']);
            $imovel->setProprietario($data['nome']);
            $arr[] = $imovel;
        }
        return $arr;
    }

    public function update($imovel, $where = ""){
        $arrayImovel = [
            "rua" => $imovel->getRua(),
            "numero" => $imovel->getNumero(),
            "cep"=> $imovel->getCep(),
            "cidade" => $imovel->getCidade(),
            "estado" => $imovel->getEstado(),
            "priprietario_id" => $imovel->getProprietarioId()
        ];
        return parent::update($arrayImovel, "id = {$imovel->getId()}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }
}
<?php
require_once '../Models/Imovel.php';
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
        return parent::insert($imovel);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrImovel = $this->fetchRow($query);
        $imovel = new imovel();
        $imovel->setId($arrImovel['id']);
        $imovel->setRua($arrImovel['rua']);
        $imovel->setNumero($arrImovel['numero']);
        $imovel->setCep($arrImovel['cep']);
        $imovel->setCidade($arrImovel['cidade']);
        $imovel->setProprietarioId($arrImovel['proprietario_id']);
        return $imovel;
    }

    public function update($imovel, $where = ""){
        $arrayImovel = [
            "rua" => $imovel->getRua(),
            "numero" => $imovel->getNumero(),
            "cep"=> $imovel->getCep(),
            "cidade" => $imovel->getCidade(),
            "priprietario_id" => $imovel->getProprietarioId()
        ];
        return parent::update($arrayImovel, "id = {$imovel->getId()}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }
}
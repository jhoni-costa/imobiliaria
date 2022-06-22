<?php
require_once '../app/Models/Imovel.php';
require_once '../app/Models/Proprietario.php';
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
        $query = "
            select 
                    {$this->tableName}.id as imovel_id,
                    {$this->tableName}.*,
                    tb_proprietario.id as proprietario_id,
                    tb_proprietario.*
                from {$this->tableName} 
                    inner join tb_proprietario on tb_proprietario.id = {$this->tableName}.proprietario_id 
                where
                    {$this->tableName}.id = {$id}";
        $arrImovel = $this->fetchRow($query);
        // $this->pe($arrImovel);
        $imovel = new Imovel();
        $imovel->setId($arrImovel['imovel_id']);
        $imovel->setRua($arrImovel['rua']);
        $imovel->setNumero($arrImovel['numero']);
        $imovel->setCep($arrImovel['cep']);
        $imovel->setEstado($arrImovel['estado']);
        $imovel->setCidade($arrImovel['cidade']);
        $imovel->setProprietarioId($arrImovel['proprietario_id']);
        
        $proprietario = new Proprietario();
        $proprietario->setId($arrImovel['proprietario_id']);
        $proprietario->setNome($arrImovel['nome']);
        $proprietario->setEmail($arrImovel['email']);
        $proprietario->setTelefone($arrImovel['telefone']);
        $proprietario->setDiaRepasse($arrImovel['dia_repasse']);
        $proprietario->setFlagAtivo($arrImovel['flag_ativo']);

        $imovel->setProprietario($proprietario);

        return $imovel;
    }
    
    public function getAll(){
        $query = "
            select 
                {$this->tableName}.id as imovel_id,
                {$this->tableName}.*,
                tb_proprietario.id as proprietario_id,
                tb_proprietario.*
            from 
                {$this->tableName}
                    inner join tb_proprietario on tb_proprietario.id = {$this->tableName}.proprietario_id";

        $arrImoveis = $this->fetchAll($query);
        // $this->pe($query);
        $arr = [];
        foreach($arrImoveis as $data){
            $imovel = new Imovel();
            $imovel->setId($data['imovel_id']);
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
            "proprietario_id" => $imovel->getProprietarioId()
        ];
        // $this->pe($imovel);
        return parent::update($arrayImovel, "id = {$imovel->getId()}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }

    public function isContrato($id){
        $select = "select ifnull(id,0) as id from tb_contrato where imovel_id = {$id}";
        // $this->p($select);
        $result = $this->fetchRow($select);
        // $this->p($result);
        if($result['id'] > 0){
            return false;
        }else{
            return true;
        }
        
    }
}
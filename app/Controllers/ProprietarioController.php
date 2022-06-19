<?php
require_once '../app/Models/Proprietario.php';
require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Controller da entidade Proprietario                                                *
 *                                                                                          *
 ********************************************************************************************/
class ProprietarioController extends AbstractCrud{
    
    protected $tableName = "tb_proprietario";

    public function insert($proprietario){
        $arrayCliente = [
            "nome" => $proprietario->getNome(),
            "email" => $proprietario->getEmail(),
            "telefone"=> $proprietario->getTelefone(),
            "dia_repasse"=> $proprietario->getDiaRepasse(),
            "flag_ativo" => $proprietario->getFlagAtivo()
        ]; 
        return parent::insert($arrayCliente);
    }

    public function get($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrayProprietario = $this->fetchRow($query);
        $proprietario = new Proprietario();
        $proprietario->setId($arrayProprietario['id']);
        $proprietario->setNome($arrayProprietario['nome']);
        $proprietario->setEmail($arrayProprietario['email']);
        $proprietario->setTelefone($arrayProprietario['telefone']);
        $proprietario->setDiaRepasse($arrayProprietario['dia_repasse']);
        $proprietario->setFlagAtivo($arrayProprietario['flag_ativo']);
        return $proprietario;
    }
    public function getAll(){
        $query = "select * from {$this->tableName}";
        $arrClientes = $this->fetchAll($query);
        $arr = [];
        foreach($arrClientes as $data){
            $proprietario = new Proprietario();
            $proprietario->setId($data['id']);
            $proprietario->setNome($data['nome']);
            $proprietario->setEmail($data['email']);
            $proprietario->setDiaRepasse($data['dia_repasse']);
            $proprietario->setTelefone($data['telefone']);
            $proprietario->setFlagAtivo($data['flag_ativo']);
            $arr[] = $proprietario;
        }
        return $arr;
    }
    public function update($proprietario, $where = ""){
        $arrayProprietario = [
            "nome" => $proprietario->getNome(),
            "email" => $proprietario->getEmail(),
            "telefone"=> $proprietario->getTelefone(),
            "flag_ativo" => $proprietario->getFlagAtivo(),
            "dia_repasse" => $proprietario->getDiaRepasse()
        ];
        return parent::update($arrayProprietario, "id = {$proprietario->getId()}");
    }

    public function delete($id){
        parent::delete("id = {$id}");
    }
}
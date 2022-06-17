<?php
require_once '../Models/Cliente.php';
require_once 'AbstractCrud.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Controller da entidade cliente                                                     *
 *                                                                                          *
 ********************************************************************************************/
class ClienteController extends AbstractCrud{
    
    protected $tableName = "tb_cliente";

    public function insert($cliente){
        $arrayCliente = [
            "nome" => $cliente->getNome(),
            "email" => $cliente->getEmail(),
            "telefone"=> $cliente->getTelefone(),
            "flag_ativo" => $cliente->getFlagAtivo()
        ];
        return parent::insert($arrayCliente);
    }

    public function getCliente($id){
        $query = "select * from {$this->tableName} where id = {$id}";
        $arrCliente = $this->fetchRow($query);
        $cliente = new Cliente();
        $cliente->setId($arrCliente['id']);
        $cliente->setNome($arrCliente['nome']);
        $cliente->setEmail($arrCliente['email']);
        $cliente->setTelefone($arrCliente['telefone']);
        $cliente->setFlagAtivo($arrCliente['flag_ativo']);
        return $cliente;
    }

    public function update($pessoa){
        $arrayCliente = [
            "nome" => $cliente->getNome(),
            "email" => $cliente->getEmail(),
            "telefone"=> $cliente->getTelefone(),
            "flag_ativo" => $cliente->getFlagAtivo()
        ];
        return parent::update($arrayCliente);
    }

    public function delete($id){
        parrent::delete($id);
    }
}
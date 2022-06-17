<?php 
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../Controllers/ClienteController.php";
require_once "AbstractTest.php";

/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe de testes da entidade Cliente                                               *
 *                                                                                          *
 ********************************************************************************************/
class ClienteTest implements AbstractTest{

    private $controller;

    public function __construct(){
        $this->controller = new ClienteController();
    }

    public function testSelect($id){
        // $cliente = $this->controller->get($id);
        // if($cliente instanceof Cliente){
        //     echo "Teste select Cliente concluido!";
        //     $this->con->p($cliente);
        // }
    }

    public function testInsert($cliente){
        $arrayNew = [
            "nome" => $cliente->getNome(),
            "email"=> $cliente->getEmail(),
            'telefone'=> $cliente->getTelefone(),
            "flag_ativo" => $cliente->getFlagAtivo()
        ];
        
        $id = $this->controller->insert($arrayNew);
        if($id > 0){
            echo "Cliente inserido com sucesso!!<br>Id:{$id}";
        }else{
            echo "Erro ao inserir, revise seu código";
        }

    }
    
    public function testUpdate($id){
        // $pessoa = $this->controller->getCliente($id);
        // $pessoa->setNome('Jéssica G. da Costa');
        // $pessoa->setEmail('jessica@emailteste.com');
        // $controller->update($pessoa);
    }
   
    public function testDelete($id){
        // $this->controller->delete($id);
        // $cliente = $this->controller->get($id);
        // if(!$cliente instanceof Cliente){
        //     echo "Registro deletado com sucesso!";
        // }
    }
    
}
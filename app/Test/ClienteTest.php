<?php 

require_once "../Controllers/ClienteController.php";
require_once "AbstractTest.php";

/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe de testes da entidade Cliente                                               *
 *                                                                                          *
 ********************************************************************************************/
class ClienteTeste implements AbstractTest{

    private $controller;

    public __construct(){
        $this->controller = new ClienteController();
    }

    public function testSelect($id){
        $cliente = $this->controller->getCliente($id);
        if($cliente instanceof Cliente){
            echo "Teste select  Cliente concluido!";
            $this->con->p($cliente);
        }
    }

    public function testInsert(){
        $cliente = new Cliente();
        $cliente->setNome("Jéssica Gerzewski");
        $cliente->setEmail("jessicagerzewski@gmail.com");
        $cliente->setTelefone("41999990000");
        $cliente->setFlagAtivo(true);
        
        $id = $this->controller->insert($cliente);
        if($id > 0){
            echo "Cliente inserido com sucesso!!<br>Id:{$id}";
        }else{
            echo "Erro ao inserir, revise seu código";
        }

    }
    public function testUpdate($id){
        $pessoa = $this->controller->getCliente($id);
        $pessoa->setNome('Jéssica G. da Costa');
        $pessoa->setEmail('jessica@emailteste.com');
        $controller->update($pessoa);
    }
   
    public function testDelete($id){
        $this->controller->delete($id);
        $cliente = $this->controller->getCliente($id);
        if(!$cliente instanceof Cliente){
            echo "Registro deletado com sucesso!";
        }
    }
}
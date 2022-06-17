<?php 

require_once "../Controllers/ProprietarioController.php";
require_once "AbstractTest.php";

/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe de testes da entidade Proprietario                                          *
 *                                                                                          *
 ********************************************************************************************/
class ProprietarioTest implements AbstractTest{

    private $controller;

    public __construct(){
        $this->controller = new ProprietarioController();
    }

    public function testSelect($id){
        $proprietario = $this->controller->get($id);
        if($proprietario instanceof Proprietario){
            echo "Teste select Cliente concluido!";
            $this->con->p($proprietario);
        }
    }

    public function testInsert(){
        $proprietario = new Proprietario();
        $proprietario->setNome("Jéssica Gerzewski");
        $proprietario->setEmail("jessicagerzewski@gmail.com");
        $proprietario->setTelefone("41999990000");
        $proprietario->setDiaRepasse(5);
        $proprietario->setFlagAtivo(true);
        
        $id = $this->controller->insert($proprietario);
        if($id > 0){
            echo "Proprietaio inserido com sucesso!!<br>Id:{$id}";
        }else{
            echo "Erro ao inserir, revise seu código";
        }

    }
    public function testUpdate($id){
        $proprietario = $this->controller->getCliente($id);
        $proprietario->setNome('Jéssica G. da Costa');
        $proprietario->setEmail('jessica@emailteste.com');
        $controller->update($proprietario);
    }
   
    public function testDelete($id){
        $this->controller->delete($id);
        $proprietario = $this->controller->get($id);
        if(!$cliente instanceof Cliente){
            echo "Registro deletado com sucesso!";
        }
    }
}
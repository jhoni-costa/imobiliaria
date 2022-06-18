<?php 
ini_set('display_errors', 'on');
error_reporting(-1);

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

    public function __construct(){
        $this->controller = new ProprietarioController();
    }

    public function testSelect($id){
        $proprietario = $this->controller->get($id);
        if($proprietario instanceof Proprietario){
            echo "Teste select Cliente concluido!<br>";
            $this->controller->p($proprietario);
            echo "<hr>";
        }
    }

    public function testInsert($proprietario){
         $arrayNew = [
            "nome" => $proprietario->getNome(),
            "email"=> $proprietario->getEmail(),
            'telefone'=> $proprietario->getTelefone(),
            'dia_repasse' => $proprietario->getDiaRepasse(),
            "flag_ativo" => $proprietario->getFlagAtivo()
        ];
        
        $id = $this->controller->insert($arrayNew);
        if($id > 0){
            echo "Proprietaio inserido com sucesso!!<br>Id:{$id}<hr>";
        }else{
            echo "Erro ao inserir, revise seu código<hr>";
        }

    }
    public function testUpdate($proprietario){
        $this->controller->update($proprietario);
    }
   
    public function testDelete($id){
        $this->controller->delete($id);
        $proprietario = $this->controller->get($id);
        if(!$proprietario instanceof Proprietario){
            echo "Registro deletado com sucesso!<br>";
        }
    }
}
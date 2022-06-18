<?php 
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../Controllers/ImovelController.php";
require_once "AbstractTest.php";

/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe de testes da entidade Imovel                                                *
 *                                                                                          *
 ********************************************************************************************/
class ImovelTest implements AbstractTest{

    private $controller;

    public function __construct(){
        $this->controller = new ImovelController();
    }

    public function testSelect($id){
        $imovel = $this->controller->get($id);
        if($imovel instanceof Imovel){
            echo "Teste select Imovel concluido!<br>";
            $this->controller->p($imovel);
            echo "<hr>";
        }
    }

    public function testInsert($imovel){
        $arrayNew = [
            "rua" => $imovel->getRua(),
            "numero" => $imovel->getNumero(),
            "cep"=> $imovel->getCep(),
            "cidade" => $imovel->getCidade(),
            "proprietario_id" => $imovel->getProprietarioId()
        ];
        
        $id = $this->controller->insert($arrayNew);
        if($id > 0){
            echo "Imovel inserido com sucesso!!<br>Id:{$id}<hr>";
        }else{
            echo "Erro ao inserir, revise seu código<hr>";
        }

    }
    
    public function testUpdate($pessoa){
        $this->controller->update($pessoa);
    }
   
    public function testDelete($id){
        $this->controller->delete($id);
        $imovel = $this->controller->get($id);
        if(!$imovel instanceof Imovel){
            echo "Registro deletado com sucesso!<br>";
        }
    }
    
}
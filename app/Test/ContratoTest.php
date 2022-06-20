<?php 
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../Controllers/ContratoController.php";
require_once "AbstractTest.php";

/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe de testes da entidade Contrato                                               *
 *                                                                                          *
 ********************************************************************************************/
class ContratoTest implements AbstractTest{

    private $controller;

    public function __construct(){
        $this->controller = new ContratoController();
    }

    public function testSelect($id){
        $contrato = $this->controller->get($id);
        if($contrato instanceof Contrato){
            echo "Teste select Contrato concluido!<br>";
            $this->controller->p($contrato);
            echo "<hr>";
        }
    }

    public function testInsert($contrato){
        $arrayNew = [
            "imovel_id" => $contrato->getImovelId(),
            "cliente_id" => $contrato->getClienteId(),
            "proprietario_id"=> $contrato->getProprietarioId(),
            "data_inicio" => $contrato->getDataInicio(),
            "data_fim" => $contrato->getDataFim(),
            "taxa_administracao" => $contrato->getTaxaAdministracao(),
            "valor_aluguel" => $contrato->getValorAluguel(),
            "valor_condominio" => $contrato->getValorCondominio(),
            "valor_iptu" => $contrato->getValorIptu()
        ];   
        
        $id = $this->controller->insert($arrayNew);
        if($id > 0){
            echo "Contrato inserido com sucesso!!<br>Id:{$id}<hr>";
        }else{
            echo "Erro ao inserir, revise seu código<hr>";
        }

    }
    
    public function testUpdate($contrato){
        $this->controller->update($contrato);
    }
   
    public function testDelete($id){
        $this->controller->delete($id);
        $contrato = $this->controller->get($id);
        if(!$contrato instanceof Contrato){
            echo "Registro deletado com sucesso!<br>";
        }
    }
    
}
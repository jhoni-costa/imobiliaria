<?php 
require_once "../Controllers/ClienteController.php";
require_once "AbstractTest.php";

class ClienteTeste implements AbstractTest{

    public function testInsert(){
        $controller = new ClienteController();
        $cliente = new Cliente();
    }
    public function testUpdate(){

    }
    public function testFetchRow(){

    }
    public function testFetchAll(){

    }
    public function testDelete(){

    }
}
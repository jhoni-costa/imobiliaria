<?php
require_once '../Models/Pessoa.php';
require_once 'AbstractCrud.php';

class ClienteController extends AbstractCrud{
    
    protected $tableName = "tb_cliente";

}
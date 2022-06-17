<?php
require_once '../Models/Cliente.php';
require_once 'AbstractCrud.php';

class ClienteController extends AbstractCrud{
    
    protected $tableName = "tb_cliente";

}
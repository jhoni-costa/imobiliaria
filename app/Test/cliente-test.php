
<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once './ClienteTest.php';

$testCliente = new ClienteTest();

$cliente = new Cliente();
$cliente->setNome("Jéssica Gerzewski");
$cliente->setEmail("jessicagerzewski@gmail.com");
$cliente->setTelefone("41999990000");
$cliente->setFlagAtivo(true);

$testCliente->testInsert($cliente);
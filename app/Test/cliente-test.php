<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once './ClienteTest.php';
// require_once '../Controller/ClienteController.php';

$testCliente = new ClienteTest();
$controller = new ClienteCOntroller();

// Teste Insert
$cliente = new Cliente();
$cliente->setNome("Jéssica Gerzewski");
$cliente->setEmail("jessicagerzewski@gmail.com");
$cliente->setTelefone("41999990000");
$cliente->setFlagAtivo(true);

$testCliente->testInsert($cliente);

$cliente2 = new Cliente();
$cliente2->setNome("Jhoni Costa");
$cliente2->setEmail("jrs@gmail.com");
$cliente2->setTelefone("41999990000");
$cliente2->setFlagAtivo(true);

$testCliente->testInsert($cliente2);

// Teste get
$testCliente->testSelect(2);

// Teste Update
$cliente1 = $controller->get(1);
$cliente1->setNome('Jéssica G. da Costa');
$cliente1->setEmail('jessica@emailteste.com');
$testCliente->testUpdate($cliente1);

// Teste Delete
$testCliente->testDelete(1);
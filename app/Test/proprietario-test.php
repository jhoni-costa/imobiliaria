<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once './ProprietarioTest.php';
// require_once '../Controller/ClienteController.php';

$testProprietario = new ProprietarioTest();
$controller = new ProprietarioController();

// Teste Insert
$proprietario = new Proprietario();
$proprietario->setNome("Jéssica Gerzewski");
$proprietario->setEmail("jessicagerzewski@gmail.com");
$proprietario->setTelefone("41999990000");
$proprietario->setDiaRepasse(1);
$proprietario->setFlagAtivo(true);

$testProprietario->testInsert($proprietario);

$proprietario2 = new Proprietario();
$proprietario2->setNome("Jhoni Costa");
$proprietario2->setEmail("jrs@gmail.com");
$proprietario2->setTelefone("41999990000");
$proprietario2->setDiaRepasse(20);
$proprietario2->setFlagAtivo(true);

$testProprietario->testInsert($proprietario2);

// Teste get
$testProprietario->testSelect(2);

// Teste Update
$proprietario1 = $controller->get(1);
$proprietario1->setNome('Jéssica G. da Costa');
$proprietario1->setEmail('jessica@emailteste.com');
$testProprietario->testUpdate($proprietario1);

// Teste Delete
$testProprietario->testDelete(2);
<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once './ImovelTest.php';
// require_once '../Controller/ClienteController.php';

$testImovel = new ImovelTest();
$controller = new ImovelController();

// Teste Insert
$imovel = new Imovel();
$imovel->setRua("Miguel Bertolino Pizzato");
$imovel->setNumero("2656");
$imovel->setCep("83701050");
$imovel->setCidade("Araucária");
$imovel->setEstado("PR");
$imovel->setProprietarioId(1);

$testImovel->testInsert($imovel);

$imovel1 = new Imovel();
$imovel1->setRua("Miguel Bertolino Pizzato");
$imovel1->setNumero("2656");
$imovel1->setCep("83701050");
$imovel1->setCidade("Araucária");
$imovel1->setEstado("PR");
$imovel1->setProprietarioId(3);

$testImovel->testInsert($imovel1);

// Teste get
$testImovel->testSelect(1);

// Teste Update
$imovel2 = $controller->get(1);
$imovel2->setNumero('350');
$imovel2->setProprietarioId(1);
$testImovel->testUpdate($imovel2);

// Teste Delete
$testImovel->testDelete(2);
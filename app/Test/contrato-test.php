<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once './ContratoTest.php';
require_once '../Controllers/ContratoController.php';

$testContrato = new ContratoTest();
$controller = new ContratoCOntroller();

// Teste Insert
$contrato = new Contrato();
$contrato->setImovelId(2);
$contrato->setClienteId(1);
$contrato->setProprietarioId(1);
$contrato->setDataInicio('2022-06-20');
$contrato->setDataFim('2023-06-20');
$contrato->setTaxaAdministracao('100');
$contrato->setValorAluguel(1200);
$contrato->setValorCondominio(100);
$contrato->setValorIPTU(200);
// $contrato->pe($contrato);
$testContrato->testInsert($contrato);

$contrato1 = new Contrato();
$contrato1->setClienteId(1);
$contrato1->setProprietarioId(1);
$contrato1->setDataInicio('2022-06-20');
$contrato1->setDataFim('2023-06-20');
$contrato1->setTaxaAdministracao(100.50);
$contrato1->setValorAluguel(1200);
$contrato1->setValorCondominio(100);
$contrato1->setValorIPTU(204.50);

$testContrato->testInsert($contrato1);

// Teste get
$testContrato->testSelect(2);

// Teste Update
$contrato2 = $controller->get(1);
$contrato2->setDataInicio('2022-01-01');
$contrato2->setDataFim('2023-01-01');
$testContrato->testUpdate($contrato2);

// Teste Delete
$testContrato->testDelete(1);
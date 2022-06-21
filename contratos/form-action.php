<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Models/Contrato.php";
require_once "../app/Controllers/ContratoController.php";


$controller = new ContratoController();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$clienteId = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : '';
$imovelId = isset($_POST['imovel_id']) ? $_POST['imovel_id'] : '';
$dataInicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
$taxaAdministracao = isset($_POST['taxa_administracao']) ? $_POST['taxa_administracao'] : '';
$valorAluguel = isset($_POST['valor_aluguel']) ? $_POST['valor_aluguel'] : '';
$valorCondominio = isset($_POST['valor_condominio']) ? $_POST['valor_condominio'] : '';
$valorIPTU = isset($_POST['valor_iptu']) ? $_POST['valor_iptu'] : "";

// $controller->pe($_POST);'
$contrato = new Contrato();
$contrato->setImovelId($imovelId);
$contrato->setProprietarioId($proprietarioId);
$contrato->setClienteId($clienteId);
$contrato->setDataInicio($dataInicio);
$contrato->setDataFim($dataFim);
$contrato->setTaxaAdministracao($taxaAdmistracao);
$contrato->setValorAluguel($valorAluguel);
$contrato->setValorCondominio($valorCondominio);
$contrato->setValorIPTU($valorIPTU);

if($id > 0){ // Update
    $contrato->setId($id);
    $controller->update($contrato);
}else{ // Insert
    $id = $controller->insert($contrato);
}

if($id > 0){
    header("Location: index.php");
}else{
    header("Location: form.php");
}
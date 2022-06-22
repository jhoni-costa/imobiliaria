<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Models/Contrato.php";
require_once "../app/Controllers/ContratoController.php";
require_once "../app/Controllers/MensalidadeController.php";
require_once "../app/Controllers/RepasseController.php";

$controller = new ContratoController();
$mensalidadeController = new MensalidadeController();
$repasseController = new RepasseController();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$clienteId = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : '';
$proprietarioId = isset($_POST['proprietario_id']) ? $_POST['proprietario_id'] : 0;
$imovelId = isset($_POST['imovel_id']) ? $_POST['imovel_id'] : '';
$dataInicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
$dataFim = date('Y-m-d', strtotime('+1 year', strtotime($dataInicio)));
$taxaAdministracao = isset($_POST['taxa_administracao']) ? $_POST['taxa_administracao'] : '';
$valorAluguel = isset($_POST['valor_aluguel']) ? $_POST['valor_aluguel'] : '';
$valorCondominio = isset($_POST['valor_condominio']) ? $_POST['valor_condominio'] : '';
$valorIPTU = isset($_POST['valor_iptu']) ? $_POST['valor_iptu'] : "";

// $controller->pe($_POST);
$contrato = new Contrato();
$contrato->setImovelId($imovelId);
$contrato->setProprietarioId($proprietarioId);
$contrato->setClienteId($clienteId);
$contrato->setDataInicio($dataInicio);
$contrato->setDataFim($dataFim);
$contrato->setTaxaAdministracao($contrato->formataValor($taxaAdministracao));
$contrato->setValorAluguel($contrato->formataValor($valorAluguel));
$contrato->setValorCondominio($contrato->formataValor($valorCondominio));
$contrato->setValorIPTU($contrato->formataValor($valorIPTU));
// $controller->pe($contrato);
if($id > 0){ // Update
    $contrato->setId($id);
    $controller->update($contrato);
}else{ // Insert
    // $controller->pe($contrato);
    $id = $controller->insert($contrato);
    $contrato->setId($id);
    $mensalidadeController->gerarMensalidadesAno($contrato);
    $repasseController->gerarRepassesAno($contrato);
}

if($id > 0){
    header("Location: ../imoveis/");
}else{
    header("Location: form.php");
}
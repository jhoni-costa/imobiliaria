<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Models/Proprietario.php";
require_once "../app/Controllers/ProprietarioController.php";

$id = 0;
$controller = new ProprietarioController();

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$flag_ativo = isset($_POST['flag_ativo']) ? $_POST['flag_ativo'] : '';
$dia_repasse = isset($_POST['dia_repasse']) ? $_POST['dia_repasse'] : '';

// $controller->pe($_POST);'
$proprietario = new Proprietario();
$proprietario->setNome($nome);
$proprietario->setEmail($email);
$proprietario->setTelefone($telefone);
$proprietario->setDiaRepasse($dia_repasse);
$proprietario->setFlagAtivo($flag_ativo);
// $proprietario->pe($proprietario);

$id = $controller->insert($proprietario);
if($id > 0){
    header("Location: index.php");
}else{
    header("Location: form.php");
}
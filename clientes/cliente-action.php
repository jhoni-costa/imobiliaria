<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Models/Cliente.php";
require_once "../app/Controllers/ClienteController.php";

$id = 0;
$controller = new ClienteController();

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$flag_ativo = isset($_POST['flag_ativo']) ? $_POST['flag_ativo'] : '';
// $controller->pe($_POST);'
$cliente = new Cliente();
$cliente->setNome($nome);
$cliente->setEmail($email);
$cliente->setTelefone($telefone);
$cliente->setFlagAtivo($flag_ativo);
// $cliente->pe($cliente);

$id = $controller->insert($cliente);
if($id > 0){
    header("Location: index.php");
}else{
    header("Location: form.php");
}
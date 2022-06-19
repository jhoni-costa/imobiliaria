<pre>
<?php
ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Models/Imovel.php";
require_once "../app/Controllers/ImovelController.php";

$id = 0;
$controller = new ImovelController();

$rua = isset($_POST['rua']) ? $_POST['rua'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$proprietario_id = isset($_POST['proprietario_id']) ? $_POST['proprietario_id'] : "";

// $controller->pe($_POST);'
$imovel = new Imovel();
$imovel->setRua($rua);
$imovel->setNumero($numero);
$imovel->setCep($cep);
$imovel->setCidade($cidade);
$imovel->setEstado($estado);
$imovel->setProprietarioId($proprietario_id);
// $imovel->pe($imovel);

$id = $controller->insert($imovel);
if($id > 0){
    header("Location: index.php");
}else{
    header("Location: form.php");
}
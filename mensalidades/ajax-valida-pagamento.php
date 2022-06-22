<?php

ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Controllers/MensalidadeController.php";
$controller = new MensalidadeController();

$id = isset($_POST['id']) ? $_POST['id'] : 0;

$controller->validaPagamento($id);

echo json_encode(['ok'=>1]);
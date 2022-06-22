<?php

ini_set('display_errors', 'on');
error_reporting(-1);

require_once "../app/Controllers/RepasseController.php";
$controller = new RepasseController();

$id = isset($_POST['id']) ? $_POST['id'] : 0;

$controller->validaRepasse($id);

echo json_encode(['ok'=>1]);
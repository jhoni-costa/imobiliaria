<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);
    require_once '../app/Controllers/ImovelController.php';
    require_once '../app/Controllers/ClienteController.php';
    require_once '../app/Models/Imovel.php';

    $controllerImovel = new ImovelController();
    $controllerCliente = new ClienteController();
    
    $currentImovel = new Imovel();
    $listaClientes = [];
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if($id > 0){
        $currentImovel = $controllerImovel->get($id);
        $listaClientes = $controllerCliente->getAll();

        // $controller->pe($listaClientes);
    }
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row' id='div-cliente-contrato'>
                <div class='col-sm-12 page-title'>
                    <h4>Gerar Contrato</h4>
                </div>
                <form action='' id='form-contrato' action='POST'>
                    <div class='mb-3 col-3' imovel_id='<?= $currentImovel->getId()?>'>
                        <label for="cliente-contrato" class="form-label">Cliente:</label>
                        <select class='form-select' name='cliente-contrato' id='cliente-contrato'>
                        <option val=''>[selecione]</option>
                        <?php foreach($listaClientes as $cliente){ ?>
                            <option val='<?=$cliente->getId()?>'><?=$cliente->getNome()?></option>
                        <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<script>
    voltar = () => {
        window.location.href = 'index.php';
    }

    gerarContrato = () => {
        if(confirm("Deseja gerar um contrato para este imovel?")){
            $('#div-cliente-contrato').toggle();
        }
    }
</script>

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
                <div class='row'>
                    <form action='form-action.php' id='form-contrato' method='POST'>
                        <div class='row'>
                            <div>
                                <input type='hidden' name='proprietario_id' value='<?=$currentImovel->getProprietarioId()?>'>
                            </div>
                            <div class='mb-3 col-sm-6'>
                                <label for="cliente-contrato" class="form-label">Cliente:</label>
                                <select class='form-select' name='cliente_id' id='cliente_id'>
                                <option val=''>[selecione]</option>
                                <?php foreach($listaClientes as $cliente){ ?>
                                    <option value='<?=$cliente->getId()?>'><?=$cliente->getNome()?></option>
                                <?php } ?>
                                </select>
                            </div>
                        <div class='mb-3 col-sm-2'>
                            <label from='data_inicio' class='form-label'>Inicio</label>
                            <input type='date' class='form-control' name='data_inicio' id='data_inicio'>
                            <input type='hidden' name='imovel_id' value='<?= $currentImovel->getId()?>'>
                        </div>
                        </div>
                        <div class='row'>    
                            <div class='mb-3 col-sm-2'>
                                <label from='taxa_administracao' class='form-label'>Taxa Administração</label>
                                <input type='text' class='form-control' name='taxa_administracao' id='taxa_administracao'>
                            </div>
                            <div class='mb-3 col-sm-2'>
                                <label from='valor_aluguel' class='form-label'>Valor Aluguel</label>
                                <input type='text' class='form-control' name='valor_aluguel' id='valor_aluguel'>
                            </div>
                            <div class='mb-3 col-sm-2'>
                                <label from='valor_condominio' class='form-label'>Valor Condominio</label>
                                <input type='text' class='form-control' name='valor_condominio' id='valor_condominio'>
                            </div>
                            <div class='mb-3 col-sm-2'>
                                <label from='valor_iptu' class='form-label'>Valor IPTU</label>
                                <input type='text' class='form-control' name='valor_iptu' id='valor_iptu'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='mb-3 col-sm-3'>
                                <button type='submit' class='btn btn-primary'>Gerar Contrato</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    voltar = () => {
        window.location.href = 'index.php';
    }
</script>

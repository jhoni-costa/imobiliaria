<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);
    require_once '../app/Controllers/ProprietarioController.php';
    require_once '../app/Controllers/ImovelController.php';
    require_once '../app/Controllers/ClienteController.php';
    require_once '../app/Models/Imovel.php';

    $controller = new ProprietarioController();
    $controllerImovel = new ImovelController();
    $controllerCliente = new ClienteController();

    $estados = $controller->getEstados();
    $proprietarios = $controller->getAll();
    
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
            <div class='row'>
            <div class='col-sm-12 page-title'>
                <h3>Cadastro de Imóveis</h3>
            </div>
                <div class='col-sm-12'>
                    <form class='form' method='POST' action='imovel-action.php '>
                        <div>
                            <input type="hidden" name='id' value='<?= $currentImovel->getId()?>'>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-8">
                                <label for="rua" class="form-label">Rua:</label>
                                <input type="text" name='rua' required class="form-control" id="rua" placeholder="Rua..." value='<?= $currentImovel->getRua()?>'>
                            </div>
                            <div class="mb-3 col-sm-1">
                                <label for="numero" class="form-label">N°:</label>
                                <input type="numero" name='numero' required class="form-control" id="numero" placeholder="514" value='<?= $currentImovel->getNumero()?>'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-2">
                                <label for="cep" class="form-label">CEP:</label>
                                <input type="text" name='cep' required class="form-control" id="cep" placeholder="00000-000" value='<?= $currentImovel->getCep()?>'>
                            </div>
                            <div class="mb-3 col-sm-5">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" name='cidade' required class="form-control" id="cidade" placeholder="Curitiba" value='<?= $currentImovel->getCidade()?>'>
                            </div>
                            <div class="mb-3 col-sm-2">
                                <label for="estado" class="form-label">Estado:</label>
                                <select class='form-control' required name='estado'>
                                    <option val=''>[selecione]</option>
                                    <?php foreach($estados as $estado){?>
                                        <option <?=$currentImovel->getEstado() == $estado['uf'] ? 'selected' : '' ?> value='<?=$estado['uf']?>'><?=$estado['nome']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-2">
                            <label for="proprietario_id" class="form-label">Proprietário:</label>
                            <select class="form-select" required name='proprietario_id' id='proprietario_id'>
                                <option val=''>[selecione]</option>
                                <?php foreach($proprietarios as $proprietario){ print_r($proprietario);?>
                                    <option <?=$currentImovel->getProprietarioId() == $proprietario->getId() ? 'selected' : '' ?> value='<?=$proprietario->getId()?>'><?=$proprietario->getNome()?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class='btn btn-primary btn-sm'>Salvar</button>
                            <button type="button" class='btn btn-warning btn-sm' onclick='voltar()'>Voltar</button>
                            <?php if($id > 0){?>
                                <button type='button' class='btn btn-success btn-sm' onclick='gerarContrato(<?= $currentImovel->getId(); ?>)'>Gerar Contrato</button>
                            <?php } ?>
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

    gerarContrato = (id) => {
        if(confirm("Deseja gerar um contrato para este imovel?")){
            window.location.href = `../contratos/form.php?id=${id}`;
        }
    }
</script>

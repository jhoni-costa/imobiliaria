<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);
    require_once '../app/Controllers/ImovelController.php';
    require_once '../app/Models/Imovel.php';
    $controller = new ImovelController();
    $imoveis = $controller->getAll();
    $estados = $controller->getEstados();
    // $controller->pe($estados);
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h3>Imoveis</h3>
                    <button class='btn btn-primary btn-sm' onclick='openForm()'>Novo</button>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Código</td>
                                <td>Rua</td>
                                <td>Nº</td>
                                <td>CEP</td>
                                <td>Cidade</td>
                                <td>Estado</td>
                                <td>Proprietário</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($imoveis) > 0){ ?>
                                <?php foreach ($imoveis as $key => $value) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->getId()?></td>
                                    <td><?= $value->getRua()?></td>
                                    <td><?= $value->getNumero()?></td>
                                    <td><?= $value->getCep()?></td>
                                    <td><?= $value->getCidade()?></td>
                                    <td><?= $value->getEstado()?></td>
                                    <td><?= $value->getProprietario()?></td>
                                </tr>
                                <?php } ?>
                            <?php }else{ ?>
                                <td colspan='8'>Nenhum registro encontrado...</td>
                            <?php } ?>
                            <tr>
                            </tr>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    openForm = () => {
        window.location.href = 'form.php';
    }
</script>
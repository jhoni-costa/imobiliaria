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
                                <td>Ações</td>
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
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Ações
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item" href="form.php?id=<?=$value->getId()?>">Ver</a></li>
                                                <li><a class="dropdown-item" href="../mensalidades/index.php?id=<?=$value->getId()?>">Mensalidades</a></li>
                                                <li><a class="dropdown-item" href="#">Repasses</a></li>
                                            </ul>
                                        </div>
                                    </td>
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
    openForm = (id = 0) => {
        if(id == 0){
            window.location.href = 'form.php';
        }else{
            window.location.href = `form.php?id=${id}`;
        }
    }
</script>
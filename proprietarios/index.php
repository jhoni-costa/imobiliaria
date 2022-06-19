<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);
    require_once '../app/Controllers/ProprietarioController.php';
    require_once '../app/Models/Proprietario.php';
    $controller = new ProprietarioController();
    $proprietarios = $controller->getAll();
    // $controller->pe($proprietarios);
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h3>Proprietarios</h3>
                    <button class='btn btn-primary btn-sm' onclick='openForm()'>Novo</button>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Código</td>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Telefone</td>
                                <td>Dia de repasse</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($proprietarios) > 0){ ?>
                                <?php foreach ($proprietarios as $key => $value) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->getId()?></td>
                                    <td><?= $value->getNome()?></td>
                                    <td><?= $value->getEmail()?></td>
                                    <td><?= $value->getTelefone()?></td>
                                    <td><?= $value->getDiaRepasse()?></td>
                                    <td><?= $value->getFlagAtivo() == 1 ? 'Ativo' : 'Inativo'?></td>
                                </tr>
                                <?php } ?>
                            <?php }else{ ?>
                                <td colspan='7'>Nenhum registro encontrado...</td>
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
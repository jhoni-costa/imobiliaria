<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);
    require_once '../app/Controllers/ClienteController.php';
    require_once '../app/Models/Cliente.php';
    $controller = new ClienteController();
    $clientes = $controller->getAll();
    // $controller->pe($clientes);
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h3>Clientes</h3>
                    <button class='btn btn-primary btn-sm' onclick='openForm()'>Novo</button>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Código</td>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Telefone</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($clientes) > 0){ ?>
                                <?php foreach ($clientes as $key => $value) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->getId()?></td>
                                    <td><?= $value->getNome()?></td>
                                    <td><?= $value->getEmail()?></td>
                                    <td><?= $value->getTelefone()?></td>
                                    <td><?= $value->getFlagAtivo() == 1 ? 'Ativo' : 'Inativo'?></td>
                                </tr>
                                <?php } ?>
                            <?php }else{ ?>

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
<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);

    require_once "../app/Controllers/RepasseController.php";
    $controller = new RepasseController();

    $imovelId = isset($_GET['id']) ? $_GET['id'] : 0;
    $listaRepasses = $controller->getByImovelId($imovelId);
    // $controller->pe($listaRepasses);
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h3>Repasses</h3>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nº</td>
                                <td>Valor</td>
                                <td>Data Repasse</td>
                                <td>Referência</td>
                                <td>Status</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($listaRepasses) > 0){ ?>
                                <?php foreach ($listaRepasses as $key => $value) { ?>
                                <tr class='<?= $value->getStatusRepasse() == 1 ? "table-success" : "" ?> <?= $value->getDataRepasse() < date('Y-m-d') ? "table-danger" : "" ?>'>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->getNumeroRepasse()?></td>
                                    <td>R$ <?= round($value->getValor(),2)?></td>
                                    <td><?= $value->getDataRepasse()?></td>
                                    <td><?= $value->getMesReferencia() . "/" . $value->getAnoReferencia()?></td>
                                    <td><?= $value->getStatusRepasse() == 1 ? "OK" : "Pendente" ?></td>
                                    <td style='text-align: center; cursor: pointer' onclick='confirmarPagamento(<?=$value->getId()?>)'><i class="fa-regular fa-thumbs-up"></i></td>
                                </tr>
                                <?php } ?>
                            <?php }else{ ?>
                                <td colspan='8'>Nenhum registro encontrado...</td>
                            <?php } ?>
                            <tr>
                            </tr>    
                        </tbody>
                    </table>
                    <button type="button" class='btn btn-warning btn-sm' onclick='voltar()'>Voltar</button>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
     voltar = () => {
        window.location.href = '../imoveis/index.php';
    }

    confirmarPagamento = (id) =>{
        if(confirm("Deseja confirmar este repasse?")){
            $.ajax({
                url : "ajax-valida-repasse.php",
                type : 'post',
                dataType: 'json',
                data : {
                    id : id
                },
                success : function(json){
                    if(json.ok == 1){
                        alert("Repasse confirmado!");
                        window.location.reload(true);
                    }
                }
            })
        }
    }
</script>
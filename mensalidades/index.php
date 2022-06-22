<?php 
    ini_set('display_errors', 'on');
    error_reporting(-1);

    require_once "../app/Controllers/MensalidadeController.php";
    $controller = new MensalidadeController();

    $imovelId = isset($_GET['id']) ? $_GET['id'] : 0;
    $listaMensalidades = $controller->getByImovelId($imovelId);
    // $controller->pe($listaMensalidades);
?>
<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h3>Mensalidades</h3>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nº</td>
                                <td>Valor</td>
                                <td>Data Vencimento</td>
                                <td>Data Pagamento</td>
                                <td>Referência</td>
                                <td>Status</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($listaMensalidades) > 0){ ?>
                                <?php foreach ($listaMensalidades as $key => $value) { ?>
                                <tr class='<?= $value->getStatusPagamento() == 1 ? "table-success" : "" ?> <?= $value->getDataVencimento() < date('Y-m-d') ? "table-danger" : "" ?>'>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->getNumeroParcela()?></td>
                                    <td><?= $value->getValor()?></td>
                                    <td><?= $value->getDataVencimento()?></td>
                                    <td><?= $value->getDataPagamento()?></td>
                                    <td><?= $value->getMesReferencia() . "/" . $value->getAnoReferencia()?></td>
                                    <td><?= $value->getStatusPagamento() == 1 ? "Pago" : "Pendente" ?></td>
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
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    confirmarPagamento = (id) =>{
        if(confirm("Deseja confirmar o pagamento desta mensalidade?")){
            $.ajax({
                url : "ajax-valida-pagamento.php",
                type : 'post',
                dataType: 'json',
                data : {
                    id : id
                },
                success : function(json){
                    if(json.ok == 1){
                        alert("Pagamento da mensalidade confirmado!");
                        window.location.reload(true);
                    }
                }
            })
        }
    }
</script>
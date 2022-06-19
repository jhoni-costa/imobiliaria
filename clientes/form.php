<html>
    <?php include '../util/head.php' ?>
    <body>
        <?php include '../util/navbar.php' ?>
        <div class='container'>
            <div class='row'>
            <div class='col-sm-12 page-title'>
                <h3>Cadastro de Cliente</h3>
            </div>
                <div class='col-sm-12'>
                    <form class='form' method='POST' action='cliente-action.php '>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name='nome' required class="form-control" id="nome" placeholder="Nome...">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" name='email' required class="form-control" id="email" placeholder="seunome@email.com">
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" name='telefone' required class="form-control" id="telefone" placeholder="(41) 99999-9999">
                        </div>
                        <div class="mb-3">
                            <label for="flag_ativo" class="form-label">Ativo:</label>
                            <select class="form-select" required name='flag_ativo' id='flag_ativo'>
                                <option value="0">Inativo</option>    
                                <option selected value="1">Ativo</option>    
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class='btn btn-primary btn-sm'>Cadastrar</button>
                            <button type="button" class='btn btn-warning btn-sm' onclick='voltar()'>Voltar</button>
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

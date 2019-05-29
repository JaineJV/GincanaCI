<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Login de Usuário - Sistema Gincana</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body class="bg-light container col-3">
            <div class="card mx-auto mt-5" style="max-width: 300px;">
                <div class="card-header"> Login de Usuário </div>
                <div class="card-body">
                    <?php
                    $mensagem = $this->session->flashdata('mensagem');
                    if (isset($mensagem)) {
                        echo $mensagem;
                    }
                    ?>
                    <form action="" method="POST" name="login">
                        <div class="form-group">
                            <label for="email">E-mail: </label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="senha"> Senha: </label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Acessar </button>
                        <a class="navbar-brand col-2" href="<?= $this->config->base_url(); ?>/Usuario/cadastrar"><button type="button" class="btn btn-outline-info">Cadastrar</button></a>
                        </div>
                    </form>
                </div>
            </div>
        Esqueceu sua senha?<a href="<?= $this->config->base_url(); ?>/Usuario/redefinirSenha">Clique aqui</a>
    </body>
</html>

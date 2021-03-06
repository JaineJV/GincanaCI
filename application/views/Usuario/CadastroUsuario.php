<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="UTF-8">
        <title> Cadastro de Usuário - Sistema Gincana</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo(isset($mensagem) ? $mensagem : '');
        ?>

        <div class="container">
            <div class="row justify-content-md-center">
                <form action="" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?= (isset($usuario)) ? $usuario->id : ''; ?>">
                        <div class="col-md-11 mb-3">
                            <label for="nome" style="margin-left: 10px; margin-top: 10px"> Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= (isset($usuario)) ? $usuario->nome : ''; ?>" style="margin-left: 12px;">
                        </div>
                        <div class="col-md-11 mb-3">
                            <label for="email" style="margin-left: 10px;"> Email: </label>
                            <input type="text" name="email" id="email" class="form-control" value="<?= (isset($usuario)) ? $usuario->email : ''; ?>" style="margin-left: 12px;">
                        </div>
                        <div class="col-md-11 mb-3">
                            <label for="senha" style="margin-left: 10px;"> Senha: </label>
                            <input type="password" name="senha" id="senha" class="form-control" value="" style="margin-left: 12px;">
                        </div>
                    </div>
                    <hr>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <button class="btn btn-warning" type="submit" value="Submit"><i class="far fa-share-square"></i> Enviar </button>
                        <a class="navbar-brand col-2" href="<?= $this->config->base_url(); ?>/Usuario/login"><button type="button" class="btn btn-outline-danger" value="Reset"><i class="fas fa-ban"></i> Voltar </button></a>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>

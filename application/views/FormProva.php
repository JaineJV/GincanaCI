<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Cadastro de Provas </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
        <div class="shadow rounded card" style="width: 20rem; margin-top: 80px; margin-left: 39%;">
            <div class="card-header bg-success" style="color: white;">Fomulário Prova</div>
            <form action="" method="POST">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?= (isset($prova)) ? $prova->id : ''; ?>">
                    <div class="col-md-11 mb-3">
                        <label for="nome" style="margin-left: 10px; margin-top: 10px"> Nome: </label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?= (isset($prova)) ? $prova->nome : ''; ?>" style="margin-left: 12px;">
                    </div>
                    <div class="col-md-11 mb-3">
                        <label for="tempo" style="margin-left: 10px;"> Tempo: </label>
                        <input type="text" name="tempo" id="tempo" class="form-control" value="<?= (isset($prova)) ? $prova->tempo : ''; ?>" style="margin-left: 12px;">
                    </div>
                    <div class="col-md-11 mb-3">
                        <label for="descricao" style="margin-left: 10px;"> Descrição: </label>
                        <input type="text" name="descricao" id="descricao" class="form-control" value="<?= (isset($prova)) ? $prova->descricao : ''; ?>" style="margin-left: 12px;">
                    </div>
                    <div class="col-md-11 mb-3">
                        <label for="nintegrantes" style="margin-left: 10px;"> N°Integrantes: </label>
                        <input type="text" name="nintegrantes" id="nintegrantes" class="form-control" value="<?= (isset($prova)) ? $prova->nintegrantes : ''; ?>" style="margin-left: 12px;">
                    </div>
                </div>
                <hr>
                <div style="text-align: center; margin-bottom: 10px;">
                <button class="btn btn-primary" type="submit" value="Submit"> Enviar </button>
                <button type="button" class="btn btn-outline-success" value="Reset"> Limpar </button>
                </div>
            </form>
        </div>
    </body>
</html>

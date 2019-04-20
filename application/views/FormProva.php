<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Formulário de Prova </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <nav  class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"><i class="far fa-list-alt"></i> Formulário de Prova </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="ListaProvas.php"> Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="http://127.0.0.1/GincanaCI/index.php/views/FormProva.php"> Lista de Provas </a>
                </div>
            </div>
        </nav>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <form action="" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
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
                        <button class="btn btn-warning" type="submit" value="Submit"><i class="far fa-share-square"></i> Enviar </button>
                        <button type="button" class="btn btn-outline-danger" value="Reset"><i class="fas fa-ban"></i> Limpar </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

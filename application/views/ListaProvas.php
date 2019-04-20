<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Provas </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <nav  class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"><i class="far fa-list-alt"></i> Lista de Provas </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="ListaProvas.php"> Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="http://127.0.0.1/GincanaCI/index.php/views/FormProva.php"> Formulário Prova </a>
                </div>
            </div>
        </nav>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
        <div class="container" >
            <div class="row justify-content-md-center">
                <table border="1" class="table shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
                    <thead  class="thead-dark">
                        <tr>
                            <th scope="col"> Nome </th>
                            <th scope="col"> Tempo </th>
                            <th scope="col"> Descrição </th>
                            <th scope="col"> N°Integrantes </th> 
                            <th scope="col"> Ações </th>
                        </tr>     
                    </thead>
                    <tbody>
                        <?php
                        foreach ($provas as $key => $p) {
                            echo '<tr>';
                            echo '<td scope="row">' . $p->nome . '</td>';
                            echo '<td scope="row">' . $p->tempo . '</td>';
                            echo '<td scope="row">' . $p->descricao . '</td>';
                            echo '<td scope="row">' . $p->nintegrantes . '</td>';
                            echo '<td scope="row" style="text-align: center;">'
                            . '<a href="' . $this->config->base_url() . '/index.php/Prova/alterar/' . $p->id . '" class="btn btn-warning" style="margin-right:4px;"><i class="far fa-edit"></i> Alterar </a>'
                            . '<a href="' . $this->config->base_url() . '/index.php/Prova/deletar/' . $p->id . '" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Deletar </a></td>';

                            echo '</tr>';
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </body>
</html>

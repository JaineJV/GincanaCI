<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Provas </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1> Lista de Provas </h1>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
        <table border="1" class="table">
            <thead class="bg-success" style="color: white;">
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
                    echo '<td>' . $p->nome . '</td>';
                    echo '<td>' . $p->tempo . '</td>';
                    echo '<td>' . $p->descricao . '</td>';
                    echo '<td>' . $p->nintegrantes . '</td>';
                    echo '<td>'
                    . '<a href="' . $this->config->base_url() . '/index.php/Prova/alterar/' . $p->id . '" class="btn btn-warning"> Alterar </a>'
                    . '<a href="' . $this->config->base_url() . '/index.php/Prova/deletar/' . $p->id . '" class="btn btn-outline-danger"> Deletar </a></td>';

                    echo '</tr>';
                }
                ?>

            </tbody>

        </table>
    </body>
</html>

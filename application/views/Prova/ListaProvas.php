                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo(isset($mensagem) ? $mensagem : '');
                ?>
        <div class="container" >
            <div class="row justify-content-md-center">
                <table  class="table table-bordered shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
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
                            . '<a href="' . $this->config->base_url() . 'Prova/alterar/' . $p->id . '" class="btn btn-info" style="margin-right:4px;"><i class="far fa-edit"></i> Alterar </a>'
                            . '<a href="' . $this->config->base_url() . 'Prova/deletar/' . $p->id . '" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i> Deletar </a></td>';

                            echo '</tr>';
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
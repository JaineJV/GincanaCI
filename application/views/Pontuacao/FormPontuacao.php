<?php
$mensagem = $this->session->flashdata('mensagem');
echo(isset($mensagem) ? $mensagem : '');
?>

<div class="container">
    <div class="row justify-content-md-center">
        <form action="" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
            <div class="form-row">
                <input type="hidden" name="id" value="<?= (isset($pontuacao)) ? $pontuacao->id : ''; ?>">
                <div class="col-md-11 mb-3">
                    <label for="id_equipe" style="margin-left: 10px; margin-top: 10px"> Equipe: </label>
                    <select id="id_equipe" class="form-control" name="id_equipe" style="margin-left: 12px;">
                         <option selected>Selecione uma Equipe...</option>
                        <?php
                        foreach ($equipes as $key => $e) {
                            ?> 

                         <option value="<?= $e->id ?>"><?= $e->nome ?></option>
                        <?php }
                        ?>


                    </select>
                </div>
                 <div class="col-md-11 mb-3">
                    <label for="id_equipe" style="margin-left: 10px; margin-top: 10px"> Prova: </label>
                    <select id="id_prova" class="form-control" name="id_prova" style="margin-left: 12px;">
                         <option selected>Selecione uma Prova...</option>
                         <?php
                        foreach ($provas as $key => $p) {
                            ?> 

                         <option value="<?= $p->id ?>"><?= $p->nome ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                 <div class="col-md-11 mb-3">
                    <label for="id_equipe" style="margin-left: 10px; margin-top: 10px"> Usuário: </label>
                    <select id="id_usuario" class="form-control" name="id_usuario" style="margin-left: 12px;">
                         <option selected>Selecione um Usuário...</option>
                         <?php
                        foreach ($usuarios as $key => $u) {
                            ?> 

                         <option value="<?= $u->id ?>"><?= $u->nome ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="col-md-11 mb-3">
                    <label for="nome" style="margin-left: 10px; margin-top: 10px"> Pontos: </label>
                    <input type="text" name="pontos" id="pontos" class="form-control" value="<?= (isset($pontuacao)) ? $pontuacao->pontos : ''; ?>" style="margin-left: 12px;">
                </div>
                <div class="col-md-11 mb-3">
                    <label for="nascimento" style="margin-left: 10px;"> Data/Hora: </label>
                    <input type="text" name="data_hora" id="data_hora" class="form-control" value="<?= (isset($pontuacao)) ? $pontuacao->data_hora : ''; ?>" style="margin-left: 12px;">
                </div>
            </div>
            <hr>
            <div style="text-align: center; margin-bottom: 10px;">
                <button class="btn btn-warning" type="submit" value="Submit"><i class="far fa-share-square"></i> Enviar </button>
                 <a href="<?= $this->config->base_url(); ?>"><button type="button" class="btn btn-outline-danger" value="Reset"> Voltar </button></a>
            </div>
        </form>
    </div>
</div>

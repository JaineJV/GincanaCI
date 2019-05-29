<?php
$mensagem = $this->session->flashdata('mensagem');
echo(isset($mensagem) ? $mensagem : '');
?>

<div class="container">
    <div class="row justify-content-md-center">
        <form action="" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
            <div class="form-row">
                <input type="hidden" name="id" value="<?= (isset($integrante)) ? $integrante->id : ''; ?>">
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
                    <label for="nome" style="margin-left: 10px; margin-top: 10px"> Nome: </label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= (isset($integrante)) ? $integrante->nome : ''; ?>" style="margin-left: 12px;">
                </div>
                <div class="col-md-11 mb-3">
                    <label for="nascimento" style="margin-left: 10px;"> Nascimento: </label>
                    <input type="text" name="nascimento" id="nascimento" class="form-control" value="<?= (isset($integrante)) ? $integrante->nascimento : ''; ?>" style="margin-left: 12px;">
                </div>
                <div class="col-md-11 mb-3">
                    <label for="rg" style="margin-left: 10px;"> RG: </label>
                    <input type="text" name="rg" id="rg" class="form-control" value="<?= (isset($integrante)) ? $integrante->rg : ''; ?>" style="margin-left: 12px;">
                </div>
                <div class="col-md-11 mb-3">
                    <label for="cpf" style="margin-left: 10px;"> CPF: </label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= (isset($integrante)) ? $integrante->cpf : ''; ?>" style="margin-left: 12px;">
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

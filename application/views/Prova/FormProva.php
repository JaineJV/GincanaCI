                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo(isset($mensagem) ? $mensagem : '');
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
                        <a href="<?= $this->config->base_url(); ?>"><button type="button" class="btn btn-outline-danger" value="Reset"> Voltar </button></a>
                    </div>
                </form>
            </div>
        </div>
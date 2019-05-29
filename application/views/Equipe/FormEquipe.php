        <?php
            $mensagem = $this->session->flashdata('mensagem');
            echo(isset($mensagem) ? $mensagem : '');
        ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <form action="" method="POST" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?= (isset($equipe)) ? $equipe->id : ''; ?>">
                        <div class="col-md-11 mb-3">
                            <label for="nome" style="margin-left: 10px; margin-top: 10px"> Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= (isset($equipe)) ? $equipe->nome : ''; ?>" style="margin-left: 12px;">
                        </div>
                    </div>
                    <input type="file" name="userfile">
                     <hr>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <button class="btn btn-warning" type="submit" value="Submit"><i class="far fa-share-square"></i> Enviar </button>
                    </div>
                </form>
            </div>
        </div>
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>

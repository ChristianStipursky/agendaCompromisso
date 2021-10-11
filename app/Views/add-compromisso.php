<!--Inclusão da View app.php-->
<?= $this->extend("app") ?>

<!--Renderização do body da View app.php-->
<?= $this->section("body") ?>

<div class="container" style="margin-top:20px;">
    <div class="text-center">
        <h3><b>Incluir Compromisso</b></h3>
    </div>
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-body">
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <form class="" action="<?= base_url('add-compromisso') ?>" method="post">
                    <div class="form-group">
                        <label for="name">Título</label>
                        <input type="text" class="form-control" name="titulo" ivalue="<?php echo isset($compromisso['titulo']) ? $compromisso['titulo'] : '' ?>" d="titulo">
                    </div>
                    <div class="form-group">
                        <label for="email">Horário</label>
                        <input type="datetime-local" class="form-control" name="data" id="data">
                    </div>
                    <button type="submit" class="btn btn-primary">Incluir</button>
                    <a href="<?= base_url('compromissos') ?>" class="btn btn-info">Listar Compromissos</a>
                </form>
            </div>
        </div>
      </div>  
    </div>
</div>

<!--Fim da Renderização do body da View app.php-->
<?= $this->endSection() ?>
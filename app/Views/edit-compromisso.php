<!--Inclusão da View app.php-->
<?= $this->extend("app") ?>

<!--Renderização do body da View app.php-->
<?= $this->section("body") ?>

<div class="container" style="margin-top:20px;">
<div class="text-center">
    <h3><b>Alterar Compromisso</b></h3>
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
                
                <form class="" action="<?= base_url('edit-compromisso/'.$compromisso['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="name">Título</label>
                        <input type="text" value="<?php echo isset($compromisso['titulo']) ? $compromisso['titulo'] : '' ?>" class="form-control" name="titulo" id="titulo">
                    </div>
                    <div class="form-group">
                        <label for="email">Horário</label>
                        <!-- Formatação do campo datetime-local para mostrar a data correta no componente-->
                        <input type="datetime-local" value="<?php echo(trim(substr($compromisso['horario'],0,10)).'T'.trim(substr($compromisso['horario'],11,5)))?>" class="form-control" name="data" id="data">
                    </div>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    <a href="<?= base_url('compromissos') ?>" class="btn btn-info">Listar Compromissos</a>
                </form>
            </div>
        </div>
      </div>  
    </div>
</div>

<!--Fim da Renderização do body da View app.php-->
<?= $this->endSection() ?>
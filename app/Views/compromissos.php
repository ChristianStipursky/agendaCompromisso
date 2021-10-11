<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Compromissos</title>
    <script>
        function confirma(){
            if(!confirm('Deseja excluir esse compromisso?')){
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
            <div class="card-body">
            <!-- Form de Busca por Período passando para o controle as variáveis $dataini e $datafim para o filtro -->
            <form method="get" action="compromissos" id="periodoForm">
                  <div class="form-group">
                        <label for="dataini">Data inicial</label>
                        <input type="datetime-local" class="form-control" name="dataini" value="<?= isset($dataini) ? trim(substr($dataini,0,10)).'T'.trim(substr($dataini,11,5)) : '' ?>" id="dataini">
                  </div>
                  <div class="form-group">
                        <label for="datafim">Data Final</label>
                        <input type="datetime-local" class="form-control" name="datafim" value="<?= isset($datafim) ? trim(substr($datafim,0,10)).'T'.trim(substr($datafim,11,5)) : ''  ?>" id="datafim">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="button" class="btn btn-info btn-sm" id="btnsearch" value="Pesquisar Período" onclick="document.getElementById('periodoForm').submit();">
                </div>
            </form>
            </div>
        </div>
      </div>
      <div class="col-md-3">
              <!-- Form Element sizes -->
              <div class="card card-primary">
                <div class="card-body">
                <!-- Form de Busca por título passando para o controle a variávei $search -->
                  <form method="get" action="compromissos" id="searchForm">
                    <div class="form-group">
                    <label for="titulo">Buscar</label>
                      <input type="text" class="form-control" name="search" value="<?= $search ?>" placeholder="Busque pelo título aqui...">
                    </div>
                  <div class="card-footer">
                    <input type="button" class="btn btn-info btn-sm" id="btnsearch" value="Pesquisar Título" onclick="document.getElementById('searchForm').submit();">
                  </div>
                  </form>
                </div>
              <!-- /.card-body -->
              </div>
        </div>
     </div>
   </div>
</section>

<div class="container mt-3">
  <div class="text-center">
    <h3>Lista de Compromissos</h3>
    <div class="table-responsive">  
    <?php echo anchor(base_url('add-compromisso'), 'Novo Compromisso', ['class' => 'btn btn-info btn-sm mb-2'])?>
    <?php echo anchor(base_url('compromissos'), 'Listar Todos', ['class' => 'btn btn-info btn-sm mb-2'])?>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Horário</th>
                <th>Ações</th>
            </tr>
            <?php foreach($compromissos as $compromisso):?>
                <tr>
                    <td><?php echo $compromisso['id'] ?></td>
                    <td><?php echo $compromisso['titulo'] ?></td>
                    <td><?php $date = date_create($compromisso['horario']);
                     echo date_format($date,"d/m/Y H:i:s"); ?></td>
                    <td>
                        <?php echo anchor('edit-compromisso/'.$compromisso['id'], 'Editar', ['class' => 'btn btn-primary btn-sm']) ?>
                        -
                        <?php echo anchor('delete-compromisso/'.$compromisso['id'], 'Excluir', ['onclick' => 'return confirma()','class' => 'btn btn-danger btn-sm']) ?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>    
        </table>
    </div>
</div>
        <!-- Paginação customizada Views\pages\bootstrap_pager -->
        <div style='margin-top: 10px;'>
            <?php echo $pager->links('default','boostrap_pagination');?>  
        </div>
          
    </div>
    
</body>
</html>
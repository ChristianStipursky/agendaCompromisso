<!--View para exibição de menssanges-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Compromissos - Menssagens</title>
</head>
<body>
    
    <div class="container mt-5">

        <div class="alert alert-success">
            <?php echo $message; ?>
            <p class="mt-3"><?php echo anchor(base_url('compromissos'), 'Página Inicial', ['class' => 'btn btn-info mb-2'])?></p>
        </div>

    </div>

</body>
</html>
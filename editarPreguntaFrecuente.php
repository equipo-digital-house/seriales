<?php
require_once("autoload.php");

if(isset($_GET["id"])){
  $idPreguntaFrecuente = $_GET["id"];

$preguntaFrecuente = Query::mostrarPreguntaFrecuente($pdo, 'frequentquestions', $idPreguntaFrecuente);

}

if($_POST){
$idPreguntaFrecuente = $_GET["id"];
$actualizarPreguntaFrecuente = Query::actualizarPreguntaFrecuente($pdo, $idPreguntaFrecuente, $_POST);
}


 ?>

<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Editar preguntas frecuentes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/master.css">

    </head>

    <body>
    <h3 class="text-center">Editar pregunta frecuente</h3>
        <div class="row mt-5">
            <div class="col-lg-4 offset-lg-4">

              <form action="" method="post" enctype="multipart/formdata">

                    <div class="form-group">
                        <label for="pregunta">Pregunta</label>
                        <input type="text" class="form-control" name="name" value="<?=$preguntaFrecuente['name'] ?>">
                      </div>

                    <div class="form-group">
                        <label for="respuesta">Respuesta</label>
                        <input type="text" class="form-control" name="answer" value="<?=$preguntaFrecuente['answer'] ?>">
                    </div>

                    <button type="submit" name="modificar" class="btn btn-danger">Modificar pregunta frecuente</button>
                </form>
                <a href="administradorPreguntasFrecuentes.php">Volver</a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>

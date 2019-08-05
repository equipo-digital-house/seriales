<?php

require_once("autoload.php");

if($_GET){
$id_serie=$_GET["id"];
$serieSeleccionada = Query::mostrarQuestions($pdo,'series',$id_serie);
}
if ($_POST){
  if(isset($_POST["serie"])){
    $id_serie=$_POST["serie"];
  }else{
    $id_serie=$_POST["id"];
  }

//pregunto si la pregunta tiene asociada una imagen
if(isset($_POST["checkPregunta"]) and $_POST["checkPregunta"]=="on"){
  //var_dump("entre a check Pregunta");
      //Aquí genero el objeto del tipo pregunta con el archivo file
      $pregunta = new Question($_POST["pregunta"],$id_serie,$_POST["selectNivel"],$_FILES["filePregunta"] );
      //valido la pregunta y la imagen
      $errores = $validar->validacionPreguntaImagen($pregunta);
      if(empty($errores)){

            //armo imagen
            $imagePregunta = $registro->armarImagenPregunta($pregunta->getImage());
            var_dump($imagePregunta);
            // asigno imagen  a pregunta
            $pregunta->setImage($imagePregunta);
            //guardo en base de datos

            BaseMYSQL::guardarPregunta($pdo,$pregunta,'questions');
            redirect ("agregarRespuesta.php");

      }
}
  else {
    //en caso de no tener asociada una imagen
      $pregunta = new Question($_POST["pregunta"],$id_serie,$_POST["selectNivel"]);
    // valido la pregunta
        $errores=$validar->validacionPregunta($pregunta);
        if(count($errores)==0){

          BaseMYSQL::guardarPregunta($pdo,$pregunta,'questions');
          redirect ("agregarRespuesta.php");
      }

  }
}





?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="master.css">
  <title>Registro de Datos</title>
</head>

<body>
  <?php require_once("php/headerAdmin.php");?>
  <div class="container">

    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

      <div class="row">
        <div class="col-md-6 offset-md-3">


          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Pregunta</h2>
            </div>
            <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="administrador.php"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
            </li>

            </ul>
          <form class="registro" action="agregarPreguntas.php" method="post" enctype= "multipart/form-data">
            <?php if($_GET):?>
            <div class="img-thumbnail">
              <img src="<?=$serieSeleccionada[0]["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
              <h2 class="text-center"><?=$serieSeleccionada[0]["name"]?></h2>

            </div>
          <?php else:?>

                <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione la Serie</label>
                <?php
                $listadoSeries=Query::listadoSeries($pdo,'series');?>

                <select name="serie" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach ($listadoSeries as $key => $value):?>
                  <option value="<?=$value["id"];?>"><?=$value["name"];?></option>
                  <?php endforeach;?>
                </select>

              </div>
              <?php endif;?>

          <div class="form-group">
            <label for="InputQuestion">Pregunta</label>
            <input name="pregunta" type="text" class="form-control" value="<?=(isset($errores["pregunta"]) )? "" : inputUsuario("nombre");?>" id="exampleInputEmail1" aria-describedby="questionHelp" placeholder="Ingrese pregunta">
            <small id="questionHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group form-check">
            <input name="checkPregunta" type="checkbox" class="form-check-input" id="checkIddQuestion">
            <label class="form-check-label" for="checkIddQuestion">Asociar imagen a la pregunta</label>
          </div>
          <div class="form-group">
              <input name="filePregunta" type="file" class="form-control-file" id="filePregunta">
              <small id="filePregunta" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">
              <?php  $levels = Query::ListadoLevel($pdo,'levels');?>

            <label for="selectPregunta">Seleccione el Nivel de Pregunta</label>
            <select name="selectNivel" class="form-control" id="selectPregunta">
              <?php foreach ($levels as $key => $value) :?>
              <option value="<?=$value["id"];?>"><?=$value["name"];?></option>

            <?php endforeach;?>
            </select>
            <br>
          </div>

      <input type="hidden" name="id" value="<?=$id_serie;?>">
      <button type="submit" class="btn btn-primary">Guardar Pregunta</button>

    </form>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
</div>
</body>

</html>

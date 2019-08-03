<!DOCTYPE html>
<?php
$acum=0;
require_once("autoload.php");
if (isset($_GET["id"])) {
  $idQuestion=$_GET["id"];

  $mostrarPreguntas=Query::mostrarAnswer($pdo,'questions',$idQuestion);
  if($mostrarPreguntas!=NULL){
  $id_series=$mostrarPreguntas[0]["serie_id"];
  $serieSeleccionada = Query::mostrarSeries($pdo,'series',$id_series);
  }
}
//esto se ejecuta si el usuario indica que desea borrar el usuario
if (isset($_POST["borrar"])) {

    //esto se ejecuta si el usuario indica que desea borrar respuestas
    Query::borrarPreguntas($pdo,'answers',$idQuestion);
    //esto se ejecuta si el usuario indica que desea borrar el preguntas
    Query::borrarPreguntas($pdo,'questions',$idQuestion);

        header('Location:listadoSeriesAdmin.php');
           exit;

}
elseif (isset ($_POST["no"])) {
  header("Location:listadoSeriesAdmin.php");
  exit;
}
 ?>
<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?php require_once("php/headerAdmin.php");?>
<div class="container">
  <div class="card">
    <h5 class="card-header">Eliminar Pregunta</h5>
    <div class="card-body">

      <form class="" action="" method="post">
        <div class="form-group">



    <?php

    if($mostrarPreguntas!=NULL):
           foreach ($serieSeleccionada as $key => $value):
            if($value["image"]!=NULL):?>
            <img class="img-thumbnail rounded rounded mx-auto d-block" src="<?=$value["image"]?>" width=300px alt="">
          <?php endif;?>
            <h3><?= $value["name"] ?></h3>
            <br>

          <?php endforeach;
    endif;

    if($mostrarPreguntas!=NULL):?>

      <h4>Pregunta:<?= $mostrarPreguntas[0]["pregunta"] ?></h4>
      <h4>Nivel:<?= $mostrarPreguntas[0]["nivel"] ?></h4>
      <h4>Puntaje:<?= $mostrarPreguntas[0]["score"] ?></h4>

      <br>

      <?php

      foreach ($mostrarPreguntas as $key => $value):
               $acum++;?>

       <h4>Respuestas Asociadas <?=$acum?>:<?=$mostrarPreguntas[$key]["name"]?> </h4>

    <?php endforeach;

  endif;?>


    <?php


if($acum!=0):?>
    <div class="alert alert-danger" role="alert">
  <p>La pregunta seleccionada, tiene <?= $acum;?> respuestas asociadas, si eliminas la pregunta se ELIMINARAN LAS RESPUESTAS ASOCIADAS A LA Pregunta </p>

  </div>
<?php else:?>
    <div class="alert alert-success" role="alert">
  <p>La Pregunta  no tiene respuestas asociadas.</p>
  </div>
<?php endif;?>

    <form>
    </div>

        <form class="" action="" method="post">
          <p>Esta seguro que quiere eliminar esta Pregunta?</p>
          <input type="submit" name="borrar" value="Si">
          <input type="submit" name="no" value="No">
          <input type="hidden" name="id" value="<?=$id_series;?>">
       </form>

</div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

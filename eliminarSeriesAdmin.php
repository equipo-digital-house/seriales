<!DOCTYPE html>

<?php

$acum=0;
require_once("autoload.php");
if (isset($_GET["id"])) {
  $id_series=$_GET["id"];
  $serieSeleccionada = Query::mostrarSeries($pdo,'series',$id_series);
  $mostrarPreguntas=Query::mostrarQuestions($pdo,'questions',$id_series);
}

//esto se ejecuta si el usuario indica que desea borrar el usuario
if (isset($_POST["borrar"])) {

  Query::borrarUsuario($pdo,'series',$id_series);
  header('Location:listadoSeriesAdmin.php');
  exit;
//var_dump($_POST);
}
elseif (isset ($_POST["pregunta"])) {
  header("Location:mostrarSeriesAdmin.php?id=$id_series");
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
    <h5 class="card-header">Eliminar Serie</h5>
    <div class="card-body">

      <form class="" action="" method="post">
        <div class="form-group">


<?php if($_GET):?>
    <?php foreach ($serieSeleccionada as $key => $value):
      if($value["image"]!=NULL):?>
      <img class="img-thumbnail rounded rounded mx-auto d-block" src="<?=$value["image"]?>" width=300px alt="">
    <?php endif;?>
      <h3><?= $value["name"] ?></h3>
      <br>

    <?php endforeach;?>

    <ul>
    <?php foreach ($serieSeleccionada as $index => $attributes) : ?>
      <?php foreach($attributes as $key => $value): ?>
        <li><?= $key." : ".$value ?> </li>
      <?php endforeach;?>
    <?php endforeach;?>

    <?php foreach ($mostrarPreguntas as $key => $value):
      $acum++;?>

    <?php endforeach;

    if($acum!=0):?>

    <div class="alert alert-danger" role="alert">
  <p>La Serie seleccionada, tiene <?= $acum;?> Preguntas asociadas, DEBERA ELIMINAR LAS PREGUNTAS Y  RESPUESTAS ASOCIADAS A LA SERIE  PARA PODER ELIMINAR LA SERIE</p>
  </div>
    <?php else:?>
    <div class="alert alert-success" role="alert">
  <p>La serie no tiene preguntas asociadas.</p>

  </div>
<?php endif;?>
    </ul>
    <form>
    </div>
<?php if ($acum==0):?>
        <form class="" action="" method="post">
          <p>Esta seguro que quiere eliminar esta Serie?</p>
          <input type="submit" name="borrar" value="Si">
          <input type="submit" name="no" value="No">
          <input type="hidden" name="id" value="<?=$id_series;?>">
       </form>
<?php else:?>
  <form class="" action="" method="post">
    <p>Para eliminar esta serie, primero deberá eliminar las preguntas, ¿Quiere listar las preguntas asociadas a esta serie?</p>
    <input type="submit" name="pregunta" value="Ir a Preguntas">
    <input type="submit" name="no" value="No">
    <input type="hidden" name="id" value="<?=$id_series;?>">
 </form>
<?php endif;?>
<?php else:?>
  <form class="" action="" method="get" enctype= "multipart/form-data">
      <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccione la Serie</label>
      <?php
      $listadoSeries=Query::listadoSeries($pdo,'series');?>

      <select name="serie" class="form-control" id="exampleFormControlSelect1">
          <?php foreach ($listadoSeries as $key => $value):?>
        <option value="<?=$value["id"];?>"><?=$value["name"];?></option>
        <?php endforeach;?>
      </select>
      <br>
    <button name="buscarSerie" type="submit" class="btn btn-primary">Buscar</button>
    </div>
      <?php endif;?>
    </form>
</div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

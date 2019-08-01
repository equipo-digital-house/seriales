<?php
require_once("autoload.php");

if(isset($_GET["id"])){
  $idPreguntaFrecuente = $_GET["id"];

$preguntaFrecuente = Query::mostrarPreguntaFrecuente($pdo, 'frequentquestions', $idPreguntaFrecuente);

}

if(isset($_POST["borrar"])){
  $idPreguntaFrecuente = $_GET["id"];

  Query::eliminarPreguntaFrecuente($pdo, $idPreguntaFrecuente);
  header('Location:administradorPreguntasFrecuentes.php');
  exit;
}elseif (isset($_POST["no"])){
  header("Location:administradorPreguntasFrecuentes.php");
  exit;
}

?>

<html lang="es" dir="ltr">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Lato|Righteous|Ubuntu|Fjalla+One" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" href="css/master.css">
    <title>Borrar pregunta frecuente</title>
  </head>
  <body>

<section class="formulario">

  <div class="col-sm-4 offset-md-4" style="text-align:center;">

    <form class="" action="" method="post">
        <h3 class="eliminarPreguntaFrecuente">¿Eliminar pregunta frecuente?</h3>
        <input class="eliminarFaq" type="submit" name="borrar" value="si">
        <input class="eliminarFaq" type="submit" name="no" value="no">
        <input type="hidden" name="id" value="<?=$idPreguntaFrecuente;?>">
     </form>

     <a class="flechaVolver" href="administradorPreguntasFrecuentes.php"><i class="fas fa-long-arrow-alt-left"></i></a>
       </div>

</div>

</section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

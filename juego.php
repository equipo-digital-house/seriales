<?php
require_once("controladores/funciones.php");

if(!isset($_SESSION["email"])){
  header("location: login.php");
  exit;
}

$titulo = "Jugar";

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php
require_once("php/head.php");
 ?>
  <body>
    <div class="container-fluid p-0">

        <?php

        require_once('php/header.php');
        ?>


      <section>

        <div class="tarjetaJuegoA">

          <?php require_once('php/baseDatos.php');
          foreach ($titulo as $key): ?>
          <h2 class="tituloA"><?=$key["Pregunta"]?></h2>


            <div class="pregunta">
              <div class="respuesta">
                <button type="button" name="button">Stephen Hawking</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">N'sync</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">Kid Rock</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">Backstreet Boys</button>
              </div>

            </div>
      <?php endforeach; ?>
        </div>
      </section>


      <?php include('php/footer.php'); ?>


    </div>
  </body>
</html>

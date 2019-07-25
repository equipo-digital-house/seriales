<?php require_once("controladores/funciones.php");

$titulo = "Inicio";
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
        <div class="tarjeta-1">

          <div class="bannerHome">
            <div id="banner1"><img src="img/banner-home-media.png" alt="bannerHome"></div>
            <div id="banner2"><img src="img/banner-home.png" alt="bannerHome"></div>
          </div>

          <div class="explicacion">
            <p>Seriales es un juego pensado especialmente para lxs amantes de las series. ¡Puede que descubras que no sabes nada, Jon Snow! El objetivo es que respondas correctamente la mayor cantidad de preguntas en el menor tiempo posible y, así, acumules diferentes premios. Encontrarás todo tipo de desafíos: visuales, auditivos y de conocimiento general. ¿Podría ser más genial? A medida que avances en el juego, aumenta el nivel de dificultad de las preguntas. ¡Ay, caramba!
            ¿Creés que te van a divertir? You're goddamn right!</p>
            <a class="botonJugar" href="juego.php">¡Jugar!</a>
          </div>
      </div>
      </section>


      <?php
      require_once('php/footer.php');
      ?>


    </div>
  </body>
</html>

<?php
$titulo = "Mi Perfil";
require_once("autoload.php");
if(!isset($_SESSION["email"])) {
    redirect("registro.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<?php
require_once("php/head.php");
 ?>
<body>
  <div class="container-fluid p-0" >
    <?php
    require_once('php/header.php');
    ?>
    <section class="row  text-center ">
      <article class="col-12  " >
      <h1>Bienvenido: <?=$_SESSION["name"];?> </h1>
      <p>
      <img src="img/img_perfil/<?=$_SESSION["avatar"];?>" alt="Avatar" >
      </p>
     <p>

     </p>
      <a href="logout.php">Cerrar Sesión</a>
      </article>
    </section>

    <?php
    require_once('php/footer.php');
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

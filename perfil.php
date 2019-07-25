<?php
$avatar=null;
$titulo = "Mi Perfil";
$accion=[];
require_once("controladores/funciones.php");
require_once("helpers.php");
$userSession=buscarPorEmail($_SESSION["email"]);


if($_POST) {

$errores=validarPerfil($_POST,'registro');
      if(count($errores)==0){
        if($_FILES)
        {
          $avatar = armarAvatar($_FILES, $_SESSION["email"]);
        }
        $accion=modificarUsuario($_POST,$userSession,$avatar);


       foreach ($accion as $key => $value) {


       if ($key==1){
         $userSession["nombre"]=$_POST["nombre"];

       }
       if ($key==2){
         $userSession["email"]=$_POST["email"];
       }

      if ($key==3){
        $userSession["avatar"]=$avatar;
      }
      if ($key==4){
        session_start();
        session_destroy();
        setcookie("password","",time()-1);
        header("location: login.php?mensaje=1");
        exit;
      }
      }
      }
}
 ?>

<!DOCTYPE html>
<html lang="es">
<?php
require_once("php/head.php");
 ?>
<body>
  <div class="container-fluid p-0" >
    <?php require_once('php/header.php'); ?>

    <main>
      <div class="avatar">
        <img src="img/img_perfil/<?=$userSession["avatar"]?>" width="120" height="120"alt="">
      </div>

      <h2 class="titulo"><?=$userSession["nombre"]?></h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">

          <?php
          if(isset($errores)):?>
          <ul class="alert alert-danger">
            <?php foreach ($errores as $key => $value) :?>
              <li><?=$value;?></li>
            <?php endforeach;?>
          </ul>

        <?php endif;?>
        <?php
        if(isset($accion)):?>
        <ul class="alert alert-success">
          <?php foreach ($accion as $key => $value) :?>
            <li><?=$value;?></li>
          <?php endforeach;?>
        </ul>

        <?php endif;?>


          <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link font-preguntas" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Datos del Usuario
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">

          <p>Nombre usuario: <?=$userSession["nombre"]?></p>
          <p>Email: <?=$userSession["email"]?></p>

        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Modificar Datos
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
            <label for="nombre">Nombre de usuario*</label>
            <input type="text" name="nombre" value="<?=$userSession["nombre"]?>" required>
            <label for="email">Tu correo electrónico*</label>
            <input type="email" name="email" value="<?=$userSession["email"]?>"required>

            <input type="hidden" name="accion" value="<?=1?>">

            <button class="btn-formulario" type="submit" name="submit">¡Modificar!</button>
          </form>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Cambiar Imagen
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
            <label for="avatar">Foto de tu perfil:</label>
            <input  type="file" name="avatar" value="">
            <input type="hidden" name="accion" value="<?=2?>">
            <button class="btn-formulario" type="submit" name="submit">¡Modificar!</button>
          </form>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
            Cambiar Contraseña
          </button>
        </h2>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class="card-body">
          <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
          <label for="password">Nueva Contraseña *</label>
          <input type="password" name="password" value=""required>
          <label for="repassword">Repetir Contraseña*</label>
          <input type="password" name="repassword" value=""required>
          <input type="hidden" name="accion" value="<?=3?>">
          <button class="btn-formulario" type="submit" name="submit">¡Modificar!</button>
        </div>
      </div>
    </div>
  </div>



        </div>
      </div>

    </main>

    <?php
    require_once('php/footer.php');
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

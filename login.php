<?php
  require_once("controladores/funciones.php");
  require_once("helpers.php");
  $titulo = "Login";

  $mostrar="noMostrar";
  $valor=0;
  if($_GET){
  $valor=$_GET["mensaje"];
  }

  if($_POST){
    $errores = validar($_POST,'login');

    if(count($errores) == 0){

      $usuario = buscarPorEmail($_POST["email"]);


      if($usuario == null){
        $errores["email"]= "Usuario / Contraseña invalidos";
      }else{
        if(password_verify($_POST["password"],$usuario["password"])==false){
          $errores["password"]="Usuario / Contraseña invalidos";
        }else {
          seteoUsuario($usuario,$_POST);
          if(validarAcceso()){
            header("location: juego.php");
            exit;
          }else{
            header("location: login.php");
            exit;
          }

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
  <div class="container-fluid p-0">
    <?php
    require_once('php/header.php');
    ?>

    <main>
      <h3 class="subtitulo">¿Querés jugar?</h3>
      <h2 class="titulo">Iniciar sesion</h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <?php if ($valor==1)
            $mostrar="mostrar";?>
            <div class="<?=$mostrar?> alert alert-success">
              <p class=<?=$mostrar?>> Se han ingresado correctamente los datos.</p>
              <p class=<?=$mostrar?>> ¡Vuelva a iniciar sesión para jugar! </p>
          <? endif;
            $valor=0;
            $mostrar="noMostrar"; ?>
          </div>
          <?php
          if(isset($errores)):?>
          <ul class="alert alert-danger">
            <?php foreach ($errores as $key => $value) :?>
              <li><?=$value;?></li>
            <?php endforeach;?>
          </ul>

        <?php endif;?>
          <form class="registro" action="login.php" method="post">
            <label for="email">Email*</label>
            <input type="text" name="email" value="" required>
            <label for="password">Contraseña*</label>
            <input type="password" name="password" value=""required>
            <button class="btn-formulario" type="submit" name="submit">iniciar sesión</button>
            <div class="recordar">
              <input name="recordarme" type="checkbox" id="check1" value="recordarme">
              <label for="check1">Recordarme</label>
            </div>
            <a class="olvidar-pass" href="olvideContraseña.php">¿Olvidó su contraseña?</a>
            <span class="irARegistro">¿No está registradx aún?<a class="olvidar-pass" href="olvideContraseña.php"> Registrate aquí</a></span>
          </form>
        </div>
      </div>
      <p class="aclaracion">Los campos con * deben ser completados</p>
    </main>

    <?php
    require_once('php/footer.php');
    ?>
  </div>
</body>
</html>

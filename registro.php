
<?php
$mostrar="noMostrar";
$valor=0;
require_once("helpers.php");

require_once("controladores/funciones.php");

$titulo = "Registro";

if($_POST) {

  $errores = validar($_POST,'registro');
  $existeUsuario=existeUsuario($_POST["email"]);

  if($existeUsuario==true){

    $errores["email"] = "El correo electrónico está asociado con otro usuario";
    $valor=2;
  } else {

  if(count($errores)== 0){
    $avatar = armarAvatar($_FILES, $_POST["email"]);
    $usuario = armarUsuario($_POST, $avatar);
    guardarUsuario($usuario);
    $valor=1;
    header("location: login.php?mensaje=$valor");
    exit;
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
      <h3 class="subtitulo">¿Todavía no tenés cuenta?</h3>
      <h2 class="titulo">Registrate en segundos</h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <?php if(isset($errores)) :?>
            <ul class="alert alert-danger">
              <?php foreach ($errores as $key => $value) :?>
                <li> <?=$value?></li>
              <?php endforeach;
              if ($valor==2)
              $mostrar="mostrar";?>
              <div class="<?=$mostrar?> alert alert-danger">
              <p class=<?=$mostrar?>> Este correo electrónico ya existe, puede se haya registrado con este Email y no recuerde su contraseña. <a class=<?=$mostrar?>"rosa olvidar-pass" href="olvideContraseña.php">¿ Si es así, ingrese aquí?</a> </p>
              <p class=<?=$mostrar?>> Si no, le solicitamos complete este formulario con otro correo electrónico. </p>

            <? endif;
              $valor=0;
              $mostrar="noMostrar"; ?>
            </ul>
          <?php endif; ?>
          <form class="registro" action="registro.php" method="post" enctype= "multipart/form-data">


            <label for="nombre">Nombre de usuario*</label>
            <input type="text" name="nombre" value="<?= isset($errores["nombre"])? "": persistir("nombre") ?>" required>
            <label for="email">Tu correo electrónico*</label>
            <input type="email" name="email" value="<?= isset($errores["email"])? "": persistir("email") ?>" required>
            <label for="password">Contraseña*</label>
            <input type="password" name="password" value=""required>
            <label for="repassword">Repetir contraseña*</label>
            <input type="password" name="repassword" value=""required>
            <label for="avatar">Foto de tu perfil:</label>
            <input  type="file" name="avatar" value="">
            <button class="btn-formulario" type="submit" name="submit">¡Registrarme!</button>
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

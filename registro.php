<?php

$titulo = "Registro";

require_once("autoload.php");
if ($_POST){
  //Se instancia un nuevo Usuario
  $avatar = "misterX.jpg";
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"], $avatar );
  //Aquí verifico si los datos registrados por el usuario pasan las validaciones
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  //De no existir errores entonces:
  if(count($errores)==0){
    //Busco a ver si el usuario existe o no en la base de datos
    $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
    if($usuarioEncontrado != false){
      $errores["email"] = "Usuario ya registrado";
    }else{
      //Aquí guardo en el servidor la foto que el usuario seleccionó
      // $registro->armarAvatar($usuario->getAvatar());
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$avatar);
      //Aquí redirecciono el usuario al login
      redirect ("login.php");
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

          <form class="registro" action="registro.php" method="post" enctype= "multipart/form-data">


            <label for="nombre">Nombre de usuario*</label>
            <input name="nombre" type="text" id="nombre"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" />
            <span class="error"> <?=(isset($errores["nombre"]))? $errores["nombre"] :"";?></span>


            <label for="email">Tu correo electrónico*</label>
            <input name="email" type="text" id="email" value="<?=isset($errores["email"])? "":inputUsuario("email") ;?>" />
            <span class="error"> <?=(isset($errores["email"]))? $errores["email"] :"";?></span>


            <label for="password">Contraseña*</label>
            <input name="password" type="password" id="password" value="" />
            <span class="error"> <?=(isset($errores["password"]))? $errores["password"] :"";?></span>

            <label for="repassword">Repetir contraseña*</label>
            <input name="repassword" type="password" id="repassword" value="" />
            <span class="error"><?=(isset($errores["repassword"]))? $errores["repassword"] :"";?></span>

            <!-- <label for="avatar">Foto de tu perfil:</label>
            <input  type="file" name="avatar" value="">
            <span class="error"><?=(isset($errores["avatar"]))? $errores["avatar"] :"";?></span> -->

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

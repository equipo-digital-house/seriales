<?php
require_once("autoload.php");
if ($_POST){
  //Esta variable es quien controla si se desea guardar en archivo JSON o en MYSQL
  $tipoConexion = "MYSQL";
  // Si la función retorn false, significa que se va a guardar los datos en JSON, de lo contrario se guardará los datos en MYSQL
  if($tipoConexion=="JSON"){
    $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_FILES );

    $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);

    if(count($errores)==0){
      $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());

      if($usuarioEncontrado != null){
        $errores["email"]="Usuario ya registrado";
      }else{
        $avatar = $registro->armarAvatar($usuario->getAvatar());
        $registroUsuario = $registro->armarUsuario($usuario,$avatar);

        $json->guardar($registroUsuario);

        redirect ("login.php");
      }
    }
  }
 else{
   //Si arriba en la variable $tipoConexion se coloco "MYSQL", entonces genero todo el trabajo pero con MYSQL.
  //Aquí genero mi objeto usuario, partiendo de la clase Usuario
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_FILES );
  //Aquí verifico si los datos registrados por el usuario pasan las validaciones
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  //De no existir errores entonces:
  if(count($errores)==0){
    //Busco a ver si el usuario existe o no en la base de datos
    $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
    if($usuarioEncontrado != false){
      $errores["email"]= "Usuario ya Registrado";
    }else{
      //Aquí guardo en el servidor la foto que el usuario seleccionó
      $avatar = $registro->armarAvatar($usuario->getAvatar());
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$avatar);
      //Aquí redirecciono el usuario al login
      redirect ("login.php");
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

    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

    <main>
      <h3 class="subtitulo">¿Todavía no tenés cuenta?</h3>
      <h2 class="titulo">Registrate en segundos</h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">

          <form class="registro" action="registro.php" method="post" enctype= "multipart/form-data">


            <label for="nombre">Nombre de usuario*</label>
            <input name="nombre" type="text" id="nombre"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" placeholder="Nombre de usuario..." />

            <label for="email">Tu correo electrónico*</label>
            <input name="email" type="text" id="email" value="<?=isset($errores["email"])? "":inputUsuario("email") ;?>" placeholder="Correo electrónico"/>

            <label for="password">Contraseña*</label>
            <input name="password" type="password" id="password" value="" placeholder="Contraseña..." />

            <label for="repassword">Repetir contraseña*</label>
            <input name="repassword" type="password" id="repassword" value="" placeholder="Rectifique su contraseña" />
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

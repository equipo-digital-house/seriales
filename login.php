<?php
require_once("autoload.php");

$titulo = "Login";

if($_POST){

  //Se instancia a un nuevo usuario
      $usuario = new Usuario($_POST["email"],$_POST["password"]);

      $errores= $validar->validacionLogin($usuario);

      if(count($errores)==0){
        $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');

        if($usuarioEncontrado == false){
          $errores["email"]="Usuario / Contraseña inválidos";
        } else {

          if(Autenticador::verificarPassword($usuario->getPassword(), $usuarioEncontrado["password"])==false) {
            $errores["password"]= "Usuario / Contraseña inválidos";
          } else {

            Autenticador::seteoSesion($usuarioEncontrado);

            if(isset($_POST["recordarme"])) {
              Autenticador::seteoCookie($usuarioEncontrado);
            }

            if(Autenticador::validarUsuario()) {
              redirect("perfil.php");
            } else {
              redirect("registro.php");
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
          <?php
            if(isset($errores)):?>
              <ul class="alert alert-danger">
                <?php
                foreach ($errores as $key => $value) :?>
                  <li> <?=$value;?> </li>
                  <?php endforeach;?>
              </ul>
            <?php endif;?>

          <form class="registro" action="login.php" method="post">
            <label for="email">Email*</label>
            <input name="email" type="text" id="email"   value="<?=isset($errores["email"])? "":inputUsuario("email") ;?>"/>

            <label for="password">Contraseña*</label>
            <input name="password" type="password" id="password"  value=""/>

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

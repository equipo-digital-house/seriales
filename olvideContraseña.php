<?php
require_once("autoload.php");
// include_once("controladores/funciones.php");
$titulo = "Olvide mi contraseña";
$mensaje = "Cambio realizado con éxito. Por favor, vuelva a ingresar.";
if($_POST){
  $usuarioOlvido = BaseMYSQL::buscarPorEmail($_POST['email'], $pdo, 'users');

  $errores= $validar->validacionOlvide($_POST);
  if(count($errores)==0){
    if($usuarioOlvido == null){
      $errores["email"]="Le usuarie no existe en nuestra base de datos";
    }else{
        $usuarioOlvido = $registro->armarRegistroOlvide($_POST, $usuarioOlvido);
        $usuarioModificado = BaseMYSQL::actualizarUsuario($usuarioOlvido, $pdo, $usuarioOlvido['avatar']);
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
      <h2 class="titulo">¿Olvidaste tu contraseña?</h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <?php if($_POST): ?>
            <?php
            if(!empty($errores)):?>
            <ul class="alert alert-danger">
              <?php foreach ($errores as $key => $value) :?>
                <li><?=$value;?></li>
              <?php endforeach;?>
            </ul>
          <?php else:?>
            <p class="alert alert-success">
              <?=$mensaje;?>
            </p>
          <?php endif;?>
        <?php endif; ?>



          <form class="contraseñaNueva" action="" method="post" enctype="multipart/form-data">
            <label for="email">Ingresá tu email*</label>
            <input type="text" name="email" value="<?= isset($errores["email"])? "": persistir("email") ?>" required>
            <label for="password">Ingresá tu nueva contraseña*</label>
            <input type="password" name="password" value=""required>
            <label for="password">Repetí tu nueva contraseña*</label>
            <input type="password" name="repassword" value=""required>
            <button class="btn-formulario" type="submit" name="submit">enviar</button>
            <p class="aclaracion">Los campos con * deben ser completados</p>
            </div>
          </form>
        </div>
      </div>
    </main>

    <?php
    require_once('php/footer.php');
    ?>
  </div>
</body>
</html>

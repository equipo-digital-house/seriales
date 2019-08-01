<?php
require_once("autoload.php");
$titulo = "Editar Permisos";

if($_POST){
  $usuarioAModificar= BaseMYSQL::buscarPorEmail($_POST["email"],$pdo,'users');

  $errores = $validar->validarEmail($_POST["email"], $usuarioAModificar);

  if(count($errores)==0) {
      $usuarioAModificar["access"] = $_POST["access"];
      $avatar=null;
      $accion= BaseMYSQL::actualizarUsuario($usuarioAModificar, $pdo, $avatar);
  }
};
 ?>


 <!DOCTYPE html>
 <html lang="es">
 <?php
 require_once("php/head.php");
  ?>
 <body>
   <div class="container-fluid p-0">



<!--Formulario para agregar preguntas frecuentes-->

       <section class="formulario">
         <div id="formContainer" class="row align-items-center">

            <div class="col-sm-10 offset-md-1">

              <?php if($_POST) {
                $validar->mostrarErrores($errores, isset($accion));
              }?>

            <h2 class="tituloAdminFaq1" class="text-center">Editar Permisos</h2>

            <form id="formulario" class="form" novalidate action=""  method="POST">

              <div class="form-group">
                <label for="email">Email del usuario</label>
                <input required name="email" type="email" class="form-control" id="email" placeholder="Email de Usuario">
              </div>

              <label for="access">Nivel de Acceso</label>
              <select class="custom-select" name="access" multiple>
                <option value="0" selected>Jugador</option>
                <option value="9">Administrador</option>
              </select>

            <button class="guardarFaq" type="submit" class="btn">Guardar</button>
            </form>


<!--Listado de preguntas frecuentes-->


   </body>
 </html>

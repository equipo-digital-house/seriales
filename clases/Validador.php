<?php
class Validador{

  public function validacionUsuario($usuario){
      $errores = [];
      $nombre = trim($usuario->getNombre());

      if(isset($nombre)) {
        if(empty($nombre)){
          $errores["nombre"] = "El campo no puede estar vacío";
          }
      }

      $email = trim($usuario->getEmail());
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errores["email"] = "El correo ingresado es inválido";
      }
      $password = trim($usuario->getPassword());
      $repassword = trim($usuario->getRepassword());

      if(empty($password)){
          $errores["password"] = "El campo no puede estar vacío";
      }elseif (strlen($password)<6) {
          $errores["password"] = "La contraseña debe tener seis caracteres como mínimo";
      }

      if(isset($repassword)){
          if ($password != $repassword) {
              $errores["repassword"] = "Las contraseñas no coinciden";
          }
      }

      return $errores;
  }


  //Metodo creado para validar el login del usuario
  public function validacionLogin($usuario){
      $errores = [];

      $email = trim($usuario->getEmail());

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"] = "El email no es válido";
      }

      $password= trim($usuario->getPassword());

      if(empty($password)){
        $errores["password"] = "Debe ingresar una contraseña";
      } else if (strlen($password)<6) {
        $errores["password"] = "La contraseña debe tener 6 caracteres como mínimo";
      }

      return $errores;
  }


  //Método para validar si el usuario desea recuperar su contraseña
  public function validacionOlvide($usuario){

      $errores = [];

      $email = trim($usuario['email']);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"] = "El correo ingresado es inválido";
      }
      $password= trim($usuario['password']);
      $repassword = trim($usuario['repassword']);


      if(empty($password)){
        $errores["password"] = "El campo no puede estar vacío";
      }elseif (strlen($password)<6) {
        $errores["password"] = "La contraseña debe tener seis caracteres como mínimo";
      }
      if(empty($repassword) || $password != $repassword){
        $errores["repassword"] = "Las contraseñas no coinciden";
      }

      return $errores;
  }

// Valida los datos del formulario de Mi Perfil
  public function validarPerfil($datos) {
    $errores=[];

    if ($datos["seleccion"]==1) {
      // menu validar usuario e Email
      if(isset($datos["nombre"])){
          $nombre = trim($datos["nombre"]);
          if(empty($nombre)){
              $errores["nombre"]="El campo no puede estar vacio";
          }
      }

      if(isset($datos["email"])){
          $email = trim($datos["email"]);
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errores["email"]="El email no es válido";
          }
      }

    }

    if ($datos["seleccion"]==2) {
      // validar imagen avatar
      if(isset($_FILES)) {
        if($_FILES["avatar"]["error"]!=0){
            $errores["avatar"]="La imagen no se ha cargado correctamente";
        }
        $avatar = $_FILES["avatar"]["name"];

        $ext = pathinfo($avatar,PATHINFO_EXTENSION);

        if($ext != "jpg" && $ext != "png"){
            $errores["avatar"] = "La extensión debe ser PNG ó JPG";
        }
      }
    }

    if ($datos["seleccion"]==3) {
      // validar password
      $password = trim($datos["password"]);
      if(isset($datos["password"])) {
        if(empty($password)) {
            $errores["password"] = "La contraseña no puede estar vacía";
        } else if(strlen($password)<6) {
            $errores["password"]= "La contraseña debe tener 6 caracteres como mínimo";
        }
      }

      if(isset($datos["repassword"])){
        $repassword = trim($datos["repassword"]);
        if(empty($repassword)){
          $errores["repassword"]= "El campo no debe estar vacio";
        }

        if($password != $repassword){
            $errores["repassword"]= "Las contraseñas deben coincidir";
        }
      }

    }

    return $errores;
  }

  public function validarEmail($email, $usuarioAModificar) {
    $errores = [];
    $email = trim($email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !$usuarioAModificar){
      $errores["email"] = "El correo ingresado es inválido";
    }

    return $errores;
  }

 //Muestra si hubo errores o si la modificacion del perfil fue correcta.
  public function mostrarErrores($errores, $accion) {
    if(count($errores) != 0):?>
    <ul class="alert alert-danger">
      <?php foreach ($errores as $key => $value) :?>
        <li><?=$value;?></li>
      <?php endforeach;?>
    </ul>

  <?php endif;?>

    <?php
    if($accion):?>
    <p class="alert alert-success">
      Modificacion realizada con éxito
    </p>

  <?php endif;?>
  <?php
  }
}

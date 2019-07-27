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

        if($usuario->getAvatar()!=null){
          if($_FILES["avatar"]["error"]!=0){
            $errores["avatar"] = "Por favor, sube una foto";
          }else{
            $nombre = $_FILES["avatar"]["name"];
            $ext = pathinfo($nombre,PATHINFO_EXTENSION);
            if($ext != "png" && $ext != "jpg"){
            $errores["avatar"] = "La extensión de la imagen debe ser .png o .jpg";
                }
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

        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errores["email"] = "El correo ingresado es inválido";
        }
        $password= trim($usuario->getPassword());
        $repassword = trim($usuario->getRepassword());


        if(empty($password)){
          $errores["password"] = "El campo no puede estar vacío";
        }elseif (strlen($password)<6) {
          $errores["password"] = "La contraseña debe tener seis caracteres como mínimo";
        }
        if(empty($repassword)){
          $errores["repassword"] = "Las contraseñas no coinciden";
        }

        return $errores;
    }


}

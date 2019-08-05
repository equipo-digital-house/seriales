<?php
class ArmarRegistro{
    public function armarAvatar($imagen){
        $nombre = $imagen["avatar"]["name"];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        $archivoOrigen = $imagen["avatar"]["tmp_name"];
        $archivoDestino = dirname(__DIR__);
      $archivoDestino = $archivoDestino."/img/img_perfil/";
        $avatar = uniqid();
        $archivoDestino = $archivoDestino.$avatar;

        $archivoDestino = $archivoDestino.".".$ext;

        move_uploaded_file($archivoOrigen,$archivoDestino);
        $avatar = $avatar.".".$ext;

        return $avatar;
    }

    public function armarUsuario($registro,$avatar){

        $usuario = [
            "name"=>$registro->getNombre(),
            "email"=>$registro->getEmail(),
            "password"=> Encriptar::hashPassword($registro->getPassword()),
            "avatar"=>$avatar,
            "access"=>0
        ];

        return $usuario;
    }

    public function armarRegistroOlvide($datos, $usuario){
        if($datos["email"] == $usuario["email"]){
        $usuario["password"] = $datos["password"];
        $usuario["password"]= password_hash($datos["password"],PASSWORD_DEFAULT);
        }

        return $usuario;
    }
    public function armarAvatarSerie($imagen,$nombreSerie){
        $nombreSerie=str_replace('/\s+/','',$nombreSerie);
        $nombre = "logo_".$nombreSerie;
        $ext = pathinfo($imagen["avatar"]["name"],PATHINFO_EXTENSION);
        $archivoOrigen = $imagen["avatar"]["tmp_name"];
        $archivoDestino = dirname(__DIR__);
        $archivoDestino = $archivoDestino."/img/series/";
        $archivoDestino = $archivoDestino.$nombre;
        $archivoDestino = $archivoDestino.".".$ext;
        move_uploaded_file($archivoOrigen,$archivoDestino);
        $avatar = "img/series/".$nombre.".".$ext;

        return $avatar;

    }
    public function armarSerie($nombre,$avatar){

        $serie = [
            "nombre"=>$registro->getNombre(),
            "avatar"=>$avatar,

        ];

        return $serie;
    }

    public function armarImagenPregunta($imagen){

      $nombre = $imagen["name"];
      $ext = pathinfo($nombre,PATHINFO_EXTENSION);
      $archivoOrigen = $imagen["tmp_name"];
      $archivoDestino = dirname(__DIR__);
      $archivoDestino = $archivoDestino."/img/img_questions/";
      $avatar = uniqid();
      $archivoDestino = $archivoDestino.$avatar;

      $archivoDestino = $archivoDestino.".".$ext;

      move_uploaded_file($archivoOrigen,$archivoDestino);
      $avatar = "img/img_questions/".$avatar.".".$ext;

      return $avatar;
    }

    public function armarImagenRespuesta($imagen){
      $nombre = $imagen["name"];
      $ext = pathinfo($nombre,PATHINFO_EXTENSION);
      $archivoOrigen = $imagen["tmp_name"];
      $archivoDestino = dirname(__DIR__);
      $archivoDestino = $archivoDestino."/img/img_answers/";
      $avatar = uniqid();
      $archivoDestino = $archivoDestino.$avatar;

      $archivoDestino = $archivoDestino.".".$ext;

      move_uploaded_file($archivoOrigen,$archivoDestino);
      $avatar = "img/img_answers/".$avatar.".".$ext;

      return $avatar;
    }

}

<?php

class BaseMYSQL extends BaseDatos{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }
    static public function buscarPorEmail($email,$pdo,$tabla){
        //Query para buscar por email, datos bindeados por value

        $sql = "select * from $tabla where email = :email";
        // Aquí ejecuto el prepare de los datos
        $query = $pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function guardarUsuario($pdo,$usuario,$tabla,$avatar){
        $sql = "INSERT INTO $tabla (name,email,password,avatar,access,level) values (:name,:email,:password,:avatar,:access,:level )";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$usuario->getNombre());
        $query->bindValue(':email',$usuario->getEmail());
        $query->bindValue(':password',Encriptar::hashPassword($usuario->getPassword()));
        $query->bindValue(':avatar',$avatar);
        $query->bindValue(':access',0);
        $query->bindValue(':level',1);
        $query->execute();

    }

    static public function guardarPreguntaFrecuente($pdo, $tabla, $preguntaFrecuente){
        $sql = "INSERT INTO $tabla (name, answer) values (:name,:answer)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name', $preguntaFrecuente->getName());
        $query->bindValue(':answer', $preguntaFrecuente->getAnswer());
        $query->execute();

    }


    static public function modificarDatosUsuario($data, $pdo, $tabla) {
      $nombre = $data['name'];
      $email = $data['email'];
      $id = $data['id'];

      $sql = "UPDATE $tabla SET name = :name, email = :email
      WHERE $tabla.id= :id";

      $query = $pdo->prepare($sql);

      $query->execute(
        [
          ":name" => $nombre,
          ":email" => $email,
          ":id" => $id
        ]);
    }

    static public function modificarAvatar($data, $pdo, $tabla, $avatar) {
      $id = $data['id'];

      $sql = "UPDATE $tabla SET avatar = :avatar WHERE $tabla.id = :id";

      $query = $pdo->prepare($sql);

      $query->execute(
        [
          ":avatar" => $avatar,
          ":id" => $id
        ]);
    }

    static public function modificarPassword($data, $pdo, $tabla) {
      $password = $data['password'];
      $id = $data['id'];

      $sql = "UPDATE $table SET password = :password WHERE $tabla.id = :id";

      $query = $pdo->prepare($sql);

      $query->execute(
        [
          ":password" => $password,
          ":id" => $id
        ]);
    }

    public static function actualizarUsuario($data, $pdo, $avatar)
    {

        $columns = ["name","email", "password", "avatar", "access", "level"];
        $params = [];
        $setStr = "";
        foreach ($columns as $column) {
            if (isset($data[$column]) && $column != "id") {
                $setStr .= "`$column` = :$column,";
                $params[$column] = $data[$column];

            }
        };

        $setStr = rtrim($setStr, ",");
        $params['id'] = $data['id'];
        $pdo->prepare("UPDATE users SET $setStr WHERE id = :id")->execute($params);

        return "ok";
    }

    // static public function modificarUsuario($data, $pdo, $tabla, $avatar, $seleccion, $dataModificada) {
    //   $nombre = $data['name'];
    //   $email = $data['email'];
    //   $id = $data['id'];
    //   $password = $data['password'];
    //
    //   switch($seleccion) {
    //     case 1 :
    //     $nombre = $dataModificada["nombre"];
    //     $email = $dataModificada["email"];
    //     $sql = "UPDATE $tabla SET name = :name, email = :email
    //     WHERE $tabla.id= :id";
    //     break;
    //
    //     case 2 :
    //     $sql = "UPDATE $tabla SET avatar = :avatar WHERE $tabla.id = :id";
    //     break;
    //
    //     case 3 :
    //     $password= Encriptar::hashPassword($dataModificada["password"]);
    //     $sql = "UPDATE $table SET password = :password WHERE $tabla.id = :id";
    //     break;
    //   }
    // }

    public function leer(){
        //A futuro trabajaremos en esto
    }
    public function actualizar(){
        //A futuro trabajaremos en esto
    }
    public function borrar(){
        //A futuro trabajaremos en esto
    }
    public function guardar($usuario){
        //Este fue el método usao para json
    }

}

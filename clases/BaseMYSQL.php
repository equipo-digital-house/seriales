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

        $mensaje = "ok";

        return $mensaje;
    }

    static public function buscarPorSerie($serie,$pdo,$tabla){
        $sql = "select * from $tabla where name = :serie";
        $query = $pdo->prepare($sql);
        $query->bindValue(':serie',$serie);
        $query->execute();
        $serie = $query->fetch(PDO::FETCH_ASSOC);
        return $serie;
    }
    static public function guardarSerie($pdo,$serie,$tabla,$avatar){
        $sql = "insert into $tabla (name,image) values (:name,:avatar)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$serie->getNombre());
        $query->bindValue(':avatar',$avatar);
        $query->execute();
      }
      static public function guardarPregunta($pdo,$pregunta,$tabla){
          $sql = "insert into $tabla (name,series_id,levels_id) values (:name,:serie,:level)";

          $query = $pdo->prepare($sql);
          $query->bindValue(':name',$pregunta->getName());
          $query->bindValue(':serie',$pregunta->getSerie_id());
          $query->bindValue(':level',$pregunta->getLevel_id());

          $query->execute();
        }

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
    static public function buscarUltimoRegistroInsertado($pdo,$tabla){
          $sql="select max($tabla.id) from $tabla";

          $query=$pdo->prepare($sql);
          $query->execute();
          $ultimoRegistro = $query->fetch(PDO::FETCH_ASSOC);
          return $ultimoRegistro;
    }
    static public function guardarRespuesta($pdo,$respuesta,$tabla){
        $sql = "insert into $tabla (name,correctAnswer,image,questions_id) values (:name,:correct,:image,:question)";

        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$respuesta->getName());
        $query->bindValue(':correct',$respuesta->getCorrectAnswer());
        $query->bindValue(':image',$respuesta->getImage());
        $query->bindValue(':question',$respuesta->getQuestion_id());

        $query->execute();
      }
      static public function actualizarSerie($pdo,$id,$tabla,$serie){

            $sql="update $tabla set $tabla.name=:name, $tabla.image=:image where $tabla.id=$id";
          $query = $pdo->prepare($sql);
          $query->bindValue(':name',$serie->getNombre());
          $query->bindValue(':image',$serie->getAvatar());
          $query->execute();
        }

}

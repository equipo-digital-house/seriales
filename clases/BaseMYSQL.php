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
        //Aquí hago la sentencia select, para buscar el email, estoy usando bindeo de parámetros por value
        $sql = "SELECT * from $tabla where email = :email";
        // Aquí ejecuto el prepare de los datos
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
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

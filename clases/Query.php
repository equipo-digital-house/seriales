<?php
class Query{
    static public function listado($pdo,$tabla){
        $sql="SELECT $tabla.id, $tabla.name, $tabla.email FROM $tabla";
        $consulta= $pdo->query($sql);
        $listado=$consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
    }


    static public function mostrarUsuario($pdo,$tabla,$idUsuario){
        $sql = "SELECT $tabla.id, $tabla.name, $tabla.email, $tabla.avatar,$tabla.role FROM $tabla WHERE $tabla.id = '$idUsuario'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $usuarioEncontrado=$query->fetchAll(PDO::FETCH_ASSOC);
        return $usuarioEncontrado;
    }


    static public function borrarUsuario($pdo,$tabla,$idUsuario){
        $sql="DELETE FROM $tabla WHERE $tabla.id=:id";
        $query=$pdo->prepare($sql);
        $query->bindValue(':id',$idUsuario);
        $query->execute();
    }


    static public function usuarioModificar($pdo,$tabla,$idUsuario){
        $sql = "SELECT $tabla.id, $tabla.name, $tabla.email, $tabla.role from $tabla WHERE $tabla.id = '$idUsuario'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $usuarioModificar=$query->fetch(PDO::FETCH_ASSOC);
        return $usuarioModificar;
    }


    static public function listarPreguntasFrecuentes($pdo, $tabla){
        $sql="SELECT $tabla.id, $tabla.name, $tabla.answer FROM $tabla";
        $consulta = $pdo->query($sql);
        $listado = $consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
    }


    public static function mostrarPreguntaFrecuente($pdo, $tabla, $id)
    {
        $sql = "SELECT * FROM $tabla WHERE id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $resultados = $query->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }


    public static function insertarPreguntaFrecuente($preguntaFrecuente, $pdo)
    {
        $name = $pelicula->getName();
        $answer = $pelicula->getAnswer();
        $stmt = $pdo->prepare("INSERT INTO frequentquestions (name, answer) VALUES (:name, :answer)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
        $stmt->execute();
    }


    public static function actualizarPreguntaFrecuente($data, $pdo)
    {
        $columns = ["name","answer"];
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
        $pdo->prepare("UPDATE frequentquestions SET $setStr WHERE id = :id")->execute($params);
    }


    static public function eliminarPreguntaFrecuente($pdo, $tabla, $preguntaFrecuente){

        $sql = "DELETE FROM $tabla WHERE title = :frequentquestions";
        $stmt= $pdo->prepare($sql);
        $stmt->bindValue(':preguntaFrecuente', $preguntaFrecuente);
        $stmt->execute();
    }
}

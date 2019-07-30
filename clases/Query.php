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
        $sql="SELECT * FROM $tabla";
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
        $name = $preguntaFrecuente->getName();
        $answer = $preguntaFrecuente->getAnswer();
        $stmt = $pdo->prepare("INSERT INTO frequentquestions (name, answer) VALUES (:name, :answer)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
        $stmt->execute();
    }


    static public function actualizarPreguntaFrecuente($pdo, $idPregunta, $datos){
      $name = $datos["name"];
      $answer = $datos["answer"];
      $sql = "UPDATE frequentquestions SET frequentquestions.name = '$name', frequentquestions.answer = '$answer' where frequentquestions.id = $idPregunta";
      $query = $pdo->prepare($sql);
      $query->execute();
    }


    static public function eliminarPreguntaFrecuente($pdo, $tabla, $idPregunta){

        $sql = "DELETE FROM frequentquestion WHERE frequentquestion.id = $idPregunta";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}

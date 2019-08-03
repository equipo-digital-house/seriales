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


    static public function eliminarPreguntaFrecuente($pdo, $idPregunta){

        $sql = "DELETE FROM frequentquestions WHERE frequentquestions.id = $idPregunta";
        $query = $pdo->prepare($sql);
        $query->execute();
    }

static public function listadoSeries($pdo,$tabla){

        $sql="select $tabla.id, $tabla.name, $tabla.image from $tabla order by $tabla.name asc";
        $consulta= $pdo->query($sql);
        $listado=$consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
}
static public function mostrarSeries($pdo,$tabla,$idSeries){
        $sql = "select $tabla.id, $tabla.name, $tabla.image from $tabla where $tabla.id = '$idSeries'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $serieEncontrada=$query->fetchAll(PDO::FETCH_ASSOC);
        return $serieEncontrada;
}
static public function mostrarQuestions($pdo,$tabla,$idSeries){
        $sql="select $tabla.id, $tabla.name, $tabla.image, levels.name as nivel, levels.level, levels.score from questions inner join series on series.id=questions.series_id  inner join levels on levels.id=questions.levels_id  where series.id = '$idSeries'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $serieEncontrada=$query->fetchAll(PDO::FETCH_ASSOC);
        return $serieEncontrada;
}
static public function mostrarAnswer($pdo,$tabla,$idQuestions){
    $sql= "select answers.id,answers.name, answers.correctAnswer, answers.image,levels.name as nivel, levels.level, levels.score, questions.series_id as serie_id, questions.name as pregunta from answers inner join questions on answers.questions_id=questions.id inner join series on series.id=questions.series_id inner join levels on levels.id=questions.levels_id where questions.id = '$idQuestions'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $serieEncontrada=$query->fetchAll(PDO::FETCH_ASSOC);
    return $serieEncontrada;
}
static public function serieModificar($pdo,$tabla,$idSerie){
    $sql = "select $tabla.id, $tabla.name, $tabla.image from $tabla where $tabla.id = '$idSerie'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarioModificar=$query->fetch(PDO::FETCH_ASSOC);
    return $usuarioModificar;
}
static public function borrarPreguntas($pdo,$tabla,$idQuestion){

    if($tabla=='answers'){
    $sql="delete from $tabla where $tabla.questions_id=:id";

   }
   elseif($tabla=='questions'){
     $sql="delete from $tabla where $tabla.id=:id";

   }
   elseif ($tabla=='series') {
     $sql="delete from $tabla where $tabla.id=:id";

   }

    $query=$pdo->prepare($sql);
    $query->bindValue(':id',$idQuestion);
    $query->execute();
}
static public function listadoLevel($pdo,$tabla){
    $sql="select $tabla.id, $tabla.name, $tabla.level from $tabla";
    $consulta= $pdo->query($sql);
    $listado=$consulta->fetchall(PDO::FETCH_ASSOC);
    return $listado;

}
}


<?php
require_once("autoload.php");
if($_GET){
$id_serie=$_GET["id"];
$serieSeleccionada = Query::mostrarSeries($pdo,'series',$id_serie);
}

//var_dump($_FILES);

if ($_POST){

      //Aquí genero mi objeto usuario, partiendo de la clase Usuario
      if(isset($_POST["checkPregunta"])){

        $pregunta = new Question($_POST["pregunta"],$_POST["serie"],$_POST["selectNivel"],$_FILES["filePregunta"] );
      }
      else{

          $pregunta = new Question($_POST["pregunta"],$_POST["serie"],$_POST["selectNivel"]);
      }


  $res1=0;
  $res2=0;
  $res3=0;
  $res4=0;
  switch($_POST["selectPreguntaCorrecta"]) {
    case 1 :
    $res1=1;
    break;

    case 2 :
    $res2=2;
    break;

    case 3 :
    $res3=3;
    break;
    case 4 :
    $res4=4;
    break;

  }
    $question_id=0;
//  $respuesta1= new Answer($_POST["respuesta1"],$res1,$question_id,$_FILES["fileRespuesta1"] );
//  $respuesta2= new Answer($_POST["respuesta2"],$res2,$question_id,$_FILES["fileRespuesta2"] );
//  $respuesta3= new Answer($_POST["respuesta3"],$res3,$question_id,$_FILES["fileRespuesta3"] );
//  $respuesta4= new Answer($_POST["respuesta4"],$res4,$question_id,$_FILES["fileRespuesta4"] );
  //Aquí verifico si los datos registrados por el usuario pasan las validaciones
  $errores = $validar->validacionPregunta($pregunta);
  //De no existir errores entonces:
  if(count($errores)==0){
    //Busco a ver si el usuario existe o no en la base de datos
    $encontrarPregunta = BaseMYSQL::buscarPorSerie($pregunta->getName(),$pdo,'questions');
    if($encontrarPregunta != false && encontrarPregunta["series_id"]==$_POST["serie"] ){

             $errores["nombre"]= "Pregunta ya existe en esta Serie";
    }else{
      if(isset($_POST["checkPregunta"]) and $_POST["checkPregunta"]=="on"){

      //Aquí guardo en el servidor la foto que el usuario seleccionó
      $imagePregunta = $registro->armarImagenPregunta($pregunta->getImage());
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarPregunta($pdo,$pregunta,'questions',$imagePregunta);
      //Aquí redirecciono el usuario al login
      redirect ("administrador.php");
    }else{
      BaseMYSQL::guardarPregunta($pdo,$pregunta,'questions');
        redirect ("administrador.php");
    }
  }

 }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="master.css">
  <title>Registro de Datos</title>
</head>

<body>
  <?php require_once("php/headerAdmin.php");?>
  <div class="container">

    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

      <div class="row">
        <div class="col-md-6 offset-md-3">


          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Pregunta</h2>
            </div>

          <form class="registro" action="agregarPreguntas.php" method="post" enctype= "multipart/form-data">
            <?php if($_GET):?>
            <div class="img-thumbnail">
              <img src="<?=$serieSeleccionada[0]["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
              <h2 class="text-center"><?=$serieSeleccionada[0]["name"]?></h2>
            </div>
          <?php else:?>

                <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione la Serie</label>
                <?php
                $listadoSeries=Query::listadoSeries($pdo,'series');?>

                <select name="serie" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach ($listadoSeries as $key => $value):?>
                  <option value="<?=$value["id"];?>"><?=$value["name"];?></option>
                  <?php endforeach;?>
                </select>

              </div>
                <?php endif;?>
          <div class="form-group">
            <label for="InputQuestion">Pregunta</label>
            <input name="pregunta" type="text" class="form-control" value="<?=(isset($errores["pregunta"]) )? "" : inputUsuario("nombre");?>" id="exampleInputEmail1" aria-describedby="questionHelp" placeholder="Ingrese pregunta">
            <small id="questionHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group form-check">
            <input name="checkPregunta" type="checkbox" class="form-check-input" id="checkIddQuestion">
            <label class="form-check-label" for="checkIddQuestion">Asociar imagen a la pregunta</label>
          </div>
          <div class="form-group">
              <input name="filePregunta" type="file" class="form-control-file" id="filePregunta">
              <small id="filePregunta" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">
              <?php  $levels = Query::ListadoLevel($pdo,'levels');?>

            <label for="selectPregunta">Seleccione el Nivel de Pregunta</label>
            <select name="selectNivel" class="form-control" id="selectPregunta">
              <?php foreach ($levels as $key => $value) :?>
              <option value="<?=$value["id"];?>"><?=$value["name"];?></option>

            <?php endforeach;?>
            </select>
            <br>
          </div>
          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Respuestas</h2>
            </div>
          <div class="form-group form-check">
            <input name="checkRespuesta" type="checkbox" class="form-check-input" id="checkRespuesta">
            <label class="form-check-label" for="checkRespuesta">Las Respuestas tendrán imagenes asociadas</label>
          </div>
          <div class="form-group">
            <label for="inputRespuesta1">#1 Respuesta</label>
            <input name="respuesta1" type="text" class="form-control" id="inputRespuesta1" aria-describedby="respuesta1Help" placeholder="Respuesta1">
            <small id="respuesta1Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group">
              <input name="fileRespuesta1" type="file" class="form-control-file" id="fileRespuesta1">
              <small id="fileRespuesta1" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">
              <label for="inputRespuesta2">#2 Respuesta</label>
              <input name="respuesta2"type="text" class="form-control" id="inputRespuesta2" aria-describedby="respuesta2Help" placeholder="Respuesta2">
              <small id="respuesta2Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
            </div>
            <div class="form-group">
                <input name="fileRespuesta2"type="file" class="form-control-file" id="fileRespuesta2">
                <small id="fileRespuesta2" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
              </div>
              <div class="form-group">
                <label for="inputRespuesta3">#3 Respuesta</label>
                <input name="respuesta3"type="text" class="form-control" id="inputRespuesta3" aria-describedby="respuesta3Help" placeholder="Respuesta3">
                <small id="emailHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
              </div>
              <div class="form-group">
                  <input name="fileRespuesta3" type="file" class="form-control-file" id="fileRespuesta3">
                  <small id="fileRespuesta3" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                </div>
                <div class="form-group">
                  <label for="inputRespuesta4">#4 Respuesta</label>
                  <input name="respuesta4" type="text" class="form-control" id="inputRespuesta4" aria-describedby="respuesta4Help" placeholder="Respuesta4">
                  <small id="respuesa4Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
                </div>
                <div class="form-group">
                    <input name="fileRespuesta4"type="file" class="form-control-file" id="fileRespuesta4">
                    <small id="fileRespuesta4" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                  </div>
                  <div class="form-group">
                  <label  for="selectCorrectAnswer">Seleccione cuál es la respuesta correcta</label>

                    <select name="selectPreguntaCorrecta" class="form-control" id="selectCorrectAnswer">

                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                  </select>
                  <br>
                </div>

      <button type="submit" class="btn btn-primary">Guardar Pregunta</button>

    </form>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
</div>
</body>

</html>

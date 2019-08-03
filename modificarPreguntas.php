<?php
require_once("autoload.php");

$id_serie=$_GET["id"];
$serieSeleccionada = Query::mostrarSeries($pdo,'series',$id_serie);



if ($_POST){
  //Esta variable es quien controla si se desea guardar en archivo JSON o en MYSQL
  $tipoConexion = "MYSQL";
  // Si la función retorn false, significa que se va a guardar los datos en JSON, de lo contrario se guardará los datos en MYSQL
  if($tipoConexion=="JSON"){
    $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_FILES );

    $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);

    if(count($errores)==0){
      $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());

      if($usuarioEncontrado != null){
        $errores["email"]="Usuario ya registrado";
      }else{
        $avatar = $registro->armarAvatar($usuario->getAvatar());
        $registroUsuario = $registro->armarUsuario($usuario,$avatar);

        $json->guardar($registroUsuario);

        redirect ("login.php");
      }
    }
  }
 else{
   //Si arriba en la variable $tipoConexion se coloco "MYSQL", entonces genero todo el trabajo pero con MYSQL.
  //Aquí genero mi objeto usuario, partiendo de la clase Usuario
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_FILES );
  //Aquí verifico si los datos registrados por el usuario pasan las validaciones
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  //De no existir errores entonces:
  if(count($errores)==0){
    //Busco a ver si el usuario existe o no en la base de datos
    $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
    if($usuarioEncontrado != false){
      $errores["email"]= "Usuario ya Registrado";
    }else{
      //Aquí guardo en el servidor la foto que el usuario seleccionó
      $avatar = $registro->armarAvatar($usuario->getAvatar());
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$avatar);
      //Aquí redirecciono el usuario al login
      redirect ("login.php");
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
          <div class="img-thumbnail">
            <img src="<?=$serieSeleccionada[0]["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
            <h2 class="text-center"><?=$serieSeleccionada[0]["name"]?></h2>
          </div>
          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Pregunta</h2>
            </div>
          <form>
          <div class="form-group">
            <label for="InputQuestion">Pregunta</label>
            <input name="pregunta" type="text" class="form-control" value="<?=(isset($errores["pregunta"]) )? "" : inputUsuario("nombre");?>" id="exampleInputEmail1" aria-describedby="questionHelp" placeholder="Ingrese pregunta">
            <small id="questionHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group form-check">
            <input name="addImagenPregunta" type="checkbox" class="form-check-input" id="checkIddQuestion">
            <label class="form-check-label" for="checkIddQuestion">Asociar imagen a la pregunta</label>
          </div>
          <div class="form-group">
              <input type="file" class="form-control-file" id="filePregunta">
              <small id="filePregunta" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">
            <label for="selectPregunta">Seleccione el Nivel de Pregunta</label>
            <select class="form-control" id="selectPregunta">
              <option>Basico</option>
              <option>Intermedio</option>
              <option>Avanzado</option>
              <option>Start</option>
            </select>
            <br>
          </div>
          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Respuestas</h2>
            </div>
          <div class="form-group form-check">
            <input name="addImagenRespuesta" type="checkbox" class="form-check-input" id="checkRespuesta">
            <label class="form-check-label" for="checkRespuesta">Las Respuestas tendrán imagenes asociadas</label>
          </div>
          <div class="form-group">
            <label for="inputRespuesta1">#1 Respuesta</label>
            <input type="text" class="form-control" id="inputRespuesta1" aria-describedby="respuesta1Help" placeholder="Respuesta1">
            <small id="respuesta1Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group">
              <input type="file" class="form-control-file" id="fileRespuesta1">
              <small id="fileRespuesta1" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">
              <label for="inputRespuesta2">#2 Respuesta</label>
              <input name="respuesta1"type="text" class="form-control" id="inputRespuesta2" aria-describedby="respuesta2Help" placeholder="Respuesta2">
              <small id="respuesta2Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" id="fileRespuesta2">
                <small id="fileRespuesta2" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
              </div>
              <div class="form-group">
                <label for="inputRespuesta3">#3 Respuesta</label>
                <input name="respuesta2"type="text" class="form-control" id="inputRespuesta3" aria-describedby="respuesta3Help" placeholder="Respuesta3">
                <small id="emailHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
              </div>
              <div class="form-group">
                  <input name="respuesta3" type="file" class="form-control-file" id="fileRespuesta3">
                  <small id="fileRespuesta3" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                </div>
                <div class="form-group">
                  <label for="inputRespuesta4">#4 Respuesta</label>
                  <input name="respuesta4" type="text" class="form-control" id="inputRespuesta4" aria-describedby="respuesta4Help" placeholder="Respuesta4">
                  <small id="respuesa4Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="fileRespuesta4">
                    <small id="fileRespuesta4" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                  </div>
                  <div class="form-group">
                  <label for="selectCorrectAnswer">Seleccione cuál es la respuesta correcta</label>
                  <select class="form-control" id="selectCorrectAnswer">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>Start</option>
                  </select>
                  <br>
                </div>

      <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
</body>

</html>

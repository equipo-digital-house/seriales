<?php
require_once("autoload.php");
//Ahora validamos Respuestas
//uso estas variables para llenar la pregunta correcta

$valor=BaseMYSQL::buscarUltimoRegistroInsertado($pdo,'questions');
foreach ($valor as $key => $value) {
$ultimoRegistro=(int)$value;
}
$buscarPregunta=Query::mostrarSeries($pdo,'questions',$ultimoRegistro);

if ($_POST) {

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

//verificamos si tiene asignada imagenes las preguntas
if(isset($_POST["checkRespuesta"]) and $_POST["checkRespuesta"]=="on"){
      //asignamos los datos a la clase Respuesta con los archivos de imagen
      var_dump("entre a check Respuesta con imagen");
      $respuesta1=new Answer($_POST["respuesta1"],$res1,$ultimoRegistro,$_FILES["fileRespuesta1"]);
      $respuesta2=new Answer($_POST["respuesta2"],$res2,$ultimoRegistro,$_FILES["fileRespuesta2"]);
      $respuesta3=new Answer($_POST["respuesta3"],$res3,$ultimoRegistro,$_FILES["fileRespuesta3"]);
      $respuesta4=new Answer($_POST["respuesta4"],$res4,$ultimoRegistro,$_FILES["fileRespuesta4"]);
var_dump($respuesta1->getImage());
      //validamos la informacion
      $errores1 = $validar->validacionPreguntaImagen($respuesta1,1);
      $errores2 = $validar->validacionPreguntaImagen($respuesta2,2);
      $errores3 = $validar->validacionPreguntaImagen($respuesta3,3);
      $errores4 = $validar->validacionPreguntaImagen($respuesta4,4);


                    if((count($errores1)==0) && (count($errores2)==0) && (count($errores3==0)) && (count($errores4)==0)){
                    //armamos las imagenes de todas las respuestas

                            $imageRespuesta1 = $registro->armarImagenRespuesta($respuesta1->getImage());
                            $imageRespuesta2 = $registro->armarImagenRespuesta($respuesta2->getImage());
                            $imageRespuesta3 = $registro->armarImagenRespuesta($respuesta3->getImage());
                            $imageRespuesta4 = $registro->armarImagenRespuesta($respuesta4->getImage());
                            var_dump("Se estan armando las imagenes de respuesta y se muestra respuesta1");
                            $respuesta1->setImage($imageRespuesta1);
                            var_dump($respuesta1->getSerie_id);
                            $respuesta2->setImage($imageRespuesta2);
                            $respuesta3->setImage($imageRespuesta3);
                            $respuesta4->setImage($imageRespuesta4);
                            var_dump("Se estan cargando las respuesta a la db");
                            BaseMYSQL::guardarRespuesta($pdo,$respuesta1,'answers');
                            BaseMYSQL::guardarRespuesta($pdo,$respuesta2,'answers');
                            BaseMYSQL::guardarRespuesta($pdo,$respuesta3,'answers');
                            BaseMYSQL::guardarRespuesta($pdo,$respuesta4,'answers');
                            var_dump("Listo Guardadas ");
                            redirect ("administrador.php");
                    }
}// si no tienen imagen asignada le asignamos los datos sin imagen
else{
          var_dump("entre sin check de imagen de respuesta");
          $respuesta1=new Answer($_POST["respuesta1"],$res1,$ultimoRegistro);
          $respuesta2=new Answer($_POST["respuesta2"],$res2,$ultimoRegistro);
          $respuesta3=new Answer($_POST["respuesta3"],$res3,$ultimoRegistro);
          $respuesta4=new Answer($_POST["respuesta4"],$res4,$ultimoRegistro);

          $errores1 = $validar->validacionPregunta($respuesta1);
          $errores2 = $validar->validacionPregunta($respuesta2);
          $errores3 = $validar->validacionPregunta($respuesta3);
          $errores4 = $validar->validacionPregunta($respuesta4);

          if((count($errores1)==0) && (count($errores2)==0) && (count($errores3==0)) && (count($errores4)==0)){
          //afregamos los datos a la base de Datos
          var_dump("Se estan guardando los datos en la base de datos");
          BaseMYSQL::guardarRespuesta($pdo,$respuesta1,'answers');
          BaseMYSQL::guardarRespuesta($pdo,$respuesta2,'answers');
          BaseMYSQL::guardarRespuesta($pdo,$respuesta3,'answers');
          BaseMYSQL::guardarRespuesta($pdo,$respuesta4,'answers');
          redirect ("administrador.php");
            var_dump("Listo Guardadas ");
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
      if(isset($errores1)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores1 as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>
      <?php
        if(isset($errores2)):?>
          <ul class="alert alert-danger">
            <?php
            foreach ($errores1 as $key => $value) :?>
              <li> <?=$value;?> </li>
              <?php endforeach;?>
          </ul>
        <?php endif;?>
        <?php
          if(isset($errores3)):?>
            <ul class="alert alert-danger">
              <?php
              foreach ($errores1 as $key => $value) :?>
                <li> <?=$value;?> </li>
                <?php endforeach;?>
            </ul>
          <?php endif;?>
          <?php
            if(isset($errores4)):?>
              <ul class="alert alert-danger">
                <?php
                foreach ($errores1 as $key => $value) :?>
                  <li> <?=$value;?> </li>
                  <?php endforeach;?>
              </ul>
            <?php endif;?>

      <div class="row">
        <div class="col-md-6 offset-md-3">

                      <div class="alert alert-dark" role="alert">
                          <h2 class="display-6 text-center">Pregunta</h2>
                        </div>
                        <div class="img-thumbnail">
                          <?php if ($buscarPregunta[0]["image"]!=NULL):?>
                          <img src="<?=$buscarPregunta[0]["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
                        <?php endif;?>
                          <h2 class="text-center"><?=$buscarPregunta[0]["name"]?></h2>
                        </div>
                        <br>
                        <div class="alert alert-dark" role="alert">
                            <h2 class="display-6 text-center">Respuestas</h2>
                          </div>

                      <form class="registro" action="agregarRespuesta.php" method="post" enctype= "multipart/form-data">

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

                        </div>
                        <div class="form-group">
                            <input name="fileRespuesta2"type="file" class="form-control-file" id="fileRespuesta2">
                            <small id="fileRespuesta2" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                          </div>
                          <div class="form-group">
                            <label for="inputRespuesta3">#3 Respuesta</label>
                            <input name="respuesta3"type="text" class="form-control" id="inputRespuesta3" aria-describedby="respuesta3Help" placeholder="Respuesta3">

                          </div>
                          <div class="form-group">
                              <input name="fileRespuesta3" type="file" class="form-control-file" id="fileRespuesta3">
                              <small id="fileRespuesta3" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                            </div>
                            <div class="form-group">
                              <label for="inputRespuesta4">#4 Respuesta</label>
                              <input name="respuesta4" type="text" class="form-control" id="inputRespuesta4" aria-describedby="respuesta4Help" placeholder="Respuesta4">

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
                            <button type="submit" class="btn btn-primary">Guardar Respuestas</button>

    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
    </div>
    </body>

    </html>

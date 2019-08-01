
<?php

$titulo = "Agregar Nueva Serie";


require_once("autoload.php");
if ($_POST){
  //Se instancia un nuevo Usuario
  $serie = new Serie($_POST["nameSerie"],$_FILES);
  //Aquí verifico si los datos registrados por el usuario pasan las validaciones
  $errores = $validar->validacionSerie($serie);
  //De no existir errores entonces:
  //var_dump($serie);
  if(count($errores)==0){
        //Busco a ver si el usuario existe o no en la base de datos
    $serieEncontrada = BaseMYSQL::buscarPorSerie($serie->getNombre(),$pdo,'series');
    if($serieEncontrada != false){
      $errores["nombre"] = "Serie ya existe";
    }else{
      $avatar=$registro->armarAvatarSerie($serie->getAvatar(),$serie->getNombre());
        //var_dump($avatar);
      //Aquí guardo en el servidor la foto que el usuario seleccionó
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarSerie($pdo,$serie,'series',$avatar);
      //Aquí redirecciono el usuario al login
      redirect ("administrador.php");
    }
  }

 }
?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ingreso de Series - Seriales</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="master.css">

    </head>
    <body>
      <?php require_once("php/headerAdmin.php");?>

       <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Serie</h2>
          </div>

          <form class="agregarSerie" action="agregarSerie.php" method="post" enctype= "multipart/form-data">
            <?php
              if(isset($errores)):?>
                <ul class="alert alert-danger">
                  <?php
                  foreach ($errores as $key => $value) :?>
                    <li> <?=$value;?> </li>
                    <?php endforeach;?>
                </ul>
              <?php endif;?>

                <div class="form-group">
                      <label for="InputSerie">Nombre Serie</label>
                      <input name="nameSerie" type="text" class="form-control"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" id="InputSerie"  placeholder="Ingrese Serie">

                 </div>

                <div class="form-group">
                      <input name="avatar" type="file" class="form-control-file" id="fileSerie">
                      <small id="fileSerie" class="form-text text-muted">Se solicita ingrese el logo de la serie. (png y jpg)</small>

                </div>


                      <button name="submit" type="submit" class="btn btn-primary">Guardar Serie</button>
          </form>
        </div>
      </div>
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                  </div>
                </body>

                </html>

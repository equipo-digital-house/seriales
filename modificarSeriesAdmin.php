<!DOCTYPE html>

<?php
//var_dump($_POST);
$id_serie=0;
require_once("autoload.php");
if (isset($_GET["id"])) {
  $id_serie=$_GET["id"];
  $serieAModificar =  Query::serieModificar($pdo,'series',$id_serie);
//var_dump($serieAModificar);
}


if($_POST){
  //Se instancia un nuevo Usuario
  $id=(int)$_POST["id"];

  if($_FILES){
  $avatar=$_FILES;
  }else{
    $avatar=$_POST["image"];
  }
  $serie = new Serie($_POST["nameSerie"],$avatar);

  $errores = $validar->validacionSerie($serie);

  if(count($errores)==0){
        //Busco a ver si el usuario existe o no en la base de datos
        $avatar=$registro->armarAvatarSerie($serie->getAvatar(),$serie->getNombre());
        $serie->setAvatar($avatar);//var_dump($avatar);
      //Aquí guardo en el servidor la foto que el usuario seleccionó
      //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::actualizarSerie($pdo,$id,'series',$serie);
      //Aquí redirecciono el usuario al login
      redirect ("administrador.php");
    }
}



 ?>
<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Modificación de la Serie</title>
  </head>

  <body>
    <?php require_once("php/headerAdmin.php");?>
    <div class="row">
     <div class="col-md-6 offset-md-3">
             <div class="img-thumbnail">
               <img src="<?=$serieAModificar["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
               <h2 class="text-center"><?=$serieAModificar["name"]?></h2>
             </div>
           <div class="alert alert-dark" role="alert">
               <h2 class="display-6 text-center">Modificar Serie</h2>
           </div>
           <ul class="nav justify-content-end">
           <li class="nav-item">
             <a class="nav-link" href="listadoSeriesAdmin.php"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
           </li>

           </ul>
            <form class="agregarSerie" action="modificarSeriesAdmin.php" method="post" enctype= "multipart/form-data">
               <?php foreach ($serieAModificar as $key => $value) : ?>
                   <div class="form-group">
                     <?php if($key=="name"):?>
                         <label for="InputSerie">Nombre Serie</label>
                         <input name="nameSerie" type="text" class="form-control" value="<?=$value?>" id="InputSerie"  placeholder="">
                      <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="form-group">
                          <input name="avatar" type="file" class="form-control-file" id="fileSerie">
                          <small id="fileSerie" class="form-text text-muted">Se solicita ingrese el logo de la serie. (png y jpg)</small>

                    </div>


                          <button name="submit" type="submit" class="btn btn-primary">Modificar Serie</button>
                           <input type="hidden" name="id" value="<?=$id_serie;?>">
                           <input type="hidden" name="imagen" value="<?=$serieAModificar["image"];?>">

               </form>
          </div>

     </div>
   </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

<!DOCTYPE html>

<?php
require_once("autoload.php");
if (isset($_GET["id"])) {
  $id_serie=$_GET["id"];
  $serieAModificar =  Query::serieModificar($pdo,'series',$id_serie);

}

if (isset($_POST["modificar"])) {
    foreach ($_POST as $key => $value) {
    $sql="update series set $key='$value' where series.id=:id";
    $query=$pdo->prepare($sql);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    header('Location:listadoSeriesAdmin.php');
    }
  } elseif (isset($_POST["no"])){
      header('Location:listadoSeriesAdmin.php');
      exit;
  }

 ?>
<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
       <form>
         <?php foreach ($serieAModificar as $key => $value) : ?>
             <div class="form-group">
               <?php if($key=="name"):?>
                   <label for="InputSerie">Nombre Serie</label>
                   <input name="nameSerie" type="text" class="form-control" value="<?=$value?>" id="InputSerie"  placeholder="">
                <?php endif;?>
              </div>
              <div class="form-group">
                <?php if($key=="image"):?>
                    <label for="InputImagen">Ruta de logo en carpeta de archivos</label>
                    <input name="nameRuta" type="text" class="form-control" value="<?=$value?>" disabled id="InputImagen"  placeholder="">
                 <?php endif;?>
               </div>
          <?php endforeach;?>
          <div class="form-group form-check">
            <input name="addImagenPregunta" type="checkbox" class="form-check-input" id="checkIddQuestion">
            <label class="form-check-label" for="checkIddQuestion">¿Desea cambiar la imagen de la serie?</label>
          </div>
             <div class="form-group">
                   <input type="file" class="form-control-file" id="checkModImagen">
                   <small id="fileSerie" class="form-text text-muted">Ingrese nueva logo de serie sólo si realizo check (png y jpg)</small>
             </div>

                   <button type="submit" name="guardar" class="btn btn-primary">Guardar Serie</button>
                   <button type="submit" name="cancelar" class="btn btn-primary">Cancelar</button>
                   <input type="hidden" name="id" value="<?=$id_series;?>">
       </form>
     </div>
   </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

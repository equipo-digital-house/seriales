<!DOCTYPE html>

<?php
require_once("autoload.php");
$id_questions=$_GET["id"];

//$serieSeleccionada = Query::mostrarSeries($pdo,'series',$id_serie);

$listadoPregunta=Query::mostrarAnswer($pdo,'answers',$id_questions);
$id_serie=$listadoPregunta[0]["serie_id"];

$serieSeleccionada=Query::mostrarSeries($pdo,'series',$id_serie);

$cont=1;

?>
<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title><?=$serieSeleccionada[0]["name"]?></title>
  </head>
  <body>
  <?php require_once("php/headerAdmin.php");?>
    <!--Aquí les dejo a su imaginación y creativodad para jugar con esto como quieran-->
    <div class="container">
      <div class="img-thumbnail">
        <img src="<?=$serieSeleccionada[0]["image"]?>" alt="" class="img-fluid rounded mx-auto d-block" width="200px">
      </div>
      <h2 class="text-center"><?=$listadoPregunta[0]["pregunta"]?></h2>

        <div class="">
          <table class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Respuestas</th>
                <th scope="col">Correcta</th>
                <th scope="col">imagen</th>
                <th scope="col">Modificar</th>

              </tr>
            </thead>
            <tbody>
                <?php foreach ($listadoPregunta as $key => $value):?>
                  <tr>

                    <th scope="row"><?= $cont++?></th>
                    <td><?=$value["name"];?></td>
                    <td><?=$value["correctAnswer"];?></td>
                    <?php if($value["image"]!=NULL):?>
                       <td><img src="<?=$value["image"]?>" alt="" class="img-fluid rounded" width="100px"></td>
                     <?php else:?> <td>Sin Imagen</td>
                     <?php endif;?>
                        <td><a href="modificarSeriesAdmin.php?id=<?=$value['id'];?>">
                          <i class="far fa-edit"></i>
                        </a>
                    </td>


                  </tr>
                <?php endforeach;?>
            </tbody>
          </table>
        </div>
    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<a href="mostrarSeriesAdmin.php?id=<?=$id_serie?>">Retornar</a>
</html>

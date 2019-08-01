<?php
require_once("autoload.php");

if($_POST){
  $preguntaFrecuente = new PreguntaFrecuente($_POST['name'], $_POST['answer']);

Query::insertarPreguntaFrecuente($preguntaFrecuente, $pdo);
}

$preguntasFrecuentes = Query::listarPreguntasFrecuentes($pdo, 'frequentquestions');
 ?>


 <html>
   <head>
     <title>Administrador de preguntas frecuentes</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
     <link rel="stylesheet" href="master.css">
     <meta charset="utf-8">
   </head>

   <body>
  <?php require_once("php/headerAdmin.php");?>
     <div class="container-fluid">

<!--Formulario para agregar preguntas frecuentes-->

       <section class="formulario">
         <div id="formContainer" class="row align-items-center">
            <div class="col-sm-10 offset-md-1">

            <h2 class="text-center">Administrador de preguntas frecuentes</h2>

            <form id="formulario"  class="form" name="preguntasFrecuentes" novalidate action=""  method="POST">

            <div class="form-group">
            <label for="name">Pregunta</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Pregunta">
            </div>

            <div class="form-group">
            <label for="answer">Respuesta</label>
            <textarea name="answer" rows="8" cols="80" id="answer" class="row align-items-left"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            </form>


<!--Listado de preguntas frecuentes-->

<div class="spacer"></div>
  <h2 class="text-center">Listado de preguntas frecuentes</h2>
  <div class="spacer"></div>
  <table class="table">
      <thead>
          <tr>
              <th>
                  Pregunta
              </th>
              <th>
                  Respuesta
              </th>
              <!-- <th>
                  Ver
              </th> -->
              <th>
                  Editar
              </th>
              <th>
                  Eliminar
              </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($preguntasFrecuentes as $key => $pregunta) :?>
          <tr>
              <td>
                  <?= $pregunta['name'];?>
              </td>
              <td>
                  <?= $pregunta['answer'];?>
              </td>
              <td>
                  <a href="editarPreguntaFrecuente.php?id=<?=$pregunta['id']?>">Editar</a>
              </td>
              <td>
                  <a href="eliminarPreguntaFrecuente.php?id=<?=$pregunta['id']?>">Eliminar</a>
              </td>

          </tr>
          <?php endforeach;?>


      </tbody>

  </table>



            </div>
         </div>
       </section>
     </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></

   </body>
 </html>

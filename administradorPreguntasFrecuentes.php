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
     <link href="https://fonts.googleapis.com/css?family=Lato|Righteous|Ubuntu|Fjalla+One" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="css/master.css">
     <meta charset="utf-8">
   </head>

   <body>

     <div class="container-fluid">

<!--Formulario para agregar preguntas frecuentes-->

       <section class="formulario">
         <div id="formContainer" class="row align-items-center">
            <div class="col-sm-10 offset-md-1">

            <h2 class="tituloAdminFaq1" class="text-center">Agregar pregunta frecuente</h2>

            <form id="formulario"  class="form" name="preguntasFrecuentes" novalidate action=""  method="POST">

            <div class="form-group">
            <label for="name">Pregunta</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Pregunta">
            </div>

            <div class="form-group">
            <label for="answer">Respuesta</label>
            <textarea name="answer" rows="8" cols="80" id="answer" class="row align-items-left"></textarea>
            </div>

            <button class="guardarFaq" type="submit" class="btn">Guardar</button>
            </form>


<!--Listado de preguntas frecuentes-->

        <div class="spacer"></div>
          <h2 class="tituloAdminFaq2">Listado de preguntas frecuentes</h2>

          <div class="spacer"></div>
          <table class="table">

              <thead>
                  <tr>
                      <th>Pregunta</th>
                      <th>Respuesta</th>
                      <th><i class="fas fa-edit"></i></th>
                      <th><i class="fas fa-trash"></i></th>
                  </tr>
              </thead>

              <tbody>
                  <?php foreach ($preguntasFrecuentes as $key => $pregunta) :?>
                  <tr>
                      <td><?= $pregunta['name'];?></td>
                      <td><?= $pregunta['answer'];?></td>
                      <td>
                          <a href="editarPreguntaFrecuente.php?id=<?=$pregunta['id']?>"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                          <a href="eliminarPreguntaFrecuente.php?id=<?=$pregunta['id']?>"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  <?php endforeach;?>
              </tbody>

          </table>

            <a class="flechaVolver" href="administrador.php"><i class="fas fa-long-arrow-alt-left"></i></a>
            </div>
          </div>
        </div>
      </section>
          
    </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

   </body>
 </html>

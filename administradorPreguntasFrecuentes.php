<?php
require_once("autoload.php");
if($_POST){
  $preguntaFrecuente = new PreguntaFrecuente($_POST['name'], $_POST['answer']);
  BaseMySQL::guardarPreguntaFrecuente($pdo, 'frequentquestions',$preguntaFrecuente);
  redirect("administradorPreguntasFrecuentes.php");
  var_dump($preguntaFrecuente);
  exit;
}

 ?>


 <html>
   <head>
     <title>Administrador de preguntas frecuentes</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
     <link rel="stylesheet" href="css/master.css">
     <meta charset="utf-8">
   </head>

   <body>

     <div class="container-fluid">

       <section class="formulario">
         <div id="formContainer" class="row align-items-center">
            <div class="col-sm-10 offset-md-1">

            <h1>Administrador de preguntas frecuentes</h1>

            <form id="formulario"  class="form" name="preguntasFrecuentes" novalidate action=""  method="POST">

            <div class="form-group">
            <label for="name">Pregunta</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Pregunta" value="">
            </div>

            <div class="form-group">
            <label for="answer">Respuesta</label>
            <input required name="answer" type="text" class="form-control" id="answer" placeholder="Respuesta" value="">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            </div>
         </div>
       </section>
     </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></

   </body>
 </html>

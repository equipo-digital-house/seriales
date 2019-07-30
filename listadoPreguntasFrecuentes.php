<?php
require_once("autoload.php");

$preguntasFrecuentes = Query::listarPreguntasFrecuentes($pdo, 'frequentquestions');

?>


<html>
  <head>
    <title>Listado de preguntas frecuentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
  </head>

  <body>
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
                  <a href="editarPreguntaFrecuente.php?id=">Editar</a>
              </td>
              <td>
                  <a href="eliminarPreguntaFrecuente.php?id=">Eliminar</a>
              </td>

          </tr>
          <?php endforeach;?>


      </tbody>

  </table>

</body>

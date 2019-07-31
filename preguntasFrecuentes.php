<?php
require_once("autoload.php");


$titulo = "Preguntas Frecuentes";

$preguntasFrecuentes = Query::listarPreguntasFrecuentes($pdo, 'frequentquestions');
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php
require_once("php/head.php");
 ?>
  <body>
    <div class="container-fluid p-0">
      <?php
      require_once('php/header.php');
      ?>
 <main class="main-pf">


        <section class="preguntas-frecuentes">
          <div class="accordion" id="accordionExample">
            <?php
            foreach ($preguntasFrecuentes as $key => $pregunta):?>
                    <div class="card">
                      <?php
                      $card="collapse";
                      $card=($pregunta["id"]!="#1")?"collapse":"collapse";
                      ?>

                      <!-- BORRAR EL NUMERAL DEL 1 LINEA 29 -->
                      <!-- REVISAR IF TERNARIO LINEA 29, TAL VEZ NO HACE FALTA -->
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="font-preguntas btn btn-link" type="button" data-toggle="collapse" data-target="<?= $pregunta["Target"]?>" aria-expanded="true" aria-controls="<?= $pregunta["idCollapse"]?>">
                            <!-- DEJAR IGUAL EL IDCOLLAPSE --> -->
                                 <!-- <?=$pregunta[""]?> -->
                                 <!--  CAMBIAR NUMERO POR ID
                                 <?=$pregunta["name"]?>
                                 <!-- CAMBIAR NOMBRE POR NAME -->
                          </button>
                        </h2>
                      </div>

                  <div id="<?= $pregunta["idCollapse"]?>" class="<?=$card?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                          <?=$pregunta["answer"]?>
                          <!-- CAMBIAR DESCRIPCION POR ANSWER -->
                      </div>
                    </div>
                </div>

              <?php endforeach;?>

    </div>
  </div>

        </section>


        <?php
        require_once('php/footer.php');
         ?>




    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</main>
      </body>
</html>

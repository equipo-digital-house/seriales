<?php
require_once("autoload.php");
if(!isset($_SESSION["email"])) {
    redirect("registro.php");
}?>
<div class="bienvenida">
  <h3 class="saludo"> <?="Hola, ".$_SESSION["name"]."."." "."¿Estás listx para jugar?";?></h3>

</div>

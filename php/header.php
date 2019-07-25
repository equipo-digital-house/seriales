<?php
?>
<header>
  <nav>
    <ul class="row" style="margin-bottom: 0;">
      <a href="index.php" class="offset-3 col-6 col-md-2 offset-md-0"><img class="logo" src="img/logoSerialesFB.png" alt="Seriales"></a>
      <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a href="index.php">inicio</a></li>
      <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a href="preguntas.php">preguntas</a></li>
      <li class="col-12 flex-column flex-md-row col-md-2 menu-items">
        <?php if(isset($_SESSION["email"])): ?>
          <a href="perfil.php">mi perfil</a>
          <?php else: ?>
          <a href="registro.php">registro</a>
        <?php endif; ?>
        </li>

      <li class="col-12 flex-column flex-md-row col-md-2 menu-items">
        <?php
        if(isset($_SESSION["email"])): ?>
          <a href="logout.php">desloguearme</a>
          <?php else: ?>
          <a href="login.php">login</a>
        <?php endif; ?>
      </li>
      <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a class="play-btn" href="juego.php">jugar</a></li>
    </ul>

    <div class="redessociales" align="right">
      <a href="#"><i class="fab fa-google-play"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-facebook-square"></i></a>
      <a href="#"><i class="fab fa-apple"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </nav>

  <?php
  if(isset($_SESSION["email"])){
    require_once('php/bienvenida.php');

  }
  ?>
</header>

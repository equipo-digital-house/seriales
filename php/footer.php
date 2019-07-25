<?php
?>
<main class="main-footer">
<footer class="footer-principal">
  <div class="menu-secundario">
    <a href="index.php">Home</a>
    <a href="juego.php">¡Jugar!</a>
    <a href="preguntas.php">Preguntas</a>
    <?php if(isset($_SESSION["email"])): ?>
      <a href="perfil.php">Mi Perfil</a>
      <?php else: ?>
      <a href="registro.php">Registrarse</a>
    <?php endif; ?>


    <?php
    if(isset($_SESSION["email"])): ?>
      <a href="logout.php">Desloguearme</a>
      <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </div>

</footer>
</main>

    <header>
      <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand text-light" href="#"><img src="img/logoSerialesFB.png" width="40" height="40" alt="">  Administración Seriales</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar">
              <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <a class="nav-item nav-link active text-light" href="administrador.php">Home<span class="sr-only">(current)</span></a>
             <a class="nav-item nav-link text-light" href="p.php">Usuarios</a>
            <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Series
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="listadoSeriesAdmin.php">Listado</a>
        <a class="dropdown-item" href="agregarSerie.php">Agregar Series</a>
        <a class="dropdown-item" href="agregarPreguntas.php">Agregar Preguntas</a>
        <a class="dropdown-item" href="eliminarSeriesAdmin.php">Eliminar Series</a>

       </div>
       </li>
      <a class="nav-item nav-link text-light" href="administradorpreguntasfrecuentes.php">Preguntas Frecuentes</a>
          </div>
        </div>
      </nav>

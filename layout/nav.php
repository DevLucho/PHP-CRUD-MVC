<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/PHP-MVC/views/dashboard.php"><?php echo 'Bienvenido: '. $_SESSION["nombre"] ." ". $_SESSION["apellido"]?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/SenaSoftPhp/views/dashboard.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Opcion</a>
            </li>
        </ul>
        <span class="navbar-text" style="cursor: pointer">
            <a href="http://localhost/SenaSoftPhp/views/usuarios/logout.php"> Cerrar Sesion </a>
        </span>
    </div>
</nav>

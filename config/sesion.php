<?php

session_start();
if (!isset($_SESSION['nombre']) && !isset($_SESSION['apellido'])) {
    header("location: http://localhost/SenaSoftPhp/views/usuarios/login.php");
    die();
}
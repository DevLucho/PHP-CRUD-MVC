<?php

require_once '../models/usuario_model.php';

$u = new Usuario();

if (isset($_POST['login'])) {
    $cedula = $_POST['cedula'];
    $contrasenia = $_POST['contrasenia'];
    if ($u->login($cedula, $contrasenia)) {
        session_start();
        $user = $u->getFindCliente($cedula);
        $_SESSION["nombre"] = $user->nombre_cli;
        $_SESSION["apellido"] = $user->apellido_cli;
        header('location: ../views/dashboard.php');
    } else {
        header('location: ../views/usuarios/login.php?error=1');
    }
}

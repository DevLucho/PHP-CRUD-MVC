<?php

include_once '../models/usuario_model.php';

$u = new Usuario();
if (isset($_POST['create']) || isset($_POST['edit'])) {

    if (!isset($_POST["cedula"]) || !isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["telefono"]) || !isset($_POST["direccion"]) || !isset($_POST["ciudad"]) || !isset($_POST["contra"])) {
        exit();
    }
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $contrasenia = $_POST["contra"];

    if (isset($_POST['create'])) {
        if ($u->crearCliente($cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia)) {
            header('location: ../views/cliente/crear_cliente.php?success=true');
        } else {
            header('location: ../views/cliente/crear_cliente.php?error=true');
        }
    } elseif (isset($_POST['edit'])) {
        if ($u->actualizarCliente($cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia)) {
            header('location: ../views/dashboard.php?success=true&type=edit');
        } else {
            header('location: ../views/dashboard.php?error=true&type=edit');
        }
    } else {
        header("location: http://localhost/SenaSoftPhp/views/usuarios/login.php");
        die();
    }
} elseif (isset($_GET['delete'])) {
    if ($u->eliminarCliente($_GET['id'])) {
        header('location: ../views/dashboard.php?success=true&type=delete');
    } else {
        header('location: ../views/dashboard.php?error=true&type=delete');
    }
}




<?php

require_once dirname(__file__, 2) . '../config/conexion.php';

class Usuario {

    private $conn;
    private $enlace;

    public function __construct() {
        $this->conn = new Conexion();
        $this->enlace = $this->conn->conectar();
    }

    public function login($cedula, $contrasenia) {
        $sql = "SELECT * FROM tbl_cliente WHERE cedula_cli= :cedula AND contrasenia= :contrasenia";
        $result = $this->enlace->prepare($sql);
        /*
          $documento = $_POST["documento"];
          $edad = $_POST["edad"];
         */
        $result->bindValue(":cedula", $cedula);
        $result->bindValue(":contrasenia", $contrasenia);
        $result->execute();
        if ($result->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getClientes() {
        $sql = $this->enlace->query("SELECT * FROM tbl_cliente;");
        $clientes = $sql->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }

    public function getFindCliente($cedula) {
        $sql = $this->enlace->prepare("SELECT * FROM tbl_cliente WHERE cedula_cli= ?;");
        $sql->execute([$cedula]);
        $cliente = $sql->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    public function crearCliente($cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia) {
        $sql = $this->enlace->prepare("INSERT INTO tbl_cliente(cedula_cli, nombre_cli, apellido_cli, telefono_cli, direccion_cli, cod_ciudad, contrasenia) VALUES ( ?, ?, ?, ?, ?, ?, ?);");
        $result = $sql->execute([$cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCliente($cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia) {
        $sql = $this->enlace->prepare("UPDATE tbl_cliente SET cedula_cli=?, nombre_cli=?, apellido_cli=?, telefono_cli=?, direccion_cli=?, cod_ciudad=?, contrasenia=? WHERE cedula_cli=?;");
        $result = $sql->execute([$cedula, $nombre, $apellido, $telefono, $direccion, $ciudad, $contrasenia, $cedula]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarCliente($cedula) {
        $sql = $this->enlace->prepare("DELETE FROM tbl_cliente WHERE cedula_cli=?;");
        $result = $sql->execute([$cedula]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

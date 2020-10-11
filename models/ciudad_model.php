<?php

require_once dirname(__file__, 2) . '../config/conexion.php';

class Ciudad {

    private $conn;
    private $enlace;

    public function __construct() {
        $this->conn = new Conexion();
        $this->enlace = $this->conn->conectar();
    }

    public function getCiudades() {
        $sql = $this->enlace->query("SELECT * FROM tbl_ciudad;");
        $ciudades = $sql->fetchAll(PDO::FETCH_OBJ);
        return $ciudades;
    }

    public function getFindCiudad($codigo_cda) {
        $sql = $this->enlace->prepare("SELECT * FROM tbl_ciudad WHERE codigo_cda= ?;");
        $sql->execute([$codigo_cda]);
        $ciudad = $sql->fetch(PDO::FETCH_OBJ);
        return $ciudad;
    }

}

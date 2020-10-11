<?php

class Conexion {

    private $host;
    private $user;
    private $password;
    private $dataBase;

    public function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dataBase = "entidad_bancaria";
    }

    public function conectar() {
        try {
            $enlace = $con = new PDO("mysql:host=$this->host;port=3308;dbname=" . $this->dataBase, $this->user, $this->password);
            $enlace->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $enlace->exec("SET CHARACTER SET utf8");
        } catch (Exception $ex) {
            die('<b>Error BD:</b> ' . $ex->getMessage());
        }
        return ($enlace);
    }

}


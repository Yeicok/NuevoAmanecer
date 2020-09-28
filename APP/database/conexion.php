<?php

require_once ($_SERVER['DOCUMENT_ROOT'].
'/APP/config/database.php');
class Conexion {

    private $con;

    // Conexión a la BD mysql
    public function __construct() {
        $this->con = new mysqli(HOST, USER, PASS, DB);
        $this->con->set_charset(CHARSET);
    }

    // Select
    public function consultar($consulta) {
        $rs = $this->con->query($consulta);
        
        
        return ($rs->num_rows > 0) ? $rs : $rs != null;

    }

    // Insert, Update, Delete
    public function ejecutar($ejecutar) {

        $res = $this->con->query($ejecutar);
        return $res;
    }


    public function ultimoid(){
        $r = $this->con->insert_id;
        return $r;
     }

    public function cerrar() {
        $this->con->close();
    }
}
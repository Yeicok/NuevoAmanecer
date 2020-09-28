<?php
require_once $_SERVER["DOCUMENT_ROOT"].
'/APP/database/conexion.php';

class administrador{

  private $selectE;

    public function crearEnfermero(){
      $insert = ("INSERT usuarios VALUES(
        '',
        '$this->usuario',
        '$this->nombre',
        '$this->clave',
        '$this->rol'
        )");

        // echo "<br>".$insert;//

        $con =  new Conexion();        
        $res = $con->ejecutar($insert);
        $con-> cerrar();
        return $res;
    }

    public function crearPaciente(){
      $insert = ("INSERT paciente VALUES(
        '',
        '$this->nombreP',
        '$this->edad',
        '$this->dx',
        '$this->cedula',
        '$this->entidad'
        )");

        // echo "<br>".$insert;//

        $con =  new Conexion();        
        $res = $con->ejecutar($insert);
        $con-> cerrar();
        return $res;
    }

    public function updatePaciente(){
      $insert = ("UPDATE paciente SET
                  nombreP = '$this->nombreP',
                  edad = '$this->edad',
                  dx = '$this->dx',
                  cedula = '$this->cedula',
                  entidad = '$this->entidad'
                  where idPaciente ='$this->idPaciente'
        ");

        // echo "<br>".$insert;//

        $con =  new Conexion();        
        $res = $con->ejecutar($insert);
        $con-> cerrar();
        return $res;
    }

    public static function getEnfermeria($id){
      $select = "
        select id,usuario, nombre, rol, tipo from usuarios u
        inner join perfil p 
            on u.rol = p.idRol
        WHERE rol ='$id'
      ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    
    }

    public static function getDetalleEnfermeria($id){
      $select = "
        SELECT *
        FROM usuarios u
             INNER join novedades n
                 on u.id = n.usuarioId
                 INNER JOIN paciente p
                 on n.pacienteId = p.idPaciente 
                 WHERE id ='$id'
      ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function DetallePacientes($id){
      $select = "
        SELECT *
        FROM usuarios u
             INNER join novedades n
                 on u.id = n.usuarioId
                 INNER JOIN paciente p
                 on n.pacienteId = p.idPaciente 
                 WHERE nombreP ='$id'
      ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function getDetallePaciente($id){
      $select = "
        SELECT *
        FROM paciente 
                 WHERE idPaciente ='$id'
      ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function getPacientes(){
      $select = "SELECT * FROM paciente";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    
    }

    public static function getEnfermero(){
      $select = "SELECT * FROM usuarios WHERE rol = '2'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    
    }

    public static function validarEnfermero($usuario, $nombre){
      $select = "SELECT id, usuario, nombre, rol FROM usuarios WHERE usuario = '$usuario' AND nombre = '$nombre' ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function validarPaciente($cedula, $nombre){
      $select = "SELECT * FROM paciente WHERE cedula = '$cedula' AND nombreP = '$nombre' ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaNovedad($id){
      $select = "SELECT *
      FROM usuarios u
           INNER join novedades n
               on u.id = n.usuarioId
               INNER JOIN paciente p
               on n.pacienteId = p.idPaciente 
               WHERE idNovedad ='$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaSignosv($id){
      $select = "SELECT *
      FROM usuarios u
           INNER join novedades n
               on u.id = n.usuarioId
               INNER JOIN paciente p
               on n.pacienteId = p.idPaciente 
               INNER JOIN signosv s
               ON n.idNovedad = s.novedadId
               WHERE idNovedad ='$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaBalancella($id){
      $select = "SELECT *
      FROM usuarios u
           INNER join novedades n
               on u.id = n.usuarioId
               INNER JOIN paciente p
               on n.pacienteId = p.idPaciente 
               INNER JOIN balancella b
               ON n.idNovedad = b.novedadId
               WHERE idNovedad ='$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaLiquidoe($id){
      $select = "SELECT *
      FROM usuarios u
           INNER join novedades n
               on u.id = n.usuarioId
               INNER JOIN paciente p
               on n.pacienteId = p.idPaciente 
               INNER JOIN liquidoe l
               ON n.idNovedad = l.novedadId
               WHERE idNovedad ='$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaMedicacion($id){
      $select = "SELECT *
      FROM usuarios u
           INNER join novedades n
               on u.id = n.usuarioId
               INNER JOIN paciente p
               on n.pacienteId = p.idPaciente 
              INNER JOIN medicacion m
               ON n.idNovedad = m.novedadId
               WHERE idNovedad ='$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    

}


?>
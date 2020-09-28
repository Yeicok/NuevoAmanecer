<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/APP/database/conexion.php';

class usuarios{
    public $pass;
    public $user;

    public static function login($user, $pass){
        $select = "SELECT id, usuario, nombre, tipo, rol
        from usuarios u
          INNER join perfil p
            on u.rol = p.idRol
        where (usuario= '$user') and (clave= '$pass')";
        $con = new Conexion();
        $rs = $con->consultar($select);
        $con->cerrar();
        return $rs;   
      }

      public  function modificarClave(){
      
        $user = $this->usuario;
        $pass = $this->clave;
      
      $actualizar = ("UPDATE usuarios SET clave='$pass' 
                    WHERE usuario='$user'");
      
      $con = new Conexion();
      $res = $con->ejecutar($actualizar);
      $con-> cerrar();
      return $res;
      }
}


?>
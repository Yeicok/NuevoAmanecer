<?php
require_once $_SERVER["DOCUMENT_ROOT"].
'/APP/database/conexion.php';

class enfermeros {
    public $nombreP;
    public $turnoP;
    public $fechaP;
    public $usuarioId;
    public $firma;

    public $horasv;
    public $tiposv;
    public $descsv;
    
    public $horablla;
    public $tipoblla;
    public $descblla;
    
    public $horale;
    public $tipole;
    public $descle;

    public $horamP;
    public $medicP;
    public $viaP;
    public $dosisP;
    
    public $notaF;

    public  function pacienteC(){
        $select = "SELECT *
        from paciente ";
        $con = new Conexion();
        $rs = $con->consultar($select);
        $con->cerrar();
        return $rs;   
    }

    public function addNotasPaciente(){
      $con =  new Conexion();        

      $horasv = $this->horasv;
      $tiposv = $this->tiposv;
      $descsv = $this->descsv;
      
      $horablla = $this->horablla;
      $tipoblla = $this->tipoblla;
      $descblla = $this->descblla;
      
      $horale = $this->horale;
      $tipole = $this->tipole;
      $descle = $this->descle;
      
      $horamP = $this->horamP;
      $medicP = $this->medicP;
      $viaP   = $this->viaP;
      $dosisP = $this->dosisP;


      $insert = ("INSERT novedades VALUES(
                  '',
                  ".$this->usuarioId.",
                  ".$this->nombreP.",
                  '".$this->turnoP."',
                  '".$this->fechaP."',
                  '".$this->firma."',
                  '".$this->notaF."'
                  )");
                  // echo "<br>".$insert;

                  $res = $con->ejecutar($insert);
              
                  $ultimoid = $con->ultimoid();
                  //echo "<br>".$ultimoid;

            for($j=0; $j<sizeof($horasv); ++$j){
              $insert =("INSERT signosv values(
              '',       
              ".$ultimoid.",
              '".$tiposv[$j]."',
              '".$horasv[$j]."',
              '".$descsv[$j]."'
              )");
              //echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              } 

            for($j=0; $j<sizeof($tipoblla); ++$j){
              $insert =("INSERT balancella values(
              '',       
              ".$ultimoid.",
              '".$tipoblla[$j]."',
              '".$horablla[$j]."',
              '".$descblla[$j]."'
              )");
            // echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              }     

            for($j=0; $j<sizeof($tipole); ++$j){
              $insert =("INSERT liquidoe values(
              '',       
              ".$ultimoid.",
              '".$tipole[$j]."',
              '".$horale[$j]."',
              '".$descle[$j]."'
              )");
              //echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              }   

      for($i=0; $i<sizeof($horamP); ++$i){
        $insert =("INSERT medicacion values(
        '',       
        ".$ultimoid.",
        '".$horamP[$i]."',
        '".$medicP[$i]."',
        '".$viaP[$i]."',
        '".$dosisP[$i]."'
        )");
        // echo "<br>".$insert;   
        $res = $con->ejecutar($insert);
        }               

                  // if($res == 1){
                  //      echo json_encode ("Se añadio correctamente");
                  // }else{
                  //      echo json_encode ("No se Guardo");
            
                  // }
                  $con-> cerrar();
                  return $res;
    }

    public function updateNovedad(){
      $con =  new Conexion();        

      $horasv = $this->horasv;
      $tiposv = $this->tiposv;
      $descsv = $this->descsv;
      
      $horablla = $this->horablla;
      $tipoblla = $this->tipoblla;
      $descblla = $this->descblla;
      
      $horale = $this->horale;
      $tipole = $this->tipole;
      $descle = $this->descle;
      
      $horamP = $this->horamP;
      $medicP = $this->medicP;
      $viaP   = $this->viaP;
      $dosisP = $this->dosisP;

      $novedadId = $this->novedadId;


      $update = ("UPDATE novedades SET
                  novedad = '$this->notaF'
                  where idNovedad ='$this->idNovedad'
                  ");
                  // echo "<br>".$insert;

                  $res = $con->ejecutar($update);
              
              //eleminar la ultima fila para evitar repecion de datos
              $eliminar = ("DELETE FROM signosv WHERE novedadId = ".$novedadId);
              $res = $con->ejecutar($eliminar);

            for($j=0; $j<sizeof($horasv); ++$j){
              $insert =("INSERT signosv values(
              '',       
              ".$novedadId.",
              '".$tiposv[$j]."',
              '".$horasv[$j]."',
              '".$descsv[$j]."'
              )");
              //echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              } 

            //eleminar la ultima fila para evitar repecion de datos
            $eliminar = ("DELETE FROM balancella WHERE novedadId = ".$novedadId);
            $res = $con->ejecutar($eliminar);  

            for($j=0; $j<sizeof($tipoblla); ++$j){
              $insert =("INSERT balancella values(
              '',       
              ".$novedadId.",
              '".$tipoblla[$j]."',
              '".$horablla[$j]."',
              '".$descblla[$j]."'
              )");
            // echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              }     

            //eleminar la ultima fila para evitar repecion de datos
            $eliminar = ("DELETE FROM liquidoe WHERE novedadId = ".$novedadId);
            $res = $con->ejecutar($eliminar);  
              
            for($j=0; $j<sizeof($tipole); ++$j){
              $insert =("INSERT liquidoe values(
              '',       
              ".$novedadId.",
              '".$tipole[$j]."',
              '".$horale[$j]."',
              '".$descle[$j]."'
              )");
              //echo "<br>".$insert;   
              $res = $con->ejecutar($insert);
              }   


      //eleminar la ultima fila para evitar repecion de datos
      $eliminar = ("DELETE FROM medicacion WHERE novedadId = ".$novedadId);
      $res = $con->ejecutar($eliminar); 

      for($i=0; $i<sizeof($horamP); ++$i){
        $insert =("INSERT medicacion values(
        '',       
        ".$novedadId.",
        '".$horamP[$i]."',
        '".$medicP[$i]."',
        '".$viaP[$i]."',
        '".$dosisP[$i]."'
        )");
        // echo "<br>".$insert;   
        $res = $con->ejecutar($insert);
        }               

                  // if($res == 1){
                  //      echo json_encode ("Se añadio correctamente");
                  // }else{
                  //      echo json_encode ("No se Guardo");
            
                  // }
                  $con-> cerrar();
                  return $res;
    }

    public static function validarPaciente($nombreP, $fechaP){
      $select = "SELECT * FROM novedades WHERE pacienteId = '$nombreP' AND fecha = '$fechaP' ";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function getNovedad($id){
      $select = "SELECT idNovedad,nombreP,turno,fecha,novedad FROM usuarios u
      INNER join novedades n
          on u.id = n.usuarioId
          INNER JOIN paciente p
          on n.pacienteId = p.idPaciente WHERE id = '$id'";
      $con = new Conexion();
      $rs = $con->consultar($select);
      $con->cerrar();
      return $rs;
    }

    public static function consultaUpdateNovedad($id){
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

    public static function consultaUpdateSignosv($id){
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

    public static function consultaUpdateBalancella($id){
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

    public static function consultaUpdateLiquidoe($id){
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

    public static function consultaUpdatemedicacion($id){
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
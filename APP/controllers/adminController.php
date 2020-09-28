<?php
require_once $_SERVER["DOCUMENT_ROOT"].
'/APP/models/administrador.php';

class adminController{

    public function __construct(){
        SESSION_START();
        $action = isset($_GET["action"]) ? 
        $_GET["action"] : "all";
        if(method_exists($this, $action)){
            $this->$action();
        }else{
            $this->error();
        }
    }

    public function getEnfermeria(){
        $id = (isset($_GET["rol"])) ? $_GET["rol"] : 0;
        $vistaCNovedades = administrador::getEnfermeria($id);
        
    
        include $_SERVER["DOCUMENT_ROOT"].
        '/PUBLIC/views/panel-admin/enfermeria.php';
        
    }

    public function registrosEnfermeria(){

        $idEnfermeria = 2;

        $registroEnfermeria = administrador::getEnfermeria($idEnfermeria);
        if($registroEnfermeria != null){ 
            
            while ($row = $registroEnfermeria->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);        
            
        }else{
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/enfermeria.php';
            
        }

    }

    public function registrosPacientes(){

        $registrosPacientes = administrador::getPacientes();
        if($registrosPacientes != null){ 
            
            while ($row = $registrosPacientes->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);        
            
        }else{
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/paciente.php';
            
        }

    }

    public function getDetalleEnfermeria(){
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
           $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
            
            $res = administrador::getDetalleEnfermeria($id);
            if($res != null){ 

                include $_SERVER["DOCUMENT_ROOT"].
                '/PUBLIC/views/panel-admin/detalleEnfermeria.php';
            }else{

                include $_SERVER["DOCUMENT_ROOT"].
                '/PUBLIC/views/panel-admin/detalleEnfermeria.php';
            }    
    }

    public function detalleEnfermerias(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
            
        $res =  administrador::consultaNovedad($id);
        $res1 = administrador::consultaSignosv($id);
        $res2 = administrador::consultaBalancella($id);
        $res3 = administrador::consultaLiquidoe($id);
        $res4 = administrador::consultaMedicacion($id);
        if($res != null &&  $res1 != null &&  $res2 != null &&  $res3 != null &&  $res4 != null){ 
            
            $detalles   = $res->fetch_all()[0];
            $Signosv    = $res1->fetch_all();
            $Balancella = $res2->fetch_all();
            $Liquidoe   = $res3->fetch_all();
            $medicacion = $res4->fetch_all();

            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/novedadDetalleEnfermeria.php';
        }else{
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/novedadEnfermeria.php';
            
        }  

    }
    
    public function getDetallePaciente(){

        $id = (isset($_GET["id"])) ? $_GET["id"] : 0;

        $detalleEnfermeria = administrador::getDetallePaciente($id);
        if($detalleEnfermeria != null){ 
            
            $detalles   = $detalleEnfermeria->fetch_all()[0];

            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/detallePaciente.php';
        }else{
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/detallePaciente.php';
            
        }

    }

    public function DetallePaciente(){
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
           $id = (isset($_POST["NombrePaciente"])) ? $_POST["NombrePaciente"] : 0;
        // $id = 5;
        $res = administrador::DetallePacientes($id);
            if($res != null){ 

                include $_SERVER["DOCUMENT_ROOT"].
                '/PUBLIC/views/panel-admin/novedades.php';
            }else{
                include $_SERVER["DOCUMENT_ROOT"].
                '/PUBLIC/views/panel-admin/novedades.php';
            }    
    }

    public function DetallePacientes(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
            
        $res =  administrador::consultaNovedad($id);
        $res1 = administrador::consultaSignosv($id);
        $res2 = administrador::consultaBalancella($id);
        $res3 = administrador::consultaLiquidoe($id);
        $res4 = administrador::consultaMedicacion($id);
        if($res != null &&  $res1 != null &&  $res2 != null &&  $res3 != null &&  $res4 != null ){
            
            $detalles   = $res->fetch_all()[0];
            $Signosv    = $res1->fetch_all();
            $Balancella = $res2->fetch_all();
            $Liquidoe   = $res3->fetch_all();
            $medicacion = $res4->fetch_all();
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/novedadDetallePaciente.php';
            
        }else{
            
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/novedades.php';
            
        }  

    }

    public function crearEnfermero(){
      error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        if (isset($_POST["crearEnfermero"])){

            if($_POST['usuario'] === '' || $_POST['clave']=== '' || $_POST['clave1']=== '' || $_POST['nombre']=== '' || $_POST['rol']=== '')
            {
                echo json_encode('error0');       
            }else{
                if($_POST['clave'] != $_POST['clave1']){
                    echo json_encode('error1');
                }else {
                        $usuario = $_POST["usuario"];
                        $nombre = $_POST["nombre"];
                        $rs= administrador::validarEnfermero($usuario, $nombre);
                        /* determinar el número de filas del resultado */
                        //  $row_cnt = $rs->num_rows;
                        //  printf($row_cnt);
                    if( $rs != null && $rs->num_rows > 0){
                       echo json_encode('error2');
                    }else{
                        $enfermeria = new administrador();
                        $enfermeria->usuario = $_POST["usuario"];
                        $enfermeria->clave = $_POST["clave"];
                        $enfermeria->nombre = $_POST["nombre"];
                        $enfermeria->rol = $_POST["rol"];
                        
                        $res = $enfermeria->crearEnfermero();
                        if($res == 1){
                            echo json_encode ('Se guardo exitosamente');
                        }else{
                            echo json_encode ('No se guardo');
                        }
                    }
                }
            }

        }else {
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/enfermeria.php';
            // include $_SERVER["DOCUMENT_ROOT"].
            // '/Enfermeria/APP/models/enfermeros.php';
        }

    }

    public function crearPaciente(){
      error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        if (isset($_POST["crearPacientes"])){

            if($_POST['nombreP'] === '' || $_POST['edad']=== '' || $_POST['cedula']=== '' )
            {
                echo json_encode('error0');       
            }else{
                    $cedula = $_POST["cedula"];
                    $nombre = $_POST["nombreP"];
                    $rs= administrador::validarPaciente($cedula, $nombre);

                if( $rs != null && $rs->num_rows > 0){
                    echo json_encode('error1');
                }else{
                    $paciente = new administrador();
                    $paciente->nombreP = $_POST["nombreP"];
                    $paciente->edad    = $_POST["edad"];
                    $paciente->dx      = $_POST["dx"];
                    $paciente->cedula  = $_POST["cedula"];
                    $paciente->entidad = $_POST["entidad"];
                    
                    $res = $paciente->crearPaciente();
                    if($res == 1){
                        echo json_encode ('Se guardo exitosamente');
                    }else{
                        echo json_encode ('No se guardo');
                    }
                }
            }

        }else {
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/paciente.php';
            // include $_SERVER["DOCUMENT_ROOT"].
            // '/Enfermeria/APP/models/enfermeros.php';
        }

    }

    public function updatePaciente(){
      error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        if (isset($_POST["updatePaciente"])){

            if($_POST['nombreP'] === '' || $_POST['edad']=== '' || $_POST['cedula']=== '' )
            {
                echo json_encode('error0');       
            }else{

                $paciente = new administrador();
                $paciente->idPaciente = $_POST["idPaciente"];
                $paciente->nombreP = $_POST["nombreP"];
                $paciente->edad    = $_POST["edad"];
                $paciente->dx      = $_POST["dx"];
                $paciente->cedula  = $_POST["cedula"];
                $paciente->entidad = $_POST["entidad"];
                
                $res = $paciente->updatePaciente();
                if($res == 1){
                    echo json_encode ('Se actualizo exitosamente');
                }else{
                    echo json_encode ('No se guardo');
                }
                
            }

        }else {
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-admin/detallePaciente.php';
            // include $_SERVER["DOCUMENT_ROOT"].
            // '/Enfermeria/APP/models/enfermeros.php';
        }

    }

    public function error(){
        echo "error";
    }

}
new adminController();

?>
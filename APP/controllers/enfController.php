<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/APP/models/enfermeros.php';

class enfController {

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

    public function consultaP(){

        $res = enfermeros::pacienteC();
        if($res != null){ 
            
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);        
        }else{
            echo json_encode('nada');        

        }
    }

    public function addNotas(){
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        if (isset($_POST["addnotas"])){

            if($_POST['fecha'] === '' || $_POST['notasEnfermeria']=== '')
            {
                echo json_encode('error0');
            }else{
                $nombreP = $_POST["lista"];
                $fechaP = $_POST["fecha"];
                $enfermeroN= enfermeros::validarPaciente($nombreP, $fechaP);
                if($enfermeroN != null && $enfermeroN->num_rows > 0){
                echo json_encode('error1');
                }else{
                    $enfermeriN = new enfermeros();
                    $enfermeriN->nombreP = $_POST["lista"];
                    $enfermeriN->turnoP = $_POST["turno"];
                    $enfermeriN->fechaP = $_POST["fecha"];
                    $enfermeriN->usuarioId = $_POST["usuarioId"];
                    $enfermeriN->firma = $_POST["firma"];
                    $enfermeriN->notaF = $_POST["notasEnfermeria"];
        
                    $enfermeriN->horasv = $_POST["horaSv"];
                    $enfermeriN->tiposv = $_POST["tipoSV"];
                    $enfermeriN->descsv = $_POST["descripSv"];
                    
                    $enfermeriN->horablla = $_POST["horaBLLA"];
                    $enfermeriN->tipoblla = $_POST["tipoBLLA"];
                    $enfermeriN->descblla = $_POST["descripBLLA"];
                    
                    $enfermeriN->horale = $_POST["horaliquidoE"];
                    $enfermeriN->tipole = $_POST["tipoliquidoE"];
                    $enfermeriN->descle = $_POST["descripliquidoE"];
                    
                    $enfermeriN->horamP = $_POST["horaMedicamentos"];
                    $enfermeriN->medicP = $_POST["medica"];
                    $enfermeriN->viaP = $_POST["via"];
                    $enfermeriN->dosisP = $_POST["dosis"];
                    
                    
                    $res = $enfermeriN->addNotasPaciente();
                    if($res == 1){
                        echo json_encode ('Se guardo exitosamente');
                    }else{
                        echo json_encode ('No se guardo');
                    }
                }
            }

        }else {
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-usuario/paciente.php';
            // include $_SERVER["DOCUMENT_ROOT"].
            // '/Enfermeria/APP/models/enfermeros.php';
        }

    }

    public function getNovedades(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
        $vistaCNovedades = enfermeros::getNovedad($id);
        
    
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-usuario/novedad.php';
        
    }

    public function vistaNovedades(){
        $id = $_SESSION["user"]["id"];
        $res = enfermeros::getNovedad($id);
        if($res != null ){ 
                
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);   

        }else{
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/panel-usuario/novedad.php';
        }
    }


    public function vistaUpdateNovedades(){

        if(isset($_POST["actualizarNovedad"]))
        {
            $enfermeriN = new enfermeros();


            $enfermeriN->idNovedad = $_POST["idNovedad"];
            $enfermeriN->novedadId = $_POST["novedadId"];
            
            $enfermeriN->notaF = $_POST["notasEnfermeria"];

            $enfermeriN->horasv = $_POST["horaSv"];
            $enfermeriN->tiposv = $_POST["tipoSV"];
            $enfermeriN->descsv = $_POST["descripSv"];
            
            $enfermeriN->horablla = $_POST["horaBLLA"];
            $enfermeriN->tipoblla = $_POST["tipoBLLA"];
            $enfermeriN->descblla = $_POST["descripBLLA"];
            
            $enfermeriN->horale = $_POST["horaliquidoE"];
            $enfermeriN->tipole = $_POST["tipoliquidoE"];
            $enfermeriN->descle = $_POST["descripliquidoE"];
            
            $enfermeriN->horamP = $_POST["horaMedicamentos"];
            $enfermeriN->medicP = $_POST["medica"];
            $enfermeriN->viaP = $_POST["via"];
            $enfermeriN->dosisP = $_POST["dosis"];

            $res = $enfermeriN->updateNovedad();
            if($res == 1){
                echo json_encode ('Se guardo exitosamente');
            }else{
                echo json_encode ('No se guardo');
            }

        }else {
            $id = (isset($_GET["idNovedad"])) ? $_GET["idNovedad"] : 0;
            
            $res =  enfermeros::consultaUpdateNovedad($id);
            $res1 = enfermeros::consultaUpdateSignosv($id);
            $res2 = enfermeros::consultaUpdateBalancella($id);
            $res3 = enfermeros::consultaUpdateLiquidoe($id);
            $res4 = enfermeros::consultaUpdatemedicacion($id);
            
            if($res != null &&  $res1 != null &&  $res2 != null &&  $res3 != null &&  $res4 != null){ 
                    
                $detalles   = $res->fetch_all()[0];
                $Signosv    = $res1->fetch_all();
                $Balancella = $res2->fetch_all();
                $Liquidoe   = $res3->fetch_all();
                $medicacion = $res4->fetch_all();
                
                include $_SERVER["DOCUMENT_ROOT"] . 
                '/PUBLIC/views/panel-usuario/vistaNovedad.php';
            }else{
                $msg = "no existe registro";
    
                include $_SERVER["DOCUMENT_ROOT"] . 
                '/PUBLIC/views/panel-usuario/vistaNovedad.php';
            }            
        }
    }

    public function error(){
         include $_SERVER["DOCUMENT_ROOT"].
         '/APP/controllers/enfController.php';
    }
}
new enfController();
?>


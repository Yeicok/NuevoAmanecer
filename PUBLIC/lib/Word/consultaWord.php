<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;
$templateWord = new TemplateProcessor('plantillaWord/plantilla.docx');
require_once $_SERVER["DOCUMENT_ROOT"].'/APP/models/administrador.php'; 
        //ID 
        $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
        //Se consulta por ID
        $res =  administrador::consultaNovedad($id);
        $res1 = administrador::consultaSignosv($id);
        $res2 = administrador::consultaBalancella($id);
        $res3 = administrador::consultaLiquidoe($id);
        $res4 = administrador::consultaMedicacion($id);

if ($res != null || $res1 != null || $res2 != null || $res3 != null || $res4 != null) {
     
   $detalles   = $res->fetch_all()[0];
   $Signosv    = $res1->fetch_all();
   // $Balancella = $res2->fetch_all();
   // $Liquidoe   = $res3->fetch_all();
   // $medicacion = $res4->fetch_all();
   
        $nombre =$detalles[13]; 
        $turno  =$detalles[8];
        $fecha =$detalles[9];
        $nota   =$detalles[11];
        
// --- Recorer array de signos vitales      
$datosS= array();
for( $i = 0;  $i < count ($Signosv);  $i++){ 

   $s['horaS'] =$Signosv[$i][21];
   $s['tipoS'] =$Signosv[$i][20];
   $s['descripcionS'] =$Signosv[$i][22];
   
      $datosS[]= $s;     
}
// echo'<pre>';
// print_r($datos);

// --- Recorer array de balance      
$datosB= array();
for( $j = 0;  $j < count ($Balancella);  $j++){ 

   $b['horaB'] =$Balancella[$j][21];
   $b['tipoB'] =$Balancella[$j][20];
   $b['descripcionB'] =$Balancella[$j][22];
   
      $datosB[]= $b;     
}
// echo'<pre>';
// print_r($datos);

// --- Recorer array de Liquidoe      
$datosL= array();
for( $fila = 0;  $fila < count ($Liquidoe);  $fila++){ 

   $L['horaL'] =$Liquidoe[$fila][21];
   $L['tipoL'] =$Liquidoe[$fila][20];
   $L['descripcionL'] =$Liquidoe[$fila][22];
   
      $datosL[]= $L;     
}
// echo'<pre>';
// print_r($datos);

// --- Recorer array de medicacion      
$datosM= array();
for( $columna = 0;  $columna < count ($medicacion);  $columna++){ 

   $M['horaM'] =$medicacion[$columna][20];
   $M['medicacionM'] =$medicacion[$columna][21];
   $M['viaM'] =$medicacion[$columna][22];
   $M['dosisM'] =$medicacion[$columna][23];
   
      $datosM[]= $M;     
}
// echo'<pre>';
// print_r($datos);


 
}else {
    echo "Error with SQL";
}


// salto de linea en un textarea
$nota = preg_replace('~\R~u', '</w:t><w:br/><w:t>', $nota);


        
// --- Asignamos valores a la plantilla 
$templateWord->setValue('nombres',$nombre);
$templateWord->setValue('turnos',$turno);
$templateWord->setValue('fechas',$fecha);
$templateWord->setValue('notas',$nota);
$templateWord->cloneRowAndSetValues('horaS', $datosS);
$templateWord->cloneRowAndSetValues('horaB', $datosB);
$templateWord->cloneRowAndSetValues('horaL', $datosL);
$templateWord->cloneRowAndSetValues('horaM', $datosM);


// --- Guardamos el documento
$templateWord->saveAs('UnNuevoAmanecer.docx');

header("Content-Disposition: attachment; filename=UnNuevoAmanecer-$nombre.docx; charset=iso-8859-1");
echo file_get_contents('UnNuevoAmanecer.docx');

// --- borramos el fichero
unlink('/PUBLIC/lib/Word/UnNuevoAmanecer.docx');
        
?>
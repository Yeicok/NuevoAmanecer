<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;
$templateWord = new TemplateProcessor('plantillaWord/plantilla2.docx');
 
$nombre         =$_POST['nombre'];
$cargo          =$_POST['cargoperfil'];
$fechas         =$_POST['fechas'];
$perfil         =$_POST['perfil'];
$estudio        =$_POST['estudio']; 
$titulo         =$_POST['titulo'];
$terminacion    =$_POST['terminacion'];    
$metodologias   =$_POST['meto'];
$programaciones =$_POST['pro'];
$basedatos      =$_POST['bd'];
$herramientas   =$_POST['her'];
$empresa        =$_POST["empresa"];
$cargos         =$_POST["cargo"];
$fechai         =$_POST["fechai"];
$fechar         =$_POST["fechar"];
$funcion        =$_POST["funcion"];
$proyecto       =$_POST["proyecto"];

// salto de linea en un textarea
$perfil    = preg_replace('~\R~u', '</w:t><w:br/><w:t>', $perfil);
$funcion = preg_replace('~\R~u', '</w:t><w:br/><w:t>', $funcion);
$proyecto = preg_replace('~\R~u', '</w:t><w:br/><w:t>', $proyecto);

//--- Recorer array de estudio
$datos= array();
for( $i = 0;  $i < count ($estudio);  $i++){ 

   $d['estudio'] =$estudio[$i];
   $d['titulo'] =$titulo[$i];
   $d['terminacion'] =$terminacion[$i];
   
      $datos[]= $d;     
}

$laboral= array();
for( $fila = 0;  $fila < count ($empresa);  $fila++){ 
   $contador = $fila+1;
   $l['id']       =$contador;
   $l['empresa']  =$empresa[$fila];
   $l['cargo']    =$cargos[$fila];
   $l['fechai']   =$fechai[$fila];
   $l['fechar']   =$fechar[$fila];
   $l['funcion']  =$funcion[$fila];
   $l['proyecto'] =$proyecto[$fila];

      $laboral[]= $l;     
}

// echo'<pre>';
// print_r($laboral);
        
// --- Asignamos valores a la plantilla 
$templateWord->setValue('nombre_completo',$nombre);
$templateWord->setValue('cargo_completo',$cargo);
$templateWord->setValue('fecha',$fechas);
$templateWord->setValue('perfiles',$perfil);
$templateWord->cloneRowAndSetValues('estudio', $datos);
$templateWord->setValue('metodologia',$metodologias);
$templateWord->setValue('programacion',$programaciones);
$templateWord->setValue('basededato',$basedatos);
$templateWord->setValue('herramienta',$herramientas);
$templateWord->cloneRowAndSetValues('id', $laboral);

// --- Guardamos el documento
$templateWord->saveAs('HVq-vision.docx');

header("Content-Disposition: attachment; filename=HVq-vision-$nombre.docx; charset=iso-8859-1");
echo file_get_contents('HVq-vision.docx');

// --- borramos el fichero
unlink('C:/xampp/htdocs/HojaVida/PUBLIC/lib/Word/HVq-vision.docx');
        
?>
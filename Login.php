  
<?php 
  header('Access-Control-Allow-Origin: http://localhost:4200/'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  
  require("conexiones.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  $conexion = conexion(); // CREA LA CONEXION
  
  // REALIZA LA QUERY A LA DB
  $resultado = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$params->usuario' AND clave='$params->clave'");
 
    class Result {}
    
    // GENERA LOS DATOS DE RESPUESTA
    $response = new Result();
    
    if($resultado->num_rows > 0) {
        $response->resultado = 'OK';
        $response->mensaje = 'LOGIN EXITOSO';
    } else {
        $response->resultado = 'FAIL';
        $response->mensaje = 'LOGIN FALLIDO';
    }
    
    header('Content-Type: application/json');
    
    echo json_encode($response); // MUESTRA EL JSON GENERADO
    
?>
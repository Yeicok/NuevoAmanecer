<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$nombre  = trim($request->nombre);
$clave   = mysqli_real_escape_string($mysqli, trim($request->clave));
$usuario = mysqli_real_escape_string($mysqli, trim($request->usuario));
$sql = "INSERT INTO usuario(nombre,clave,usuario) VALUES ('$nombre','$clave','$usuario')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [
'nombre' =>  $nombre,
'clave' =>   $clave,
'usuario' => $usuario,
'idUsuario' => mysqli_insert_id($mysqli)
];
echo json_encode($authdata);
}
}

?>
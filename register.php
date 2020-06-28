<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$name = trim($request->nombre);
$pwd = mysqli_real_escape_string($mysqli, trim($request->clave));
$email = mysqli_real_escape_string($mysqli, trim($request->usuario));
$sql = "INSERT INTO usuario(nombre,clave,usuario) VALUES ('$nombre','$clave','$usuario')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [
'nombre' => $name,
'clave' => '',
'usuario' => $email,
'idUsuario' => mysqli_insert_id($mysqli)
];
echo json_encode($authdata);
}
}

?>
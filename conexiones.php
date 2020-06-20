<?php

// DATOS DE CONEXION A LA BASE DE DATOS
function conexiones() {
  $conexion = mysqli_connect("us-cdbr-east-05.cleardb.net", "b5b7f186c80536", "ab3e2655", "heroku_ab9537817b7d7dc");
  
  return $conexion;
}

?>
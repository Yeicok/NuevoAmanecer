<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        $usuario = $_SESSION["user"];  
        if($usuario == null || $usuario = ''){
           header("Location: /PUBLIC/views/login.php");
        }else{
          $_SESSION["user"];
        } 
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Enfermeria</title>
  <link href="/PUBLIC/img/favicon.ico" rel="shortcut icon" />

  <!-- Custom fonts for this template-->
  <link href="/PUBLIC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link  href="/PUBLIC/css/sb-admin-2.min.css" rel="stylesheet" />
  <link  href="/PUBLIC/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  <link  href="/PUBLIC/estilos/forma.css" rel="stylesheet" />

</head>
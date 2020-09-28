<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/APP/models/usuarios.php';

class userController  { 

    public function __construct(){
        SESSION_START();
  
        $action = isset($_GET["action"]) ? $_GET["action"] : "all";
  
              if(method_exists($this, $action)) {
                  $this->$action();
              }else{
                  $this->error();
              }
    }


    public function login(){
        if(isset($_POST["login"])){
            $email = $_POST["user"];
            $password = $_POST["pass"];

            $rs = usuarios::login($email, $password);

            if($rs != null && $rs->num_rows > 0){
                
                $_SESSION["user"] = $rs->fetch_assoc();

                    if($_SESSION["user"]["tipo"] == "admin"){

                        $_SESSION["login"] = true;
                        include $_SERVER["DOCUMENT_ROOT"].
                        '/PUBLIC/views/panel-admin/admin.php';    
  
                    }elseif($_SESSION["user"]["tipo"] == "usuario"){

                        $_SESSION["login"] = true;
                        include $_SERVER["DOCUMENT_ROOT"].
                        '/PUBLIC/views/panel-usuario/usuario.php';    
                    }

            }else{
                session_destroy();
                $_SESSION["login"] = false;
                $_SESSION["msg"] = "Credenciales invalidas en usuario o clave";
                                
                include $_SERVER["DOCUMENT_ROOT"].
                '/PUBLIC/views/login.php';          
            }   
            
        }else{
            include $_SERVER["DOCUMENT_ROOT"].
            '/PUBLIC/views/login.php';
        }
    }

    public function cambiarClave(){
        if(isset($_SESSION["user"])) { // comprobamos que la sesión esté iniciada
          if(isset($_POST['cambiarClaves'])) {
            if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
              echo json_encode('error');
             }else {
              $usuario = new usuarios();
    
              $usuario->usuario   = $_SESSION["user"]["usuario"];
              $usuario->clave     = $_POST["usuario_clave"];
  
              $res = $usuario->modificarClave();
       
              if($res == 1){
                echo json_encode('Se modifico correctamente');
              }else{
                echo json_encode('No se modifico correctamente');
              }
  
             }
             }else {
              include $_SERVER["DOCUMENT_ROOT"].'/PUBLIC/views/panel-admin/perfil.php';
            }  
         }else {
          echo json_encode('Acceso denegado.');
       }
    }

    public function error(){
        include $_SERVER["DOCUMENT_ROOT"].
        '/PUBLIC/views/404.php';
    }

    public function logout(){
        session_unset();
        $this->login();
    }

}
new userController();
?>
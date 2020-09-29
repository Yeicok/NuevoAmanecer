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
  <link href="/PUBLIC/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="/PUBLIC/estilos/login.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

  <div class="container">
    <div class="Login-from col-md-4 offset-md-4">
                <div class="p-5">
                  <div class="text-center">
                  <hr>
                  <img src="/PUBLIC/img/icon.jpeg" width="170" height="170">
                  <hr>
                  </div>
                  <form  action="/APP/controllers/userController.php?action=login"  method="post">
                    
                    <input type="hidden" name="login">

                    <?php
                        if(isset($_SESSION["login"])&& !$_SESSION["login"]){
                            echo "<div class='alert alert-danger' id='success-alert'  role='alert'>
                            " .$_SESSION["msg"]. "
                            </div>";
                        }
                      ?>

                    <div class="form-group">
                      <input type="text" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresar usuarios...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control form-control-user" id="pass" placeholder="Ingresar clave...">
                    </div>
                    <div class="form-group custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="mostrarContrasena()">
                      <label class="custom-control-label" for="customSwitch1">Mostrar clave</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  

                </div>
    </div>

      

    

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/PUBLIC/vendor/jquery/jquery.min.js"></script>
  <script src="/PUBLIC/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/PUBLIC/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/PUBLIC/js/sb-admin-2.min.js"></script>

  <script> 
      function mostrarContrasena(){
          var tipo = document.getElementById("pass");
          if(tipo.type == "password"){
              tipo.type = "text";
          }else{
              tipo.type = "password";
          }
      }
    </script>
        <script> 
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
              $("#success-alert").slideUp(500);
        });
      </script>

</body>

</html>
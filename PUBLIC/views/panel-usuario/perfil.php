<!-- head-->
<?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-usuario/menu-lateral.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
            <div id="content">
                 <!-- Navbar-->    
                 <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-usuario/menu-superior.php'; ?>
                 
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h4 class="mt-4">Perfil</h4>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/admin.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>

                    <div class="jumbotron">
                        <div class="row justify-content-md-center">
                            <div class="card">
                                <div class="card-body">
                                    <form id="cambiarClave">
                                        <input type="hidden" name="cambiarClaves">

                                        <div class="mt-3" id="respuesta"></div>
                                                                                    
                                        <div class="form-group">
                                                <label for="pass">Nueva Clave:</label>
                                                    <div class="input-group-prepend">
                                                        <input type="password" class="form-control" name="usuario_clave" id="pass"aria-describedby="Password" placeholder="Ingrese su Clave" aria-describedby="btnGroupAddon"  required>
                                                    </div>
                                                <small id="pass" class="form-text text-muted">Aqui ingresará su Clave</small>
                                        </div>
                                                
                                        <div class="form-group">
                                                <label for="passw">Confirmar Clave:</label>
                                                    <div class="input-group-prepend">
                                                    <input type="password" class="form-control" name="usuario_clave_conf" id="passw"aria-describedby="Password" placeholder="Ingrese su Clave" aria-describedby="btnGroupAddon"  required>
                                                    </div>
                                                <small id="passw" class="form-text text-muted">Aqui ingresará su Clave</small>
                                            </div>
                                            <a href="#" class="badge badge-info" onclick="mostrarContrasena()">Mostrar</a>

                                        </div>

                                        <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
                                        <div  id="load" hidden>
                                            <div class="text-center">
                                                <div class="spinner-border text-secondary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                <div class="col-xs-12 center text-accent">
                                                    <span>Validando información...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin load -->
                                        <button class= "btn btn-primary btn-lg btn-block" type="submit"  id="btnCambiarClave">Actualizar</button>
                                    </from>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

            </div>
                <!-- End of Main Content -->
        </div>
            <!-- End of Content Wrapper -->

    </div>
        <!-- End of Page Wrapper -->

<!-- script-->
<?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/script.php'; ?>

<script> 
      function mostrarContrasena(){
          var idclave1 ="pass";
          var idclave2 ="passw";
          var tipo = document.getElementById(idclave1);
          var tipos = document.getElementById(idclave2);
          if(tipo.type == "password"){
              tipo.type = "text";
          }else{
              tipo.type = "password";
          }
          if(tipos.type == "password"){
              tipos.type = "text";
          }else{
              tipos.type = "password";
          }
      }
    </script>
</body>
<!-- head-->
<?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/heads.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-admin/menu-lateral.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
             <!-- Main Content -->
            <div id="content">
                
                <!-- Navbar-->    
                <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-admin/menu-superior.php'; ?>
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h2 class="mt-4">Enfermeria</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/admin.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Enfermeria</li>
                    </ol>
                
                    <div class="container ">
                    
                        <div class="row justify-content-md-center">
                            <div class="card"  style="width: 65rem;" >
                                <div class="card-body"> 
                                <form  method="post" class="needs-validation" id="crearEnfermero" novalidate>
                                    
                                    <input type="hidden" name="crearEnfermero" value="crearEnfermero">

                                    <div class="mt-3" id="respuesta"></div>

                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label for="validationCustom01">Usuario</label>
                                            <input type="text" class="form-control" name="usuario" id="validationCustom01" required>
                                            <div class="valid-feedback">
                                                Se ve bien!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Clave</label>
                                            <div class="input-group-prepend">
                                            <input type="password" class="form-control" name="clave" id="validationCustom02"  required>
                                            <button class="btn-primary" type="button"  onclick="mostrarContrasena()"><i class='fas fa-eye'></i></button>
                                            </div>
                                            <div class="valid-feedback">
                                                Se ve bien!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom3">Clave</label>
                                            <div class="input-group-prepend">
                                            <input type="password" class="form-control" name="clave1" id="validationCustom3"  required>
                                            <button class="btn-primary" type="button"  onclick="mostrarContrasena1()"><i class='fas fa-eye'></i></button>
                                            </div>
                                            <div class="valid-feedback">
                                                Se ve bien!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label for="validationCustom04">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="validationCustom04" required>
                                            <div class="valid-feedback">
                                                Se ve bien!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Rol</label>
                                            <div class="input-group-prepend">
                                                <select class="custom-select" name="rol"  id="validationCustom05" required>
                                                    <option value="2"> enfermero</option>
                                                </select>                        
                                            </div>
                                            <div class="valid-feedback">
                                                Se ve bien!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>.</label>
                                            <div class="input-group-prepend">
                                            <input type="submit" id="btnCrearEnfermero" class="btn btn-primary btn-lg"  value="Crear enfermero" /></br></br>

                                            </div>
                                        </div>
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

                                </form>
                                </div>
                            </div>    
                        </div></br>

                        <div class="row justify-content-md-center">
                            <div class="card "  style="width: 45rem;">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-hover"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">Codigo</th>
                                                    <th width="10%">Usuario</th>
                                                    <th width="80%">Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody">   
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Codigo</th>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
        <script src="/PUBLIC/js/funciones/tablas/tablaEnfermeria.js" language="Javascript"> </script>
        <script src="/PUBLIC/js/funciones/claves.js" language="Javascript"> </script>
</body>
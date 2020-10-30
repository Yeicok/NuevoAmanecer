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

                    <h2 class="mt-4">Detalles de Pacientes</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/paciente.php">Pacientes</a></li>
                        <li class="breadcrumb-item active">Detalle Pacientes</li>
                    </ol>
                    
                    <div class="container">
                        <div class="row justify-content-md-center">
                                <div class="card"  style="width: 45rem;" >
                                    <div class="card-body"> 
                                        <form  method="post" class="needs-validation" id="updatePaciente" novalidate>
                                            
                                            <input type="hidden" name="updatePaciente" value="updatePaciente">
                                            <input type="hidden" name="idPaciente" value="<?= $detalles[0] ?>">

                                            <div class="mt-3" id="respuesta"></div>

                                            <div class="form-row">
                                                <div class="col-md-5 mb-3">
                                                    <label for="validationCustom01">Nombre Paciente</label>
                                                    <input type="text" class="form-control" name="nombreP" value="<?= $detalles[1] ?>" id="validationCustom01" required>
                                                    <div class="valid-feedback">
                                                        Se ve bien!
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom02">Edad</label>
                                                    <div class="input-group-prepend">
                                                    <input type="text" class="form-control" name="edad" value="<?= $detalles[2] ?>" id="validationCustom02"  required>
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Se ve bien!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom03">DX</label>
                                                    <div class="input-group-prepend">
                                                    <input type="text" class="form-control" name="dx" value="<?= $detalles[3] ?>" id="validationCustom03"  >
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Se ve bien!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationCustom04">Cedula</label>
                                                    <input type="text" class="form-control" name="cedula" value="<?= $detalles[4] ?>" id="validationCustom04" required>
                                                    <div class="valid-feedback">
                                                        Se ve bien!
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="validationCustom05">Entidad</label>
                                                    <div class="input-group-prepend">
                                                    <input type="text" class="form-control" name="entidad" value="<?= $detalles[5] ?>" id="validationCustom05"  >
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Se ve bien!
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="fechas">Fecha de nacimiento</label>
                                                    <div class="input-group-prepend">
                                                     <input type="date" class="form-control" name="fecha" value="<?= $detalles[6] ?>" id="fechas" >
                                                    </div>
                                                </div>
                                                        <input type="submit" id="btnUpdatePacientes" class="btn btn-primary btn-lg"  value="Actualizar" /></br></br>
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
      <script src="/PUBLIC/js/funciones/tablas/tablaPacientes.js"></script>
</body>
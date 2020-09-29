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

                    <h2 class="mt-4">Novedades</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/admin.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Novedades</li>
                    </ol>


                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="card"  style="width: 45rem;" >
                                <div class="card-body"> 
                                    <form  name="formu" action="/APP/controllers/adminController.php?action=DetallePaciente" method="post">
                                        <div class="input-group mb-3">
                                                <select class="custom-select custom-select-lg mb-3" name="lista" onchange="cual()" id="inputGroupSelect01" required>
                                                
                                                </select>
                                        </div>
                                        <input type="hidden" class="form-control" name="NombrePaciente">
                                        <input type="submit" class="btn btn-primary btn-lg" id="consultar" value="Consultar" /></br></br>

                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-hover"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">Codigo</th>
                                                    <th width="20%">Paciente</th>
                                                    <th width="10%">Turno</th>
                                                    <th width="15%">Fecha</th>
                                                    <th width="35%">Notas</th>
                                                    <th width="10%">Enfermero</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody">   

                                                <?php 
                                                        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                                                foreach($res as $data){?>
                                                        <tr>
                                            
                                                            <td><a class='btn btn-light' target="_blank" href='/Enfermeria/APP/controllers/adminController.php?action=DetallePacientes&id=<?php echo $data['idNovedad'];?>'><i class='far fa-eye'></i></a></td>
                                                            <td><?php echo $data['idNovedad'];?></td>
                                                            <td><?php echo $data['nombreP']  ;?></td>
                                                            <td><?php echo $data['turno']    ;?></td>
                                                            <td><?php echo $data['fecha']    ;?></td>
                                                            <td><?php echo $data['novedad']  ;?></td>
                                                            <td><?php echo $data['nombre']  ;?></td>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Codigo</th>
                                                    <th>Paciente</th>
                                                    <th>Turno</th>
                                                    <th>Fecha</th>
                                                    <th>Notas</th>
                                                    <th>Enfermero</th>
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
    <script src="/PUBLIC/js/funciones/tablas/tablaDetallePaciente.js"></script>
    <script src="/PUBLIC/js/funciones/paciente.js"></script>
</body>
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

                    <h2 class="mt-4">Detalles de Enfermeria</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/enfermeria.php">Enfermeria</a></li>
                        <li class="breadcrumb-item active">Detalle Enfermeria</li>
                    </ol>
                    <div class="row justify-content-md-center">
                            <div class="card"  style="width: 50rem;" >
                                <div class="card-header text-center">
                                    Novedad x Enfermero
                                </div>
                                <div class="card-body"> 
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
                                                    <th width="5%">Enfermero</th>
                                                    <th width="5%">Imprimir</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody">   
                                        <?php foreach($res as $data){?>
                                            <tr>
                                                <td><a class='btn btn-light' target='_blank' href='/APP/controllers/adminController.php?action=detalleEnfermerias&id=<?php echo $data['idNovedad'];?>'><i class='far fa-eye'></i></a></td>
                                                <td><?php echo $data['idNovedad'];?></td>
                                                <td><?php echo $data['nombreP']  ;?></td>
                                                <td><?php echo $data['turno']    ;?></td>
                                                <td><?php echo $data['fecha']    ;?></td>
                                                <td><?php echo $data['novedad']  ;?></td>
                                                <td><?php echo $data['nombre']  ;?></td>
                                                <td><a class='nav-link' href=''><div class='sb-nav-link-icons'><i class='fas fa-file-word'></i></div></a></td>
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
                                                    <th>Imprimir</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
            
                                </div>
                            </div>
                    </div></br></br>
                </div>

            </div>
                <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

      <!-- script-->
      <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/script.php'; ?>
      <script src="/PUBLIC/js/funciones/tablas/tablaDetalleEnfermerias.js" language="Javascript"> </script>




</body>
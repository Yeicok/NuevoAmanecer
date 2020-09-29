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
                    <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-usuario/menu-superior.php'; ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h3 class="mt-4">Novedad x Enfermero</h3>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-admin/enfermeria.php">Enfermeria</a></li>
                        <li class="breadcrumb-item active">Novedad x Enfermero</li>
                    </ol>

                    <div class="card" >
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label  class="font-weight-bold" >Nombre del paciente</label>
                                    <p><?= $detalles[13] ?></p>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-bold" >Turno</label>
                                    <p ><?= $detalles[8] ?><p>
                                </div>
                                <div class="form-group col-md-3">
                                    <label  class="font-weight-bold" >Fecha</label>
                                    <p ><?= $detalles[9] ?><p>
                                </div>
                            </div>
                        </div>
                    </div></br>
                    
                    <div class="card" >
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">
                                    NOTAS DE ENFERMERIA
                                </label>
                                <p class="text-break"><?= $detalles[11] ?></p>
                            </div>
                        </div>
                    </div></br>
                    
                    <div class="card" >
                        <div class="card-body">
                            <div class="form-group">

                                <label class="font-weight-bold">
                                SIGNOS  VITALES
                                </label>
                                <div class="table-responsive-sm">
                                    <table class='table table-bordered table-hover' id="tablaSignosV">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                        
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Signosv); ++$i) { ?>
                                    <tr>
                                        <td><?= $Signosv[$i][21] ?></td>
                                        <td> <?= $Signosv[$i][20] ?></td>
                                        <td><?= $Signosv[$i][22] ?></td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

                                </div>
                            </div>
                        </div>
                    </div></br>
                    
                    <div class="card" >
                        <div class="card-body">
                            <div class="form-group">

                                <label class="font-weight-bold">
                                BALANCE LIQUIDOS  -  LIQUIDOS ADMINISTRADOS
                                </label>
                                <div class="table-responsive-sm">
                                    <table class='table table-bordered table-hover' id="tablaBalanceLLA">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Balancella); ++$i) { ?>
                                    <tr>
                                        <td><?= $Balancella[$i][21] ?> </td>
                                        <td> <?= $Balancella[$i][20] ?> </td>
                                        <td><?= $Balancella[$i][22] ?></td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 
                                </div>
                            </div>
                        </div>
                    </div></br>
                    
                    <div class="card" >
                        <div class="card-body">
                            <div class="form-group">

                                <label class="font-weight-bold">
                                LIQUIDOS  ELIMINADOS
                                </label>
                                <div class="table-responsive-sm">
                                    <table class='table table-bordered table-hover' id="tablaLiquidoE">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Liquidoe); ++$i) { ?>
                                    <tr>
                                        <td><?= $Liquidoe[$i][21] ?> </td>
                                        <td><?= $Liquidoe[$i][20] ?>  </td>                                                    
                                        <td><?= $Liquidoe[$i][22] ?></td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

                                </div>
                            </div>
                        </div>
                    </div></br>
                    
                    <div class="card" >
                        <div class="card-body">
                            <div class="form-group">

                                <label class="font-weight-bold">
                                MEDICACION
                                </label>
                                <div class="table-responsive-sm">
                                    <table class='table table-bordered table-hover' id="tablaMedicamentos">
                                    <tr>
                                        <th>HORA</th>
                                        <th>MEDICAMENTO</th>
                                        <th>VIA</th>
                                        <th>DOSIS</th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($medicacion); ++$i) { ?>
                                    <tr>
                                        <td><?= $medicacion[$i][20] ?></td>
                                        <td><?= $medicacion[$i][21] ?></td>
                                        <td><?= $medicacion[$i][22] ?></td>
                                        <td><?= $medicacion[$i][23] ?></td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 
                                </div>
                            </div>
                        </div>
                    </div></br>


                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

     <!-- script-->
     <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/script.php'; ?>
       

</body>
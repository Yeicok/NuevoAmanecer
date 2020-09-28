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
                    <h1 class="mt-4">Novedades</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-usuario/usuario.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Novedades</li>
                    </ol><br>


                    <!-- <div class="card-body">   -->
                        <div class="table-responsive">
                            <table class="table table-hover"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th width="5%">Codigo</th>
                                        <th width="20%">Paciente</th>
                                        <th width="10%">Turno</th>
                                        <th width="15%">Fecha</th>
                                        <th width="45%">Notas</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">   
                                </tbody>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Codigo</th>
                                        <th>Paciente</th>
                                        <th>Turno</th>
                                        <th>Fecha</th>
                                        <th>Notas</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    <!-- </div> -->
                </div>
                    <!-- End Begin Page Content -->
            </div>
                <!-- End of Main Content -->
        </div>
            <!-- End of Content Wrapper -->
        

    </div>
    <!-- End of Page Wrapper -->

        <!-- script-->
        <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/script.php'; ?>
        <script src="/PUBLIC/js/funciones/tablas/tablaNovedad.js"></script>

</body>
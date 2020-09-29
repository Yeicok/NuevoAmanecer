<!-- head-->
<?php include $_SERVER["DOCUMENT_ROOT"].'./PUBLIC/views/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <?php include $_SERVER["DOCUMENT_ROOT"].'/PUBLIC/views/panel-admin/menu-lateral.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Navbar-->    
                <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/panel-admin/menu-superior.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="mt-4">Inicio</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>

                    <div class="jumbotron">
                        <h1>Bienvenido <?= $_SESSION["user"]["usuario"] ?></h1>
                        <p>
                            
                        </p>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
        <!-- End of Page Wrapper -->

        <!-- script-->
        <?php include $_SERVER["DOCUMENT_ROOT"].'./PUBLIC/views/script.php'; ?>
    
</body>
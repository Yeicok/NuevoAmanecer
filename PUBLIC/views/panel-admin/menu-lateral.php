<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        $usuario = $_SESSION["user"];  
        if($usuario == null || $usuario = ''){
           header("Location: /PUBLIC/views/login.php");
        }else{
          $_SESSION["user"];
        } 
    } 

    $pathNovedad = "/APP/controllers/adminController.php";
    $pathNovedades = "$pathNovedad?action=getEnfermeria&rol=2";

?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
             <img src="/Enfermeria/PUBLIC/img/icon.jpeg" width="65" height="68">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/Enfermeria/PUBLIC/views/panel-admin/admin.php">
          <div class="sb-nav-link-icon">
              <i class="fas fa-home"></i>
              <span>Inicio</span>
          </div>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Accion
      </div>

      <!-- Nav Item - Novedades -->
      <li class="nav-item">
      <?php echo"<a class='nav-link' href='$pathNovedades'>"; ?>
          <i class="fas fa-briefcase-medical"></i>
          <span>Enfermeria</span></a>
      </li>

      <!-- Nav Item - Novedades -->
      <li class="nav-item">
          <a class='nav-link' href='/PUBLIC/views/panel-admin/paciente.php'>
          <i class="fas fa-procedures"></i>
          <span>Pacientes</span></a>
      </li>

      <li class="nav-item">
          <a class='nav-link' href='/PUBLIC/views/panel-admin/novedades.php'>
          <i class="fas fa-notes-medical"></i>
          <span>Novedades x Paciente</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
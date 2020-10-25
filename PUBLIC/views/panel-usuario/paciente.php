        <!-- head-->
    <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/heads.php'; ?>
    
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
                            <h1 class="mt-4">Pacientes</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="/PUBLIC/views/panel-usuario/usuario.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Pacientes</li>
                            </ol><br>

                            <form id="formu" name="formu" method="post" class="needs-validation" novalidate>
                                <input type="hidden" name="addnotas" value="addnotas">
                                <input type="hidden" name="usuarioId" value="<?= $_SESSION["user"]["id"] ?>" >
                                <input type="hidden" name="firma" value="<?= $_SESSION["user"]["usuario"] ?>" >

                                
                                <div class="container">
                                       <div class="mt-3" id="respuesta"></div>
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="input-group mb-3">
                                                <select class="custom-select custom-select-lg mb-3" name="lista" onchange="cual()" id="inputGroupSelect01" required>
                                                
                                                </select>
                                                <div class="invalid-feedback">
                                                    Selecione paciente!
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <fieldset disabled>
                                                <label for="inputEmail4">Nombre del paciente</label>
                                                <input type="text" class="form-control" name="NombrePaciente" id="inputEmail4" >
                                                </fieldset> 
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputPassword4">Turno</label>
                                            <select id="inputState" class="form-control" name="turno" required>
                                                <option selected disabled value="" >Selecciona el turno</option>
                                                <option>diurno</option>
                                                <option>noturno</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            Selecione turno!
                                            </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputEmail4">Fecha</label>
                                            <input type="date" name="fecha" class="form-control" id="inputEmail4" required>
                                            <div class="invalid-feedback">
                                            Selecione fecha!
                                            </div>
                                            </div>
                                        </div></br>

                                        <div class="form-group">

                                            <label for="tablasignosV">
                                            SIGNOS  VITALES
                                            <div class='btn btn-success' id="btnNuevoSignosV">Nuevo</div>
                                            </label>
                                            <div class="table-responsive-sm">
                                                <table class='table table-bordered table-hover' id="tablaSignosV">
                                                    <tr>
                                                        <th>HORA</th>
                                                        <th>TIPO</th>
                                                        <th>DESCRIPCION</th>
                                                        <th></th>
                                                    </tr>
                                                
                                                    <tr>
                                                            <td><input type="text" class="form-control" name="horaSv[]" value=""></td>
                                                            <td>
                                                                <select class="form-control" name="tipoSV[]" value="">
                                                                <option value=" "> </option>
                                                                <option value="TiA"> TiA</option>
                                                                <option value="F.C."> F.C.</option>
                                                                <option value="F.R"> F.R </option>
                                                                <option value="T"> T </option>
                                                                <option value="SA02"> SA02 </option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="descripSv[]"  value=""></td>
                                                        <td class="text-center">
                                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                                        </td>
                                                    </tr>

                                                </table>             
                                            </div>    

                                        </div></br>   


                                        <div class="form-group">
                                            <label for="areanotas">
                                                NOTAS DE ENFERMERIA
                                            </label>
                                                <textarea class="form-control" aria-label="With textarea" name="notasEnfermeria" id="areanotas" required></textarea>
                                                <div class="invalid-feedback">
                                                Diligencie campo!
                                            </div>
                                            
                                        </div>

                                        <div class="form-group">

                                            <label for="tablaMedicamentos">
                                            MEDICACION
                                            <div class='btn btn-success' id="btnNuevoMedicamentos">Nuevo</div>
                                            </label>
                                            <div class="table-responsive-sm">
                                                <table class='table table-bordered table-hover' id="tablaMedicamentos">
                                                    <tr>
                                                        <th>HORA</th>
                                                        <th>MEDICAMENTO</th>
                                                        <th>VIA</th>
                                                        <th>DOSIS</th>
                                                        <th></th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="horaMedicamentos[]" value=""></td>
                                                        <td><input type="text" class="form-control" name="medica[]"  value=""></td>
                                                        <td><input type="text" class="form-control" name="via[]"  value=""></td>
                                                        <td><input type="text" class="form-control" name="dosis[]"  value=""></td>
                                                        <td class="text-center">
                                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                                        </td>
                                                    </tr>

                                                </table>          
                                            </div>       

                                        </div></br>

                                        <div class="form-group">

                                            <label for="tablaBalanceLLA">
                                            BALANCE LIQUIDOS  -  LIQUIDOS ADMINISTRADOS
                                            <div class='btn btn-success' id="btnNuevoBalanceLLA">Nuevo</div>
                                            </label>
                                            <div class="table-responsive-sm">
                                                <table class='table table-bordered table-hover' id="tablaBalanceLLA">
                                                    <tr>
                                                        <th>HORA</th>
                                                        <th>TIPO</th>
                                                        <th>DESCRIPCION</th>
                                                        <th></th>
                                                    </tr>
                                    
                                                    <tr>
                                                        <td>
                                                                <select class="form-control" name="horaBLLA[]" value="">
                                                                <option value=" ">  </option>
                                                                <option value="7 - 11"> 7 - 11 </option>
                                                                <option value="11 - 3"> 11 - 3 </option>
                                                                <option value="3 - 7"> 3 - 7 </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                                <select class="form-control" name="tipoBLLA[]" value="">
                                                                <option value=" "> </option>
                                                                <option value="VIA ORAL"> VIA ORAL </option>
                                                                <option value="VIA PARENTERAL"> VIA PARENTERAL </option>
                                                                <option value="SONDAS"> SONDAS </option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="descripBLLA[]"  value=""></td>
                                                        <td class="text-center">
                                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                                        </td>
                                                    </tr>
                                                
                                                </table>                 
                                            </div>
                                        </div></br>

                                        <div class="form-group">

                                            <label for="tablaLiquidoE">
                                            LIQUIDOS  ELIMINADOS
                                            <div class='btn btn-success' id="btnNuevoLiquidoE">Nuevo</div>
                                            </label>
                                            <div class="table-responsive-sm">
                                                <table class='table table-bordered table-hover' id="tablaLiquidoE">
                                                    <tr>
                                                        <th>HORA</th>
                                                        <th>TIPO</th>
                                                        <th>DESCRIPCION</th>
                                                        <th></th>
                                                    </tr>
                                                                                                    <tr>
                                                        <td>
                                                                <select class="form-control" name="horaliquidoE[]" value="">
                                                                <option value=" ">  </option>
                                                                <option value="7 - 11"> 7 - 11 </option>
                                                                <option value="11 - 3"> 11 - 3 </option>
                                                                <option value="3 - 7"> 3 - 7 </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                                <select class="form-control" name="tipoliquidoE[]" value="">
                                                                <option value=""> </option>
                                                                <option value="ORINA"> ORINA </option>
                                                                <option value="VOMITO"> VOMITO </option>
                                                                <option value="SNG"> SNG </option>
                                                                <option value="HECES"> HECES </option>
                                                                <option value="OTROS"> OTROS </option>
                                                            </select>
                                                        </td>                                                    
                                                        <td><input type="text" class="form-control" name="descripliquidoE[]"  value=""></td>
                                                        <td class="text-center">
                                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                                        </td>
                                                    </tr>
                                                
                                                </table>         
                                            </div>        

                                        </div></br>    
                                    

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

                                        <input type="submit" class="btn btn-primary" id="btnGuardarPacientes" onclick="this.form.id='GuardarPacientes'" value="Guardar" /></br></br>
                                        <!-- <input type="submit" class="btn btn-primary"  onclick="this.form.action='/Enfermeria/APP/controllers/enfController.php?action=addnotas'" value="Guardar" /> -->

                                    </div>
                            </form>
                        </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

        <!-- script-->
        <?php  include $_SERVER["DOCUMENT_ROOT"] .'/PUBLIC/views/script.php'; ?>
        <script src="/PUBLIC/js/funciones/pacientes.js"></script>


</body>
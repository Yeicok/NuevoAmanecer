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
                        <h1 class="mt-4">Detalles de Novedades</h1>

                        <form id="updateNovedad">

                            <input type="hidden" name="actualizarNovedad" value="actualizarNovedad">
                            <input type="hidden" name="idNovedad" value="<?= $detalles[4] ?>">
                            <input type="hidden" name="novedadId" value="<?= $detalles[4] ?>">

                                                    
                          <div class="card" >
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <fieldset disabled>
                                        <label for="inputEmail4">Nombre del paciente</label>
                                        <input type="text" class="form-control" name="NombrePaciente" value="<?= $detalles[13] ?>" id="inputEmail4" >
                                        </fieldset> 
                                    </div>
                                    <div class="form-group col-md-3">
                                        <fieldset disabled> 
                                        <label for="inputPassword4">Turno</label>
                                        <select id="inputState" class="form-control" name="turno"  >
                                            <option selected  value="" ><?= $detalles[8] ?></option>
                                            <option>diurno</option>
                                            <option>noturno</option>
                                        </select>
                                        </fieldset>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <fieldset disabled>
                                        <label for="inputEmail4">Fecha</label>
                                        <input type="date" name="fecha" class="form-control" value="<?= $detalles[9] ?>" id="inputEmail4">
                                        </fieldset>
                                    </div>
                                </div></br>
                            
                                <div class="form-group">
                                    <label for="areanotas">
                                        NOTAS DE ENFERMERIA
                                    </label>
                                    <textarea class="form-control" aria-label="With textarea" name="notasEnfermeria" value="" id="areanotas"><?= $detalles[11] ?></textarea>    
                                </div>

                                
                                <div class="form-group">

                                    <label for="tablasignosV">
                                    SIGNOS  VITALES
                                    <div class='btn btn-success' id="btnNuevoSignosV">Nuevo</div>
                                    </label>
                                    <table class='table table-bordered table-hover' id="tablaSignosV">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                        <th></th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Signosv); ++$i) { ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="horaSv[]" value="<?= $Signosv[$i][21] ?>"></td>
                                        <td>
                                            <select class="form-control" name="tipoSV[]" value="">
                                                <option value=" <?= $Signosv[$i][20]?>"> <?= $Signosv[$i][20] ?> </option>
                                                <option value="TiA"> TiA</option>
                                                <option value="F.C."> F.C.</option>
                                                <option value="F.R"> F.R </option>
                                                <option value="T"> T </option>
                                                <option value="SA02"> SA02 </option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="descripSv[]"  value="<?= $Signosv[$i][22] ?>"></td>
                                        <td class="text-center">
                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

                                </div></br>   

                                <div class="form-group">

                                    <label for="tablaBalanceLLA">
                                    BALANCE LIQUIDOS  -  LIQUIDOS ADMINISTRADOS
                                    <div class='btn btn-success' id="btnNuevoBalanceLLA">Nuevo</div>
                                    </label>
                                    <table class='table table-bordered table-hover' id="tablaBalanceLLA">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                        <th></th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Balancella); ++$i) { ?>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="horaBLLA[]" value="">
                                                <option value=" <?= $Balancella[$i][21]?>"> <?= $Balancella[$i][21] ?> </option>
                                                <option value="7-11"> 7-11 </option>
                                                <option value="11-3"> 11-3 </option>
                                                <option value="3-7"> 3-7 </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="tipoBLLA[]" value="">
                                                <option value=" <?= $Balancella[$i][20]?>"> <?= $Balancella[$i][20] ?> </option>
                                                <option value="VIA ORAL"> VIA ORAL </option>
                                                <option value="VIA PARENTERAL"> VIA PARENTERAL </option>
                                                <option value="SONDAS"> SONDAS </option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="descripBLLA[]"  value="<?= $Balancella[$i][22] ?>"></td>
                                        <td class="text-center">
                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

                                </div></br>

                                <div class="form-group">

                                    <label for="tablaLiquidoE">
                                    LIQUIDOS  ELIMINADOS
                                    <div class='btn btn-success' id="btnNuevoLiquidoE">Nuevo</div>
                                    </label>
                                    <table class='table table-bordered table-hover' id="tablaLiquidoE">
                                    <tr>
                                        <th>HORA</th>
                                        <th>TIPO</th>
                                        <th>DESCRIPCION</th>
                                        <th></th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($Liquidoe); ++$i) { ?>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="horaliquidoE[]" value="">
                                                <option value=" <?= $Liquidoe[$i][21]?>"> <?= $Liquidoe[$i][21] ?> </option>
                                                <option value="7-11"> 7-11 </option>
                                                <option value="11-3"> 11-3 </option>
                                                <option value="3-7"> 3-7 </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="tipoliquidoE[]" value="">
                                                <option value=" <?= $Liquidoe[$i][20]?>"> <?= $Liquidoe[$i][20] ?> </option>
                                                <option value="ORINA"> ORINA </option>
                                                <option value="VOMITO"> VOMITO </option>
                                                <option value="SNG"> SNG </option>
                                                <option value="HECES"> HECES </option>
                                                <option value="OTROS"> OTROS </option>
                                            </select>
                                        </td>                                                    
                                        <td><input type="text" class="form-control" name="descripliquidoE[]"  value="<?= $Liquidoe[$i][22] ?>"></td>
                                        <td class="text-center">
                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

                                </div></br>    

                                <div class="form-group">

                                    <label for="tablaMedicamentos">
                                    MEDICACION
                                    <div class='btn btn-success' id="btnNuevoMedicamentos">Nuevo</div>
                                    </label>
                                    <table class='table table-bordered table-hover' id="tablaMedicamentos">
                                    <tr>
                                        <th>HORA</th>
                                        <th>MEDICAMENTO</th>
                                        <th>VIA</th>
                                        <th>DOSIS</th>
                                        <th></th>
                                    </tr>
                                    <?php for($i=0; $i<sizeof($medicacion); ++$i) { ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="horaMedicamentos[]" value="<?= $medicacion[$i][20] ?>"></td>
                                        <td><input type="text" class="form-control" name="medica[]"  value="<?= $medicacion[$i][21] ?>"></td>
                                        <td><input type="text" class="form-control" name="via[]"  value="<?= $medicacion[$i][22] ?>"></td>
                                        <td><input type="text" class="form-control" name="dosis[]"  value="<?= $medicacion[$i][23] ?>"></td>
                                        <td class="text-center">
                                        <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>                 

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

                                <input type="submit" class="btn btn-primary" id="btnUpdateNovedad" value="Guardar" /></br></br>

                            </div>
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
       

</body>
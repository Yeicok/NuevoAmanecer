$(document).on('ready', funcPrincipal);

function funcPrincipal ()
{
    $("#btnGuardarPacientes").on('click', funcGuardarPacientes);
    $("#btnUpdateNovedad").on('click', funcUpdateNovedad);
    $("#btnCrearEnfermero").on('click', funcCrearEnfermero);
    $("#btnCrearPacientes").on('click', funcCrearPacientes);
    $("#btnUpdatePacientes").on('click', funcUpdatePacientes);
    $("#btnCambiarClave").on('click',funCambiarClave);


}

function funcGuardarPacientes ()
{
    var formularioGuardarPacientes = document.getElementById('GuardarPacientes');
    var respuesta = document.getElementById('respuesta');
    var validacion = document.getElementById('load');
    
    formularioGuardarPacientes.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioGuardarPacientes);
    
        var request = new Request('/APP/controllers/enfController.php?action=addnotas',{
            method: 'POST',
            body: dato
        });

        validacion.removeAttribute('hidden');
        fetch(request)

        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');
            if(data === 'error0'){
                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Diligencia todo los campos en rojo y nota de enfermeria
                </div>`              
            }else if(data === 'error1'){
                respuesta.innerHTML = `
                <div class="alert alert-warning alert-dismissible fade show"  role="alert">
                     Ya existe el usuario
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                </div>`              
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Registro de Novedad',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                })
            }
         });
    })

}

function funcUpdateNovedad ()
{
    var formularioUpdateNovedad = document.getElementById('updateNovedad');
    var validacion = document.getElementById('load');
    
    formularioUpdateNovedad.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioUpdateNovedad);

        var request = new Request('/APP/controllers/enfController.php?action=vistaUpdateNovedades',{
            method: 'POST',
            body: dato
        })

        validacion.removeAttribute('hidden');
        fetch(request)

        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');

                Swal.fire({
                    icon: 'success',
                    title: 'Detalles de Novedad',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                })
            
         });
    })
}

function funcCrearEnfermero()
{
    var formularioCrearEnfermero = document.getElementById('crearEnfermero');
    var respuesta = document.getElementById('respuesta');
    var validacion = document.getElementById('load');

    formularioCrearEnfermero.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioCrearEnfermero);

        // console.log(dato)
        // console.log(dato.get('usuario'))
        // console.log(dato.get('nombre'))
        // console.log(dato.get('clave'))
        // console.log(dato.get('rol'))

        var request = new Request('/APP/controllers/adminController.php?action=crearEnfermero',{
            method: 'POST',
            body: dato
        });

        
        validacion.removeAttribute('hidden');
        fetch(request)

        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');
             if(data === 'error0'){
                 respuesta.innerHTML = `
                 <div class="alert alert-danger" role="alert">
                     Diligencia todo los campos en rojo 
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>`              
               }else if(data === 'error1'){
                 respuesta.innerHTML = `
                 <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                      la clave debe ser igual
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                 </div>`              
          
               }else if(data === 'error2'){
                respuesta.innerHTML = `
                <div class="alert alert-warning alert-dismissible fade show"  role="alert">
                    Ya existe el usuario
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>`              
               }else{
                  Swal.fire({
                    icon: 'success',
                    title: 'Registro de Enfermero',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                })
              }
         });

    
    })
}

function funcCrearPacientes(){
    var formularioCrearEnfermero = document.getElementById('crearPaciente');
    var respuesta = document.getElementById('respuesta');
    var validacion = document.getElementById('load');

    formularioCrearEnfermero.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioCrearEnfermero);

        var request = new Request('/APP/controllers/adminController.php?action=crearPaciente',{
            method: 'POST',
            body: dato
        });

        validacion.removeAttribute('hidden');
        fetch(request)

        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');
             if(data === 'error0'){
                 respuesta.innerHTML = `
                 <div class="alert alert-danger" role="alert">
                     Diligencia todo los campos en rojo 
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>`              
               }else if(data === 'error1'){
                respuesta.innerHTML = `
                <div class="alert alert-warning alert-dismissible fade show"  role="alert">
                    Ya existe el usuario
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>`              
               }else{
                  Swal.fire({
                    icon: 'success',
                    title: 'Registro de Paciente',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                })
              }
         });

    
    })
}

function funcUpdatePacientes(){
    var formularioCrearEnfermero = document.getElementById('updatePaciente');
    var respuesta = document.getElementById('respuesta');
    var validacion = document.getElementById('load');

    formularioCrearEnfermero.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioCrearEnfermero);

        var request = new Request('/APP/controllers/adminController.php?action=updatePaciente',{
            method: 'POST',
            body: dato
        });

        validacion.removeAttribute('hidden');
        fetch(request)

        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');
             if(data === 'error0'){
                 respuesta.innerHTML = `
                 <div class="alert alert-danger" role="alert">
                     Diligencia todo los campos en rojo 
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>`              
               }else{
                  Swal.fire({
                    icon: 'success',
                    title: 'Registro de Detalle de Paciente',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                })
              }
         });

    
    })
}


function funCambiarClave(){
    var formularioCambiarClave = document.getElementById('cambiarClave');
    var respuesta = document.getElementById('respuesta');
    var validacion = document.getElementById('load');


    formularioCambiarClave.addEventListener('submit', function(e){
        e.preventDefault();
        var dato = new FormData(formularioCambiarClave);

        var request = new Request('/APP/controllers/userController.php?action=cambiarClave', {
            method: 'POST',
            body: dato
          });
        
        validacion.removeAttribute('hidden');
        fetch(request)
           
        .then( res=> res.json())
        .then( data => {
            validacion.setAttribute('hidden', '');
            if(data === 'error'){
                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Las contraseñas ingresadas no coinciden
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                `              
            }else{
                    Swal.fire({
                    icon: 'success',
                    title: '',
                    text: data,
                    comfirmButtonText: 'Aceptar'
                    }).then(function () {
                    location.reload();
                    })
            }       
        })
    })

}
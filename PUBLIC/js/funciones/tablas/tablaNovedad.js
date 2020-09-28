function fetch_data()
{
fetch('/APP/controllers/enfController.php?action=vistaNovedades')
.then((res) => res.json())
.then(response => {
    //    console.log(response);
       let output = '';
for(let i in response){   
   output += `<tr>
       <td><a class='btn btn-light' href='/Enfermeria/APP/controllers/enfController.php?action=vistaUpdateNovedades&idNovedad=${response[i].idNovedad}'><i class='far fa-eye'></i></a></td>
       <td>${response[i].idNovedad}</td>
       <td>${response[i].nombreP}</td>
       <td>${response[i].turno}</td>
       <td>${response[i].fecha}</td>
       <td>${response[i].novedad}</td>
   </tr>`;
}

document.querySelector('.tbody').innerHTML = output;


$('.table').DataTable({
   "pagingType": "full_numbers",

   "lengthMenu": [
       [5, 10, 25, 50, -1], 
       [5, 10, 25, 50, 100]
   ],

   language:{
       "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
       "sInfo":           "Mostrando _START_ a _END_, Total de _TOTAL_ registros",
       "sInfoEmpty":      "Mostrando 0 a 0, Total de 0 registros",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
       },
       "oAria": {
           "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
           "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       },
       "buttons": {
           "copy": "Copiar",
           "colvis": "Visibilidad"
       }
   }   
});
}).catch(error => error);

}   
fetch_data();
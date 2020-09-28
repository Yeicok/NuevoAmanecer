
var contenido  = document.querySelector('#inputGroupSelect01')

function consulta(){
    fetch('/APP/controllers/enfController.php?action=consultaP')
    .then((res) => res.json() )
    .then( data => {
        // console.log(data)
        contenido.innerHTML += `
        <option selected disabled value="" >Seleccionar paciente</option>

        `
        for(let valor of data){
            // console.log(valor.idPaciente);
            contenido.innerHTML += `
            <option value="${ valor.idPaciente }">${ valor.nombreP }</option>
            `
        }
    })
}
consulta();

function cual()
{
        number=document.formu.lista.options[document.formu.lista.selectedIndex].text;
        document.formu.NombrePaciente.value=number;
}

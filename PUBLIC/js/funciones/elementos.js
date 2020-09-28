$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
    $("#btnNuevoSignosV").on('click', funcNuevoSignosV);
    $("#btnNuevoBalanceLLA").on('click', funcNuevoBalanceLLA);
    $("#btnNuevoLiquidoE").on('click', funcNuevoLiquidoE);
    $("#btnNuevoMedicamentos").on('click', funcNuevoMedicamentos);


    $("body").on('click', ".btn-danger", funcEliminarFila);


}


function funcEliminarFila() 
{
	$(this).parent().parent().fadeOut( "slow", function() { $(this).remove(); } );
}

function funcNuevoSignosV()
{
    $("#tablaSignosV")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'horaSv[]')
            )
        )
        .append
        (
            $("<td> <select class='form-control' name='tipoSV[]' value=''> <option value=''>  </option> <option value='TiA'> TiA</option> <option value='F.C.'> F.C.</option> <option value='F.R'> F.R </option> <option value='T'> T </option> <option value='SA02'> Maestría </option> </select> </td>")
        )    
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'descripSv[]')
            )
        )    
        .append
        (
            $("<td class='text-center'> <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div> </td>")            
        )        
    ); 
}

function funcNuevoBalanceLLA()
{
    $("#tablaBalanceLLA")
    .append
    (
        $('<tr>')
        .append
        (
            $("<td> <select class='form-control' name='horaBLLA[]' value=''> <option value=''> </option> <option value='7 - 11'> 7 - 11 </option> <option value='11 - 3'> 11 - 3 </option>  <option value='3 - 7'> 3 - 7 </option> </select> </td>")
        )
        .append
        (
            $("<td>  <select class='form-control' name='tipoBLLA[]' value=''> <option value=''>  </option> <option value='VIA ORAL'> VIA ORAL </option> <option value='VIA PARENTERAL'> VIA PARENTERAL </option> <option value='SONDAS'> SONDAS </option> </select> </td>")
        )    
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'descripBLLA[]')
            )
        )    
        .append
        (
            $("<td class='text-center'> <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div> </td>")            
        )        
    );
}

function funcNuevoLiquidoE()
{
    $("#tablaLiquidoE")
    .append
    (
        $('<tr>')
        .append
        (
            $("<td> <select class='form-control' name='horaliquidoE[]' value=''> <option value=''> </option> <option value='7 - 11'> 7 - 11 </option> <option value='11 - 3'> 11 - 3 </option>  <option value='3 - 7'> 3 - 7 </option> </select> </td>")
        )
        .append
        (
            $("<td> <select class='form-control' name='tipoliquidoE[]' value=''> <option value=''>  </option> <option value='ORINA'> ORINA </option> <option value='VOMITO'> VOMITO </option> <option value='SNG'> SNG </option> <option value='HECES'> HECES </option> <option value='OTROS'> OTROS </option> </select> </td> ")
        )    
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'descripliquidoE[]')
            )
        )    
        .append
        (
            $("<td class='text-center'> <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div> </td>")            
        )        
    );
}

function funcNuevoMedicamentos()
{
    $("#tablaMedicamentos")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'horaMedicamentos[]')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'medica[]')
            )
        )    
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'via[]')
            )
        )    
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'dosis[]')
            )
        )    
        .append
        (
            $("<td class='text-center'> <div class='btn btn-danger'><i class='far fa-trash-alt'></i></div> </td>")            
        )        
    ); 
}
function mostrarContrasena(){
    var tipo = document.getElementById("validationCustom02");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}
function mostrarContrasena1(){
    var tipos = document.getElementById("validationCustom3");
    if(tipos.type == "password"){
        tipos.type = "text";
    }else{
        tipos.type = "password";
    }
}
$(document).ready(function(){

    inicio();

$("#nuevo_usuario").on('click',function(){
    var json_datos_usuario={name:$("#nombre").val(),
                            username:$("#username").val(),
                            password:$("#password").val(),
                            email:$("#email").val()
                            };
    var credenciales=localStorage.getItem("credenciales");
    token=JSON.parse(credenciales);
    //console.log(json_datos_usuario);
    $.ajax({
        url: '/users/crear',
        type: 'POST',
        dataType:'json',
        data: JSON.stringify(json_datos_usuario),
        beforeSend: function(request) {
            request.setRequestHeader("Content-Type", "application/json");
            request.setRequestHeader("api_token",token[0].api_token );   
                  
        },

        success:function(resp){
           var data=JSON.stringify(resp);
          console.log("retorno",resp);
          console.log("cadena",data);
        // localStorage.setItem("credenciales",data);
            inicio();
            alert("Usuario creado!");
            $("#cancelar").trigger('click');

        

        }
        
    }); //ajax

});

$("#modificar_usuario").on('click',function(){
    var json_datos_usuario={
                            id:$("#id_registro").val(),
                            name:$("#nombre").val(),
                            username:$("#username").val(),
                            password:$("#password").val(),
                            email:$("#email").val()
                            };
    var credenciales=localStorage.getItem("credenciales");
    token=JSON.parse(credenciales);
    //console.log(json_dat    console.log(localStorage.getItem("credenciales"));os_usuario);
    $.ajax({
        url: '/users/modificar',
        type: 'POST',
        dataType:'json',
        data: JSON.stringify(json_datos_usuario),
        beforeSend: function(request) {
            request.setRequestHeader("Content-Type", "application/json");
            request.setRequestHeader("api_token",token[0].api_token );   
                  
        },

        success:function(resp){
           var data=JSON.stringify(resp);
          console.log("retorno",resp);
          console.log("cadena",data);
        // localStorage.setItem("credenciales",data);
            inicio();
            alert("Usuario modificado!");
            $("#cancelar").trigger('click');
            $("#modificar_usuario").attr('style','display:none');
            $("#nuevo_usuario").attr('style','display:block'); 
        

        }
        
    }); //ajax

});// fin evento modificar


});

function modificar(registro){
    //console.log(registro);
    $("#modificar_usuario").attr('style','display:block');
    $("#nuevo_usuario").attr('style','display:none'); 
    $("#nombre").val(registro.name);
    $("#username").val(registro.username);
    $("#email").val(registro.email);
    $("#id_registro").val(registro.id);
}

function inicio(){
    var credenciales=localStorage.getItem("credenciales");
    token=JSON.parse(credenciales);
    console.log(credenciales);
    $.ajax({
     url: '/users/listar',
     type: 'get',
     dataType:'html',
     beforeSend: function(request) {
         request.setRequestHeader("Content-Type", "application/json");   
         request.setRequestHeader("api_token",token[0].api_token);        
     },
     success:function(resp){
     json_resp=JSON.parse(resp);
         console.log("retonro /users/listar",json_resp);
        var fila="<tr>";
        $("#lista_usuarios tbody").empty();
         json_resp[0].forEach(function (valor) {
             var email= JSON.stringify(valor.email);
             
         fila=fila+"<td>"+valor.name+"</td><td>"+valor.username+"</td><td>"+valor.email+"</td><td><a id='eliminar' onclick='eliminar("+valor.id+")'><span class='fa-stack fa-1x'>"+"<i class='fa fa-circle fa-stack-2x text-danger'></i>"+"<i class='fa fa-close fa-stack-1x fa-inverse'></i></span></a> </td>"+"<td> <a id='modificar' onclick='modificar("+JSON.stringify(valor)+")'>"+"<span class='fa-stack fa-1x'>"+"<i class='fa fa-circle fa-stack-2x text-info'></i>"+"<i class='fa fa-rotate-left fa-stack-1x fa-inverse'></i>"+"</span></a></td> </tr>";
             $("#lista_usuarios").append(fila);
             fila="<tr>";

         });

     }


 }); //ajax
}

function eliminar(id){
    var json_datos_usuario={
        id:id
        };
var credenciales=localStorage.getItem("credenciales");
token=JSON.parse(credenciales);
console.log(json_datos_usuario);
$.ajax({
url: '/users/eliminar',
type: 'POST',
dataType:'json',
data: JSON.stringify(json_datos_usuario),
beforeSend: function(request) {
request.setRequestHeader("Content-Type", "application/json");
request.setRequestHeader("api_token",token[0].api_token );   

},

success:function(resp){
var data=JSON.stringify(resp);

// localStorage.setItem("credenciales",data);
inicio();
alert("Usuario eliminado!");
$("#cancelar").trigger('click');
$("#modificar_usuario").attr('style','display:none');
$("#nuevo_usuario").attr('style','display:block'); 


}

}); //ajax
}

$(document).ready(function(){
   
  $('#iniciar').on('click',function(e){
   
    var json={
        username:$("#user").val(),
        password:$("#pass").val()
            };

        $.ajax({
            url: '/users/login',
            type: 'POST',
            dataType:'json',
            data: JSON.stringify(json),
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/json");           
            },

            success:function(resp){
               var data=JSON.stringify(resp);
              console.log("retorno",resp);
              console.log("cadena",data);
             localStorage.setItem("credenciales",data);
            
              window.location.href ='/users/principal';
            
    
            }
        }); //ajax
    

    }); //evento

  });

function redireccion(){
    var credenciales=localStorage.getItem("credenciales");
    var token =JSON.parse(credenciales);
    
    $.ajax({
        url: '/users/listar',
        type: 'get',
        dataType:'html',
        beforeSend: function(request) {
            request.setRequestHeader("Content-Type", "application/json");   
            request.setRequestHeader("api_token",token[0].api_token);        
        },
        success:function(resp){
        console.log("retonro /users/listar",resp);
        }


    }); //ajax
}  

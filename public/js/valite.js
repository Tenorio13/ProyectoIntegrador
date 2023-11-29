
 document.getElementById('email').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('emailOK');
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "";
    } else {
      valido.innerText = "incorrecto:ejemplo: nombre@tipocorreo.com";
    }
});




function evento(e){
 var key = window.Event ? e.which : e.keyCode
 return (key >= 48 && key <= 57)
}

function mostrarContrasena(){
     var tipo = document.getElementById("password");
     if(tipo.type == "password"){
         tipo.type = "text";
     }else{
         tipo.type = "password";
     }
 }

 
function mostrarC(){
     var tipo = document.getElementById("password-confirm");
     if(tipo.type == "password"){
         tipo.type = "text";
     }else{
         tipo.type = "password";
     }
 }
             function soloLetras(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = [8, 37, 39, 46];
 
     tecla_especial = false
     for(var i in especiales) {
         if(key == especiales[i]) {
             tecla_especial = true;
             break;
         }
     }
 
     if(letras.indexOf(tecla) == -1 && !tecla_especial)
         return false;
 }




                   function recorrer(obj){
                       var pass = obj.value;
                       var conteo = obj.value.length;
                       var cadena = pass.split("");
                       var cont = 0;
                       var let_a = 0;
                       var let_b = 0;
                       var let_c = 0;
                       var let_d = 0;
         
                       if(conteo > 3){
                           if(cadena[0].search(/[A-Z]/g)+1 > 0){
                           let_a = 0;
                           let_b = 0;
                           let_c = 0;
                           let_d = 0;
             
                       for(var i=0; i < cadena.length; i++){
                         var letra = cadena[i];
                         if(letra.search(/[a-z]/g)+1 > 0){ let_a = let_a+1; }
                         else{
                             if(letra.search(/[A-Z]/g)+1 > 0){ let_b = let_b+1; }
                             else{
                                 if(letra.search(/[@#_.-]/g)+1 > 0){ let_c = let_d+1; }
                                 else{
                                 if(letra.search(/[0-9]/g)+1 > 0){ let_c = let_c+1; }
                                 else{ cont = cont+1; }
                             }
                         }
                       }
                   }
               if(conteo >= 8){
                 document.getElementById('nivel').style.cssText = 'color: #ffffff; background-color: #000080; ';
                 document.getElementById('nivel').innerHTML = ":)";
               }
              else{
                 if(conteo >= 6){
                     document.getElementById('nivel').style.cssText = 'color: #ffffff; background-color: #ffff00; ';
                     document.getElementById('nivel').innerHTML = ";(";
                 }
                 else{
                     document.getElementById('nivel').style.cssText = 'color: #ffffff; background-color: #800000; ';
                     document.getElementById('nivel').innerHTML = ":(";
                 }
              }
         
              if(let_a < 1 || let_b < 1 || let_c < 1){
                 if(let_a < 1){ let_a = " Para mejor seguridad introduce una mayuscula"; } else{ let_a = " "; }
                 if(let_b < 1){ let_b = "Para mejor seguridad introduce una minuscula"; } else{ let_b = " "; }
                 if(let_c < 1){ let_c = "Para mejor seguridad introduce numeros"; } else{ let_c = " "; }
                 if(let_d < 1){ let_c = "Para mejor seguridad introduce un caracter @#_.- "; } else{ let_d = " "; }
                 document.getElementById('corregir').innerHTML = "Error debe contener: " + let_a + let_b + let_c + let_d;
              }
              else{
                 document.getElementById('corregir').innerHTML = " ";
              }
            
                   
              if(cont > 0){
                 document.getElementById('corregir').innerHTML = "Error:solo caracteres  @#_.- !!!";
                 document.getElementById('password').style.cssText = 'color: #800000; border: solid 1px #800000; ';
                 document.getElementById('nivel').innerHTML = " ";
              }
              else{
                 document.getElementById('password').style.cssText = 'color: #000080; border: solid 1px #000080; ';
              }
           }
                     else{
                 document.getElementById('password').style.cssText = 'color:  #800000; border: solid 1px  #800000; ';
                 document.getElementById('nivel').innerHTML = " ";
                 document.getElementById('corregir').innerHTML = "Te recomendamos la primera letra mayuscula (opccional)";
                     }
                       }
                       else{
                     document.getElementById('password').style.cssText = 'color:  #800000; border: solid 1px  #800000; ';
                     document.getElementById('nivel').innerHTML = " ";
                     document.getElementById('corregir').innerHTML = " ";
                       }
                   }
                   function show(obj){
              var pass1=document.getElementById("password").value;
              var pass2=   document.getElementById("password-confirm").value;
              if(pass1==pass2){
                 document.getElementById('mens').innerHTML = " ";
              }else{
                 document.getElementById("mens").innerHTML = "Verifica las contraseñas no son iguales ";
         
              }
          }
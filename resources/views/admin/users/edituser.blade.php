@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.cart")
@include("dashboard.order")
@include("dashboard.messages")


@section('content')


  
  
        @if (session('notification'))
            <div class="alert alert-success text-center">
                {{ session('notification') }}
            </div>
        @endif

       

     
               
      
    <div class="section container">
      <h2 class="title text-center"> ¡Hola amig@, {{ Auth::user()->name }}!  Administrador usuarios </h2>
      <hr>
    
      @if (session('notification'))
      <div class="alert alert-success text-center">
          {{ session('notification') }}
      </div>
  @endif
    

 





  
         
<center>
<!--tarjeta que contiene al form-->
<div class="card  " >
  <div class=" text-center" >
      
    
                 <br><br> 
        <span class="login100-form-title p-b-34 p-t-27">
           Usuario <br> {{ $user->name }}  {{ $user->apellidos }}       </span>
     <?php
          if($user->admin==1){ 
       echo "Administrador";
     }else{
      echo "Cliente";
     }
     ?>
  <form class="form" method="POST" action="{{ url('/users'.$user->id.'/edit') }}">
    {{ csrf_field() }}
     
   
    
    <div class="card-body">

       <!-- Nombre -->
        <!-- Nombre -->
        <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <span class="input-group-text">
          <i class="material-icons">face</i>
          </span>
                           
          <input id="name" onkeypress="return soloLetras(event)"  type="text" class="form-control" name="name" maxlength="20" minlength="4" placeholder="Nombre" value="{{ $user->name }}" required autofocus>
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
      
      <!-- End Nombre -->
       <!-- apellidos -->
       <div class="input-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
          <span class="input-group-text">
          <i class="material-icons">face</i>
          </span>
                           
          <input id="apellidos" onkeypress="return soloLetras(event)" type="text" class="form-control" name="apellidos" maxlength="30" minlength="4" placeholder="Apellidos" value="{{ $user->apellidos }}" >
          @if ($errors->has('apellidos'))
              <span class="help-block">
                  <strong>{{ $errors->first('apellidos') }}</strong>
              </span>
          @endif
      </div>
      <div class="input-group{{ $errors->has('tel') ? ' has-error' : '' }}">
          <span class="input-group-text">
          <i class="material-icons">call</i>
          </span>
                           
          <input id="tel" type="text"  onKeyPress="return evento(event)" class="form-control" maxlength="10" minlength="10"  name="tel" placeholder="Telefono de contacto" value="{{ $user->tel }}" >
          @if ($errors->has('tel'))
              <span class="help-block">
                  <strong>{{ $errors->first('tel') }}</strong>
              </span>
          @endif
          
      </div>
      <!-- End Nombre -->

      <!-- Mail -->
      <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <span class="input-group-text">
              <i class="material-icons">mail</i>
          </span>                  
          <input id="email" type="email" class="form-control" maxlength="40" minlength="10" name="email" placeholder="Email" value="{{ $user->email }}" >

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>
      <span id="emailOK" style="font-size:15px;"></span>

      <!-- End Mail -->
          
      <!-- Password -->
      <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <span class="input-group-text">
            <i class="material-icons">lock_outline</i>
          </span>    
          <input id="password"  type="password"  onkeyup="recorrer(this);" class="form-control" maxlength="40" minlength="10" placeholder="Contraseña" value="{{ $user->password }}" name="password" >
          <strong id="nivel" style="font-size:15px;"> </strong>
          <input type="radio" onclick="mostrarContrasena()">

          @if ($errors->has('password'))
              <span class="help-block">
               

          <strong>{{ $errors->first('password') }}</strong>

              </span>

          @endif  

      </div>
      <strong id="corregir" style="font-size: 15px;"></strong>
      
      
      
    
    Selecciona el tipo de usuario<br>
    <div class="box">
    <select name="admin" >
      <option value="{{ $user->admin }}">Usuario establecido</option>
         
      <option value="1">Administrador</option>
      <option value="0">Cliente</option>

         
      </select></div>
      <script >

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
                 document.getElementById('corregir').innerHTML = "Error: Primero debe ser una mayuscula !!";
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
      </script>
      
    <br><br>
      <button type="submit" class="btn btn-success">Actualizar</button>
        
      <a class="btn btn-danger" href="{{ url('/admin/usuarios') }}">Cancerlar edición
      </a>
      

  </form>
  <!-- End form-->


</div>    
</div>
</div>
</div>
<!-- End container of form-->
</div>
</div>   
</center>
</div>
</div>




<!-- Modal Confirm delete -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Esta seguro que desea eliminar este pedido?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ url('/order') }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


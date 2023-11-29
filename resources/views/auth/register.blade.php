@extends('layouts.app')

@section('content')

 <!--El header, con la imagen de fondo ocupa una 
  toda la pantalla, incluido el footer
  El header engloba al contenido y al footer-->
  
    <!--Start container of form-->
    <style>
        body{
            background-color: rgb(255, 255, 255);
        }
        @media screen and (max-width: 600px) {
  input[type=submit] {
    width: auto;
    margin-top: 0;
  }
}
.text{
      background-color:#219043;
  }
        </style>
    <section id="banner_parallax" class="slide_banner" lass="page-header header-filter">
        
        <div class="container">
           <div class="row">
            <div class="col-md-6">
              <div class="full">
                 <div class="slide_cont">
                    <h4>Registrate</h4>
                 </div>
              </div>
           </div>
    <div class="container">
        
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          
          <!--tarjeta que contiene al form-->
          <div class="card1  " >
            <div class="card-header text-center" >
                
           
                           <br> 
                  <span class="title p-b-34 p-t-27">
                  Registrate
                </span><br><br>
            <!--Start form-->
            <form class="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
               
             
           
              <div class="card-body">

                 <!-- Nombre -->
                 <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <span class="input-group-text">
                    <i class="material-icons">face</i>
                    </span>
                                     
                    <input id="name"  oninput="validateNoQuotes(this)" onkeypress="return soloLetras(event)"  type="text" class="form-control" name="name" maxlength="20" minlength="4" placeholder="Nombre" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                    <script>
                           function validateNoQuotes(inputElement) {
        var inputValue = inputElement.value;

        // Check if the input contains single or double quotes
        if (inputValue.includes("'") || inputValue.includes('"')) {
            alert('Please do not enter quotes in this field.');
            // You may also clear the input field or take other actions as needed
            inputElement.value = inputValue.replace(/['"]/g, ''); // Remove quotes from the input
        }
    }
                        </script>
                </div>
                
                <!-- End Nombre -->
                 <!-- apellidos -->
                 <div class="input-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                    <span class="input-group-text">
                    <i class="material-icons">face</i>
                    </span>
                                     
                    <input id="apellidos" onkeypress="return soloLetras(event)" type="text" class="form-control" name="apellidos" maxlength="30" minlength="4" placeholder="Apellidos" value="{{ old('apellidos') }}" required autofocus>
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
                                     
                    <input id="tel" type="tel"  onKeyPress="return evento(event)" class="form-control" maxlength="10" minlength="10"  name="tel" placeholder="Telefono de contacto" value="{{ old('tel') }}" required autofocus>
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
                    <input id="email" type="email" class="form-control" maxlength="40" minlength="10" name="email" placeholder="Email" value="{{ old('email') }}" required>

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
                    <input id="password"  type="password"  onkeyup="recorrer(this);" class="form-control" maxlength="40" minlength="10" placeholder="Contraseña" name="password" required>
                    <strong id="nivel" style="font-size:15px;"> </strong>
                    <input type="radio" onclick="mostrarContrasena()">

                    @if ($errors->has('password'))
                        <span class="help-block">
                         

                    <strong>{{ $errors->first('password') }}</strong>

                        </span>

                    @endif  
    
                </div>
                <strong id="corregir" style="font-size: 15px;"></strong>
                
                
                <!-- End Password -->                <!-- Confirm Password -->
                <div class="input-group">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input id="password-confirm"  onkeyup="show(this);" type="password" class="form-control"  placeholder="Confirmar Contraseña" name="password_confirmation" required>
                    <input type="radio" onclick="mostrarC()">

                </div>
                <strong id="mens" style="font-size:15px;"></strong> 

               
                <script src="js/valite.js"></script>
                
              
                <div class="footer text-center">
                    <button type="submit" class="btno text ">Registar</button>
                    <!-- <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a> -->
                </div><input type="hidden" name="admin" value="0" >

            </form>
            <!-- End form-->

          </div>    
        </div>
      </div>
    </div>
    <!-- End container of form-->
  </div>
</div>   
        
<div class="col-md-6">
   <div class="full">
   </div>
</div>
</div>
</div>
</section>
@endsection


               
                <!-- Nombre 
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="material-icons">face</i>
                            </span>
                        </div>             
                        <input id="name" type="text" class="form-control" name="name" placeholder="First Name..." value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                Modelo original

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password...">
                </div>
                <!-- end nombre -->



<!-- 

<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->

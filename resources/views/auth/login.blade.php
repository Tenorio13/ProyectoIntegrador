@extends('layouts.app')

@section('title','Geo Plastic')

@section('content')
<style>
  body {
    background-color: rgb(255, 255, 255);
  }

  .text {
    background-color: #219043;
  }
</style><br><br><br><br><br>
<section id="login_section" class="slide_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="full">
          <div class="slide_cont"></div>
        </div>
      </div>
      <div class="col-md-6 ml-auto mr-auto">
        <div class="card card-login">
          <div class="text-center">
            <h2 class="title">Iniciar Sesión</h2>
            @if (session('notification'))
              <div class="alert alert-success mt-3">
                {{ session('notification') }}
              </div>
            @endif
          </div>

          <!-- Formulario de inicio de sesión -->
          <form class="contact-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <p class="text-center">Ingresa tus credenciales</p>
            <div class="card-body">
              <!-- Campo de correo electrónico -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" maxlength="30" minlength="10" class="form-control" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>

              <!-- Campo de contraseña -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" onkeyup="recorrer(this);" maxlength="40" minlength="4" class="form-control" name="password" placeholder="Contraseña" required autofocus>
                  <strong id="nivel" style="font-size:15px;"></strong>



                </div>
                 <input type="checkbox" onclick="mostrarContrasena()"> Mostrar Contraseña
                @if ($errors->has('password'))
                  <span class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
                <strong id="corregir" style="font-size: 15px;"></strong>
              </div>

              <!-- Botón de enviar -->
              <div class="footer text-center">
                <button type="submit" class="btn btn-success">Ingresar</button>
              </div>

              <!-- Enlace de olvido de contraseña -->
              <div class="text-center">
                <a class="btn btn-link" href="#" style="color:blue;" data-toggle="modal" data-target="#messageModal">
                  ¿Olvidaste tu contraseña?
                </a>
              </div>

              <!-- Enlace de registro -->
              <div class="text-center">
                <a class="btn btn-link" href="#" style="color:blue;" data-toggle="modal" data-target="#messageModal2">
                  ¿No tienes cuenta? Regístrate
                </a>
              </div>
            </div>
          </form>
          <script src="js/valite.js"></script>
        </div>
      </div>
    </div>
  </div>
</section>







<!-- Modal Menssage -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <center>
          <div class="card ">

            <div class=" text-center">

              <br><br>
              <span class="login100-form-title p-b-34 p-t-27">
                <h2 class="text-center title">Restablecer Contraseña</h2>

              </span>

            </div>

            <center>
              <form class="form-horizontal" method="POST" action="{{ url('password') }}">
                {{ csrf_field() }}



                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>

                  <input id="email" type="email" maxlength="40" minlength="10" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>


                </div>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif






            </center>
            <span id="emailOK" style="font-size:15px;"></span>

            <div class="form-group">


                <button type="submit" class="btn btn-success">
                  Restablecer </button>


              <script src="js/valite.js"></script>

              </form>
            </div>

          </div>

        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Menssage -->
<div class="modal fade" id="messageModal2" tabindex="-1" role="dialog" aria-labelledby="messageModal2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <center>
          <div class="card  ">

            <span class="login100-form-title p-b-34 p-t-27">
              <h2 class="text-center title">Registro</h2>

            </span>

            <center>


              <form class="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}



                <div class="card-body">

                  <!-- Nombre -->
                  <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>

                    <input id="name" onkeypress="return soloLetras(event)" type="text" class="form-control" name="name" maxlength="20" minlength="4" placeholder="Nombre" value="{{ old('name') }}" required autofocus>
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

                    <input id="tel" type="tel" onKeyPress="return evento(event)" class="form-control" maxlength="10" minlength="10" name="tel" placeholder="Telefono de contacto" value="{{ old('tel') }}" required autofocus>
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
                    <input id="password" type="password" onkeyup="recorrer(this);" class="form-control" maxlength="40" minlength="10" placeholder="Contraseña" name="password" required>
                    <strong id="nivel" style="font-size:15px;"> </strong>
                    <input type="radio" onclick="mostrarContrasena()">

                    @if ($errors->has('password'))
                    <span class="help-block">


                      <strong>{{ $errors->first('password') }}</strong>

                    </span>

                    @endif

                  </div>
                  <strong id="corregir" style="font-size: 15px;"></strong>


                  <!-- End Password --> <!-- Confirm Password -->
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input id="password-confirm" onkeyup="show(this);" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required>
                    <input type="radio" onclick="mostrarContrasena()">

                  </div>

                  <strong id="mens" style="font-size:15px;"></strong>


                  <script src="js/valite.js"></script>


                  <div class="footer text-center">
                    <button type="submit" class="btn btn-success ">Registar</button>
                    <!-- <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a> -->
                  </div><input type="hidden" name="admin" value="0">

              </form>
          </div>

      </div>

      </center>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>



<!--Start container of form-->

@endsection

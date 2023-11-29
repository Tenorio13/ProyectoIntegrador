@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.cart")
@include("dashboard.order")
@include("dashboard.messages")


@section('content')



    <div class="section container">
      <h2 class="title text-center"> ¡Hola amig@, {{ Auth::user()->name }}! Buzon Administrador </h2>

      <hr>

      <form class="form-inline justify-content-center"  name="query" method="get" action="{{ url('searchmensajes') }}">
        <div class="form-group no-border">
        <input type="text" class="form-control" style="color:rgb(30, 4, 177); font-size:20px;"   placeholder="¿Nombre del usuario?" name="query" id="search">
        </div>
        <button type="submit" class="btn btn-primary btn-just-icon btn-round">
          <i class="material-icons" style="background-color:#41B906; color:#c9e0f5;">search</i>
        </button>
      </form>



      @if (session('notification'))
      <div class="alert alert-success text-center">
          {{ session('notification') }}
      </div>
  @endif


    <div class="modal-body">
      <table class="table">
          <thead>
              <tr>
                <th>Mensaje</th>
                <th>Nombre</th>
                <th>Asunto</th>
                <th>Correo </th>
                <th>id</th>
                <th>Eliminar</th>
                <th>Responder</th>
              </tr>
          </thead>
          <tbody>

                  @foreach($mensajes as $mensaje)
                  <tr>
                    <td class="col-md-4">{{ $mensaje->message_field }}</td>
                    <td class="col-md-4">{{ $mensaje->userName }}</td>
                    <td class="col-md-4">{{ $mensaje->asunto }}</td>
                    <td class="col-md-4">{{ $mensaje->email }}</td>
                    <td class="col-md-4">{{ $mensaje->id }}</td>
                    <td class="td-actions text-right col-md-4">
                   <form method="POST"  action="{{ url('message/new/'.$mensaje->id.'') }}" >

                   {{ csrf_field() }}
                    {{ method_field('DELETE') }}




                      <button type="submit" rel="tooltip" title="Eliminar Mensaje" class="btn btn-danger
                      btn-simple btn-xs" data-toggle="modal" data-target="#confirmModal">
                          <i class="fa fa-times"></i>
                      </button>
                      <td class="td-actions">

                      <button type="button" rel="tooltip" title="Responder mensaje" class="btn btn-light btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#messageModal">
                              <i class="material-icons">reply</i>
                      </button>
                    </td>

                    </form>


                </td>
              </tr>
                  @endforeach

                  <div class="center-block">
                    {{ $mensajes->links("pagination::bootstrap-4") }}
                  </div>
          </tbody>
      </table>
  </div>


</div>
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
        <form method="post" action="{{ url('message/new/') }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>


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
              <div class="card  " >

                            <div class=" text-center" >


                                           <br><br>
                                  <span class="login100-form-title p-b-34 p-t-27">
                                    <h2 class="text-center title">Responder mensaje</h2>

                                </span>

                              </div>

                            <form class="contact-form" name="enviar" method="POST"  action="{{ url('/store') }}" >


                            {{ csrf_field() }}

                            <center >

                              <div class="col-md-12">
                                      <label class="bmd-label-floating" >¿Cuál es tu nombre?</label>
                                      <input type="text" name="name_user" class="form-control" required>

                              </div>



                              <div class="col-md-12">

                                  <label class="bmd-label-floating">Corre del cliente</label>


                                  <input id="email" type="email" class="form-control" maxlength="40" minlength="10" name="email" placeholder="Email" value="{{ old('email') }}" required>

                              </div>
                              <span id="emailOK" style="font-size:15px;"></span>

                           <div class="col-md-12">

                                <label class="bmd-label-floating">Asunto:</label>
                                <input type="text" name="asunto" class="form-control"  maxlength="20" minlength="4" required autofocus>

                            </div>

                            <div class=" col-md-12">
                              <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
                              <textarea type="text" name="message" class="form-control" maxlength="100" minlength="10" rows="4" id="exampleMessage" required autofocus></textarea>
                            </div>
                          </center >


                            <div class="form-group">
                              <div class="col-md-4 ml-auto mr-auto text-center">
                              <button type="submit" class="btn btn-success">

                              Enviar                           </button>


                              </div>
                            </div>
                          </form>
                          <script src="../js/valite.js"></script>

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










@endsection


@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.cart")
@include("dashboard.order")
@include("dashboard.messages")


@section('content')


<











  <div class="section container">

    <h2 class="title text-center"> ¡Hola amig@, {{ Auth::user()->name }}! Administrador usuarios </h2>
    <hr>


    @if (session('notification'))
    <div class="alert alert-success text-center">
      {{ session('notification') }}
    </div>
    @endif


    <a href="{{ url('admin/usuarios/create') }}" class="btn btn-primary btn-round">Agregar Usuario</a>


    <form class="form-inline justify-content-center" name="query" method="get" action="{{ url('searchuser') }}">
      <div class="form-group no-border">
        <input type="text" class="form-control" style="color:rgb(185, 183, 197); font-size:20px;" placeholder="¿Nombre del usuario?" name="query" id="search">
      </div>
      <button type="submit" class="btn btn-primary btn-just-icon btn-round">
        <i class="material-icons" style="background-color:#41B906; color:#c9e0f5;">search</i>
      </button>
    </form>



    <div class="modal-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Tipo usuario</th>
                    <th>Correo</th>
                    <th>ID</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $datos)
                <tr>
                    <td class="col-md-6" style="text-align: justify;">{{ $datos->name }}</td>
                    <td class="col-md-6" style="text-align: justify;">{{ $datos->apellidos }}</td>
                    <td class="col-md-6" style="text-align: justify;">{{ $datos->tel }}</td>
                    <td class="col-md-4">
                        <?php
                            if ($datos->admin == 1) {
                                echo "Administrador";
                            } else {
                                echo "Cliente";
                            }
                        ?>
                    </td>
                    <td class="col-md-6">{{ $datos->email }}</td>
                    <td class="col-md-6">{{ $datos->id }}</td>
                    <td class="td-actions text-right col-md-4">
                        <form method="POST" action="{{ url('/user'.$datos->id.'') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" rel="tooltip" title="Eliminar usuario"
                                class="btn btn-danger btn-fab btn-fab-mini btn-round" data-toggle="modal"
                                data-target="#confirmModal">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </td>
                    <td class="col-md-6">
                        <a href="{{ url('users/'.$datos->id.'/edit') }}" type="button" rel="tooltip"
                            title="Editar usuario" class="btn btn-success btn-simple btn-xs">
                            <i class="material-icons">edit</i>
                        </a>


                    </td>
                </tr>
                @endforeach
                <div class="center-block">
                    {{ $clientes->links("pagination::bootstrap-4") }}
                </div>
            </tbody>
        </table>
    </div>
</div>








@endsection

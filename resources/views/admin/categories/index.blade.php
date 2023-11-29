<!--Vista de administracion de productos -->
@extends('layouts.app')

@section('title','Calidad Inovann Tecnoly')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

    <div class="container">

      <!-- Products section -->
      <div class="section text-center">
        <h2 class="title">Listado de Categorias </h2>
        <center>
        <div class="team">

            <div class="row">
              <a  href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-round">Agregar Categoria</a>

              <table class="table">
                  <thead>
                      <tr>
                        <th class="col-md-2 text-center">Descripcion</th>
                        <th class="col-md-2 text-justify " > Nombre </th>
                        <th class="col-md-2 text-justify " > Categoria </th>

                        <th class="text-rigth">Modificar</th>
                        </tr>
                  </thead>
                  <tbody>
                      @foreach($allCategories as $category)
                      <tr>

                          <td class="col-md-4" style="text-align: justify;"> {{ $category->description }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->id }}</td>


                          <td class="td-actions text-right col-md-4">
                              <form method="POST" action="{{ url('/admin/categories/'.$category->id.'') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <a href="{{ url('categories/'.$category->id) }}" rel="tooltip" title="Detalles de categoria" class="btn btn-info btn-simple btn-xs">
                                    <i class="material-icons">info</i>
                                </a>
                                <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" type="button" rel="tooltip" title="Editar" class="btn btn-success
                                btn-simple btn-xs">
                                    <i class="material-icons">edit</i>
                                </a>

                                <button type="submit" rel="tooltip" title="Eliminar Categoria" class="btn btn-danger
                                btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

              <!-- pagination-->
              <div class="center-block">
                {{ $allCategories->links("pagination::bootstrap-4") }}
              </div>

              <!-- End pagination -->
            </div>
        </div>
    </div>
    <!--End Section text center -->

    </div>

  <!--end principal content-->
@endsection

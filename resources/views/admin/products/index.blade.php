<!--Vista de administracion de productos -->
@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

<style>

.hero-b{
  background: linear-gradient(170deg, #0B87A9 64%, #f0f1f3 30%);
}

</style>





  <!-- end jumbotron-->


  <!--principal content, similar al landing page-->

    <div class="container" >

      <!-- Products section -->

      <div class="section text-center">

        <h2 class="title">Productos en existencia </h2>


        <div class="team">

            <div class="row">

              <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-round">Agregar Producto</a>

              <table class="table">
    <thead>
        <tr>
            <th class="col-md-2 text-center">Imagen</th>
            <th class="col-md-2 text-center">Nombre producto</th>
            <th class="col-md-2 text-center">Descripción</th>
            <th class="text-right">Precio</th>
            <th class="text-right">Modificar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allProducts as $product)
        <tr>
            <td>
                <div class="img-contenedor">
                    <img src="{{ asset('images/products/'.$product->featured_image_url) }}" alt=""
                        style="max-width:100%;width:auto;height:auto;">
                </div>
            </td>
            <td>{{ $product->name }}</td>
            <td class="col-md-4" style="text-align: justify;">{{ $product->description }}</td>
            <td class="td-actions text-right">&dollar; {{ $product->price }}</td>
            <td class="td-actions text-right col-md-4">
                <form method="POST" action="{{ url('/admin/products/'.$product->id.'') }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <a href="{{ url('products/'.$product->id) }}" rel="tooltip" title="Ver producto"
                        class="btn btn-info btn-simple btn-xs">
                        <i class="material-icons">visibility</i>
                    </a>
                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" type="button" rel="tooltip"
                        title="Editar" class="btn btn-success btn-simple btn-xs">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" type="button" rel="tooltip"
                        title="Imagenes" class="btn btn-warning btn-simple btn-xs">
                        <i class="material-icons">image</i>
                    </a>
                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
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
                {{ $allProducts->links("pagination::bootstrap-4") }}
              </div>

              <!-- End pagination -->
            </div>
        </div>
    </div>
    <!--End Section text center -->

    </div>

  <!--end principal content-->
@endsection

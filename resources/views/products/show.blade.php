@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')

@section('content')





<br><br><br>
  <!-- contenido del perfil -->
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">







              <div class="avatar">

                <img  src="{{ asset('images/products/'.$product->featured_image_url) }}" alt="Circle Image" class="img-raised  img-fluid">

              </div>


              <!--End name-->
              @if(session('notification'))
                <div class="alert alert-success text-center">
                  {{ session('notification') }}
                </div>
              @endif

              @if(session('error'))
                <div class="alert alert-warning text-center">
                  {{ session('error') }}
                </div>
              @endif

            <!--End profile -->
          </div>
        </div>
        <style>
.description {
      width: auto; /* Ancho del contenedor, ajusta según sea necesario */
    background-color: #f2f9f4;
    color: black;
      border: 1px solid #ddd; /* Añade un borde para resaltar el contorno del contenedor */
      text-align: justify; /* Justifica el texto dentro del contenedor */
    }



          </style>

        <div class="description">
  <p>{{ $product->description_details }}</p>
</div>

        <div class=" text-center">
          <h3>Precio: &dollar; {{ $product->price }}</h3>
        </div>

        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="profile-tabs">
              <div class="text-center">
                @guest
                  <!-- nothing -->
                @else
                  <button class="btn btn-outline-primary  btn-round" data-toggle="modal" data-target="#modalAddToCart">
                      <i class="material-icons">add</i> Añadir al carrito
                  </button>
                @endguest

                <a href="{{ url('/products') }}" type="button" class="btn btn-btn-outline-light btn-round">
                    <i class="material-icons">arrow_back</i> Regresar
                </a>
              </div>
              <div class="tab-content">
                <div class="tab-pane active text-center gallery" id="studio">
                  <div class="row">



                  </div>

                  <style>

.img-contenedor img {
-webkit-transition:all .9s ease; /* Safari y Chrome */
-moz-transition:all .9s ease; /* Firefox */
-o-transition:all .9s ease; /* IE 9 */
-ms-transition:all .9s ease; /* Opera */
width:100%;
}
.img-contenedor:hover img {
-webkit-transform:scale(1.2);
-moz-transform:scale(1.2);
-ms-transform:scale(1.2);
-o-transform:scale(1.2);

transform: scale(1.2);
}

                    </style>
                  <!--End row -->
                </div>
                <!--End tab pane -->
              </div>
              <!--End tab-content-->
            </div>
            <!--End Profile tabs -->
          </div>
          <!--End Col-md-6 -->
        </div>
        <!--End row -->
      </div>
      <!--End container -->
    </div>
  </div>
  <!--end contenido del perfil-->

  <!-- Modal -->
  <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">cantidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Form para poder enviar los datos -->
        <form method="post" action="{{ url('/cart') }}">
          {{ csrf_field() }}
          <!-- campo oculto donde se envia el id del producto -->
          <input type="hidden" name="product_id" value="{{ $product->id }}">

          <div class="modal-body">
            <input type="tel" onKeyPress="return evento(event)" class="form-control" maxlength="2" minlength="1" name="quantity" class="form-control" value="1">
          </div>
          <script >


function evento(e){
 var key = window.Event ? e.which : e.keyCode
 return (key >= 48 && key <= 57)
}
          </script>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>



@endsection

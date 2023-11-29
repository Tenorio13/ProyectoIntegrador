@extends('layouts.app')

@section('title',' Geo Plastic')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'landing-page sidebar-collapse')
<!-- estilos solo para esta pagina que no se aplicaron-->
@section('styless')
<style>

@media
  (-webkit-min-device-pixel-ratio: 2),
  (min-resolution: 192dpi) {
  img {
    background-image: url(examples/images/image-768.jpg);
  }
}

  .row{
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
  }

  .row > [class*='col-']{
    display: flex;
    flex-direction: column;
  }



.hero2{

  background-image: url('./img/header01.jpg');
}

.container {
      text-align: center;
    }

    h1 {
      color: #333;
    }

    p {
      color: #666;
      font-size: 18px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 20px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
    }

    .btn:hover {
      background-color: #2980b9;
    }
    .container {
      text-align: center;
      padding-top: 50vh; /* Ajusta esto según sea necesario para el espacio que quieres dejar arriba */
    }

    h1 {
      color: #333;
    }

    p {
      color: #666;
      font-size: 18px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 20px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #2980b9;
    }

</style>
@endsection

@section('content')

<div class="container">
    <h1>GeoPlastic se destaca en el mercado de filamentos para impresoras 3D </h1>
    <div class="container">


  </div>
    <div id="explora">
    <!-- Coloca aquí el contenido que deseas mostrar cuando se hace clic en "Explora" -->
  </div>
  </div>

  <div class="container">

    <!-- Products section -->
    <div class="section text-center">



    <section class="slider_section">
          <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
             <div class="carousel-inner">
                <div class="carousel-item active">
                   <img class="first-slide   img-fluid  border" src="{{ asset('img/car1.jpg') }}" alt="First slide" >

                </div>
                <div class="carousel-item">
                   <img class="second-slide  img-fluid border" src="{{ asset('img/car2.jpg') }}" alt="Second slide" >

                </div>
                <div class="carousel-item">
                  <img class="second-slide img-fluid  border" src="{{ asset('img/car3.jpg') }}" alt="Second slide" >

               </div>
               <div class="carousel-item">
                <img class="second-slide img-fluid border" src="{{ asset('img/car4.jpg') }}" alt="Second slide" >

             </div>

             </div>
             <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
             <i class='fa fa-angle-left'></i>
             </a>
             <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
             <i class='fa fa-angle-right'></i>
             </a>
          </div>
        </section>













        <div class="row">
    @foreach($allProducts as $product)
    <div class="col-md-4">
        <div class="card product-card">
            <img src="{{ asset('images/products/'.$product->featured_image_url) }}" alt="Product Image"
                class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ url('/products/'. $product->id) }}">{{ $product->name }}</a>
                </h5>
                <p class="card-text">{{ $product->description }}</p>

                <p class="card-text">
                    <strong>Price:</strong> &dollar;{{ $product->price }}
                </p>
            </div>
            <div class="card-footer">
            <a href="{{ url('/products/'. $product->id) }}" class="btn btn-primary btn-lg btn-block">Agregar al Carrito</a>

            </div>
        </div>
    </div>
    @endforeach
</div>

      <div class="text-center">
        <a href="{{ url('/products') }}" type="button" class="btn btn-outline-primary  btn-round">
          <i class="material-icons">add</i> Ver más
        </a>
      </div>
  </div>


  </div>



  <!--end principal content-->
@endsection

@section('scripts')
  <script src="{{ asset('/js/typeahead.bundle.min.js') }}"> </script>
  <script>
    $(function(){
      // Inicializamos el motor de busqueda que realmente hace las sugerencias
      // bundle: una agrupacion de ambos
      var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '{{ url("/products/json") }}'
      });

      // Inicializamos typeahead sobre el input de busqueda
      $('#search').typeahead({
        //propiedades
        hint: true,
        highlight: true,
        minLength: 1
      },{
        // dataset
        name: 'products',
        source:products
      });

    });
  </script>
@endsection

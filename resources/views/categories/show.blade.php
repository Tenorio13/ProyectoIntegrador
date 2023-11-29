@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')

@section('content')
  <!--portada header-->
  <style>

.hero-b{
  background: linear-gradient(170deg, #0B87A9 64%, #f0f1f3 30%); 
}

</style>
<section class="hero hero-b d-flex justify-content-center align-items-center">
 
       <div class="row">


           <div class="col-lg-6 col-12">
             <br><br><br><br><br><br>
           </div>

       </div>
  </div>
</section>

  <!-- contenido del perfil -->
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">

              
              <div class="avatar">
                <img src="{{asset('images/products/'.$category->featured_image_url) }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
               
              </div>

              @if(session('notification'))
                <div class="alert alert-success text-center">
                  {{ session('notification') }}
                </div>
              @endif

              <div class="name">
                <h3 class="title">{{ $category->name }}</h3>
              </div>
              <!--End name-->
            </div>
            <!--End profile -->
          </div>
        </div>

        <div class="description text-center">
          <p>{{ $category->description }}</p>
        </div>

        <div class="section text-center">
          <h2 class="title">Elige el producto de tu preferencia amig@!</h2>
          <div class="team">
              <div class="row">
                  @foreach($products as $product)
                  <div class="col-md-4">
                      <div class=" card team-player">
                          <div class="card card-plain">
                              <div class="col-md-6 ml-auto mr-auto">
                                <div class="img-contenedor">
                                  <img src="{{ asset('images/products/'.$product->featured_image_url) }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                </div>


                                </div>
                              <h4 class="card-title"> <a href=" {{ url('/products/'. $product->id) }}"> {{ $product->name }}  </a>
                                  <br>
                                  <small class="card-title">&dollar; {{ $product->price}}</small>
                              </h4>
                              <div class="card-body">
                                  <p class="card-description">{{ $product->description }} </p>
                              </div>
                              <div class="card-footer justify-content-center">
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                <div class="text-center">
                  {{ $products->links("pagination::bootstrap-4") }}
              </div>
              </div>
            </div>
            <!--End container -->
          </div>
        </div>
  <!--end contenido del perfil-->
@endsection
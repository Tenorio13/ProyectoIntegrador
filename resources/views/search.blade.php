@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<br><br><br>





<!-- Contenido del perfil -->
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        @if(session('notification'))
                            <div class="alert alert-success text-center">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <br><br>
                    </div>
                    <!-- Fin de perfil -->
                </div>
            </div>

            <div class="section text-center">
                <h3 class="title">Resultados para: {{ $query }}</h3>
                <div class="team">
                    <div class="description text-center">
                        <p>Se encontraron: {{ $products->count() }} coincidencias</p>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <img src="{{ asset('images/products/'.$product->featured_image_url) }}"
                                        alt="Product Image" class="card-img-top">
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
                                        <a href="{{ url('/products/'. $product->id) }}"
                                            class="btn btn-primary btn-lg btn-block">Agregar al Carrito</a>
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
    </div>
</div>

  <!--end contenido del perfil-->
@endsection

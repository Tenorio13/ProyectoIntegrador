@extends('layouts.app')
@section('title',' Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

<br><br><br>
<div class="main main-raised">
    <div class="profile-content">

    <div class="container">

        <div class="section text-center">
        @if (session('notification'))
          <div class="alert alert-success text-center">
              { session('notification') }}
          </div>
        @endif
        <h2 class="title"></h2>
        <div class="team">

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
      </div>
        <div class="text-center">
          {{ $allProducts->links("pagination::bootstrap-4") }}
        </div>
    </div>

    </div>

</div>

</div>

@endsection

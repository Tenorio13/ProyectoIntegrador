@extends('layouts.app')

@section('title','Geo Plastic')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
 

 
    <div class="section container">

      <center>
        <div class="card  " >

                      <div class=" text-center" >
                          
                      
                                     <br><br> 
                            <span class="login100-form-title p-b-34 p-t-27">
                              <h2 class="text-center title">Editar producto</h2>

                          </span>
          
                        </div>
                   


      <h2 class="title text-center">{{ $foundProduct->name }} </h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="form" method="POST" action="{{ url('/admin/products'.$foundProduct->id.'/edit') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre del producto" value="{{ $foundProduct->name }}">
              <small id="name" class="form-text text-muted">Debes especificar un nombre</small>
            </div>
          </div>
             <script>
               function evento(e){
 var key = window.Event ? e.which : e.keyCode
 return (key >= 48 && key <= 57)
}
              </script>
          <div class="col-md-6">
            <div class="form-group">
              <input type="tel"  onKeyPress="return evento(event)" maxlength="6" minlength="1" step="0.01" aria-describedby="price" class="form-control" name="price" placeholder="Precio" value="{{ $foundProduct->price }}">
              <small id="price"   class="form-text text-muted">El Precio es obligatorio</small>
            </div>
          </div>     
        </div>

      
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="Descripcion breve"
              value= "{{ $foundProduct->description }}">
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group"
            <label for="inputState" class="control-label">Seleccionar Categoria</label>
              <select id="inputState" class="form-control" name="category_id">
                @foreach($categories as $category)
                  <option value="{{$category->id }}" 
                    @if($category->id == old('category_id', $foundProduct->category_id)) 
                      selected 
                    @endif>
                  {{$category->name}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="desc">Descripcion detallada</label>
            <textarea class="form-control" name="desc" rows="3"> {{ $foundProduct->name }} </textarea>
        </div>

          <button type="submit" class="btn btn-success">Actualizar</button>
        
            <a class="btn btn-danger" href="{{ url('/admin/products') }}">Cancerlar edición
            </a>
        </form>
      </div>
      <!--End Registro de producto -->
    
    </div>
    <!--end principal content-->
  </div>
  <!--End Registro de producto -->
  
  </div>
  
  </div>
           
  </center>
  
  
  </div>
  <!-- end team -->
 
  
@endsection

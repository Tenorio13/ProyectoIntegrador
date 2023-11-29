@extends('layouts.app')

@section('title','Geo Plastic')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  
  <!-- Header -->
  <!-- end of header -->
<!-- end of header -->



  
    <div class="section container">
      <center>
        <div class="card  " >

                      <div class=" text-center" >
                          
                      
                                   
                            <span class="login100-form-title p-b-34 p-t-27">
                              <h2 class="text-center title">Registrar nuevo producto</h2>

                          </span>
          
                        </div>
                    

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="form" method="POST" action="{{ url('/admin/products') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" onkeypress="return soloLetras(event)" maxlength="30" minlength="4"  class="form-control" name="name" aria-describedby="name" placeholder="ESCRIBIR" required>
              <small id="name" class="form-text text-muted">NOMBRE</small>
            </div>
          </div>
         <script>
           
           function soloLetras(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = [8, 37, 39, 46];
 
     tecla_especial = false
     for(var i in especiales) {
         if(key == especiales[i]) {
             tecla_especial = true;
             break;
         }
     }
 
     if(letras.indexOf(tecla) == -1 && !tecla_especial)
         return false;
 }
 function evento(e){
 var key = window.Event ? e.which : e.keyCode
 return (key >= 48 && key <= 57)
}
           </script>
          <!-- Precio -->
          <div class="col-md-6">
            <div class="form-group">
              <input type="tel"  onKeyPress="return evento(event)" maxlength="6" minlength="1" aria-describedby="price" class="form-control" name="price" placeholder="ESCRIBIR" required>
              <small id="price" class="form-text text-muted">PRECIO</small>
            </div>
          </div>
              
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="ESCRIBIR" required>
              <small id="name" class="form-text text-muted">DESCRIPCION</small>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group"
            <label for="inputState" class="control-label">Seleccionar una Categoria</label>
              <select id="inputState" class="form-control" name="category_id" required>
                
                <option value="0" selected>General</option>
                @foreach($categories as $category)
                  <option value="{{$category->id }}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <!-- -->
        <div class="form-group">
            <label for="desc">ESCRIBIR LOS DETALLES  MAS RELEVANTES</label>
            <textarea class="form-control" name="desc" rows="3" required></textarea>
            <small id="name" class="form-text text-muted">DETALLES DEL PRODUCTO</small>

        </div>

          <button type="submit" class="btn btn-success">Resgistrar</button>
          <a href="{{ url('/admin/products') }}" type="button" class="btn btn-danger">Cancelar</a>

        </form>

    </div>
    <!--End Registro de producto -->
  
  </div>

</div>
             
</center>
  
  
</div>
<!-- end team -->
</div>
<!-- end section -->


  <!--end principal content-->
@endsection
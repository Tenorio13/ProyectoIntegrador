@extends('layouts.app')

@section('title','Geo Plastic')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
   
   

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
    </script>
  
    <div class="section container">

      <center>
        <div class="card  " >

                      <div class=" text-center" >
                          
                         
                            <span class="login100-form-title p-b-34 p-t-27">
                              <h2 class="text-center title">Editar categoria</h2>

                          </span>
          
                        </div>
                   


      <h2 class="title text-center"> {{ $category->name }} </h2>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <form class="form" method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="name" aria-describedby="name" placeholder="Nuevo nombre" value="{{ $category->name }}">
            </div>
          </div>

         
        </div>

      
        <div class="form-group">
          <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="description" aria-describedby="description" placeholder="Actualizar descripcion " value="{{ $category->description }}">
        </div>


        <button type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn btn-danger" href="{{ url('/admin/categories') }}" >
Cancerlar edición</a>
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
</div>
<!-- end section -->


@endsection
@extends('layouts.app')

@section('title','Geo Plastic')

@section('content')
<style>
  body{
      background-color: rgb(255, 255, 255);
  }
  .imglogin{
    border-radius:50px;
  }
  </style>
<!--El header, -->
<section id="banner_parallax" class="slide_banner1">
  <div class="container">
     <div class="row">
      <div class="col-md-6">
        <div class="full">
           <div class="slide_cont">
              <br>
           </div>
        </div>
     </div>
      <div class="container">
        <div class="row">
          <div class=" col-md-6 ml-auto mr-auto">

    
          
            <center>
                <div class="card  " >
               
              
                      
                  
          <div class=" text-center" >
                                  
                                <span class="login100-form-logo">
                                  <img src="https://res.cloudinary.com/dhcktedjr/image/upload/c_scale,h_80,w_180/v1696912416/f9b0vshknelfdauek7pf.svg" class="imglogin">
                                </span><br>
                                @if (session('notification'))
                                <div class="alert alert-success text-center">
                                    {{ session('notification') }}
                                </div>
                            @endif
                                    <span class="login100-form-title p-b-34 p-t-27">
                                      <h2 class="text-center title" style="font-size:18px;">Te enviamos un codigo de verificación a tu correo.</h2>
    
                                  </span>
                  
                                </div>
                            <h4 class="text-center description"> Escribe el codigo y correo</h4>
                <center>
                    <form class="form-horizontal" method="POST" action="{{ url('reset') }}">
                        {{ csrf_field() }}


                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">contact_mail</i>
                            </span>
                        </div>
        
                        <input id="email" type="email" maxlength="40" minlength="10" class="form-control" name="email" placeholder="email" value="{{ $email }}" required autofocus>
                       
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                        </div>
                        <span id="emailOK" style="font-size:15px;"></span>
                      
                        <div class="input-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                          <span class="input-group-text">
                          <i class="material-icons">qr_code_2</i>
                          </span>
                                           
                          <input id="codigo" type="tel"  onKeyPress="return evento(event)" class="form-control" maxlength="6" minlength="6"  name="codigo" placeholder="Codigo" value="{{ old('codigo') }}" required autofocus>
                          @if ($errors->has('codigo'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('codigo') }}</strong>
                              </span>
                          @endif
                          
                      </div>


                        
                      </center >
                        
                        
                        <div class="form-group">
                          <div class="col-md-4 ml-auto mr-auto text-center">
                          <button type="submit" class="btn btn-success">
                                  Restablecer                              </button>
                           
                          </div>
                        </div> 
                        <script src="js/valite.js"></script>

                      </form>
                
              <script src="js/valite.js"></script>

  
  
  
  
  
  
  
  
  
  
  
            </div>
         
      </div>
   
    </center>
</div>
</div>
</div>
@endsection

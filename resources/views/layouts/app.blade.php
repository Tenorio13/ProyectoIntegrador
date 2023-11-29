<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8" />

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title','Geo Plastic')
  </title>
  <style>












    .site-footer
{
  background:black;

  font-size:15px;
  line-height:24px;
  color:#eceee8;
}
.site-footer hr
{
  border-top-color:#ffffff;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;

}
.site-footer
{
  color:#ffffff;
}
.site-footer a:hover
{
  color:#ffffff;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links
{
  color:#fafcf6
}



@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}

.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
footer{
  background-color:black;

  text-align: center;
  display: -webkit-flex;

}
.card-img{

  position: relative;
  top: -10px;

}


    </style>
  <meta charset="utf-8" />

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/cong.svg') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/cong.svg') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title','Equipo6')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />

  @yield('styles')

</head>


<body class="@yield('body-class')">
<style>
 .navbar-nav .nav-item {
    margin: 0 10px;

  }

  .navbar-nav .nav-link {
    color: #333;
    padding: 10px 15px;
    border-radius: 20px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;

  }

  .navbar-nav .nav-link:hover {
    background-color:#CACECF;

  }


  .admin-label {
    background-color:#CACECF;
    color: white;
    padding: 10px;
    text-align: center;
  }
    .navbar-brand {
        padding: 0; /* Elimina el relleno predeterminado */
    }

    .navbar-brand img {
        height: 40px; /* Ajusta la altura de la imagen según tus preferencias */
        width: auto; /* Permite que el ancho se ajuste automáticamente para mantener la proporción original */
    }
</style>

<!-- Your existing HTML code -->





<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Cambia el ícono de la hamburguesa a tres líneas -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>

    </button>

    <a class="navbar-brand" href="{{ url('/') }}">
        <img class="card-img" src="https://res.cloudinary.com/dhcktedjr/image/upload/c_scale,h_80,w_180/v1696912416/f9b0vshknelfdauek7pf.svg" alt="Administrador">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="color: #219043;"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
            <li class="nav-item" style="color: #219043;"><a class="nav-link" href="{{ url('/products') }}">Productos</a></li>
            <li class="nav-item" style="color:  #219043;"><a class="nav-link" href="{{ url('/nosotros') }}">Nosotros</a></li>


            @guest
            <li class="nav-item" style="color: #219043;"><a class="nav-link" href="{{ route('login') }}">Sesión</a></li>
            @else


        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:#219043 ;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="material-icons">face</i>
                </a>
                <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
                    @if(auth()->user()->admin)
                    <div class="dropdown-item admin-label">
                        <p style="color:#219043 ;">Administrador</p>
                    </div>
                    <a class="dropdown-item " style="color:  #219043 ;" href="{{ url('/admin/products') }}">Productos
                        <i class="material-icons">loyalty</i></a>
                    <a class="dropdown-item" style="color:  #219043 ;" href="{{ url('/admin/categories') }}">Categorías
                        <i class="material-icons">article</i></a>
                    <a class="dropdown-item" style="color:  #219043 ;" href="{{ url('/admin/ventas') }}">Ventas
                        <i class="material-icons">credit_score</i></a>
                    <a class="dropdown-item" style="color:#219043 ;" href="{{ url('/admin/usuarios') }}">Usuarios
                        <i class="material-icons">manage_accounts</i></a>
                    <a class="dropdown-item" style="color: #219043 ;" href="{{ url('/admin/index') }}">Buzón
                        <i class="material-icons">mail</i></a>
                    @endif
                    <a class="nav-link disabled" style="color: #219043 ;" href="{{ url('/home') }}">Mi Carrito
                        <i class="material-icons" >shopping_cart</i></a>
                    <a class="dropdown-item" style="color: #219043 ;" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>


                </div>
            </li>
            @endguest
        <!-- Formulario de búsqueda -->
        <form class="form-inline my-2 my-lg-0 ml-auto" name="query" method="get" action="{{ url('search') }}">
            <input type="text" class="form-control mr-sm-2" placeholder="¿Nombre del producto?" name="query" id="search">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                <i class="material-icons">search</i>
            </button>
        </form>
    </div>
</nav>


  <!---End Menu de navegacion-->

    <!-- Seccion padre para CONTENIDO DE LA PLANTILLA-->
    <div class="wrapper"  >
      @yield("content")
    </div>
<style>

  </style>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <h6>Contacto</h6>
                <ul class="footer-links">
                    <li><strong>Teléfono:</strong> +52 5515851601</li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-6">
                <h6>Enlaces Rápidos</h6>
                <ul class="footer-links">
                    <!-- Add your quick links here -->
                </ul>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <p class="copyright-text">
                            <script>document.write(new Date().getFullYear())</script> Geo Plastic
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="social-icons">
                            <!-- Add your social media icons and links here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->



<!--end footer-->


    <!--   Core JS Files   -->

    <!-- {{ asset('js/app.js') }}-->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>

  <!-- Cargando solamente libreria de JS typehead para el buscador de welcome.php-->
  @yield('scripts')
</body>

</html>

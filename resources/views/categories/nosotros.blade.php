@extends('layouts.app')
@section('content')

<style>



      .about,
        .testimonial {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .about-info h2 {
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
        }

        .about-info p {
            font-size: 18px;
            color: #6c757d;
            line-height: 1.6;
        }

        .testimonial .contact-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .testimonial h4,
        .testimonial h2 {
            color: #343a40;
        }

        .testimonial p {
            font-size: 18px;
            color: #6c757d;
            line-height: 1.6;
          }
          .main {
            padding: 80px 0;
        }


        .card1 {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 30px;
        }

        .login100-form-logo img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .login100-form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }

        .description {
            color: #555;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
<!-- ABOUT -->
<section class="about section-padding pb-0" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto col-md-10 col-12">
                <div class="about-info">
                    <h2 class="mb-4" data-aos="fade-up">Innovamos: <strong>La mejor experiencia con el mejor servicio tecnológico.</strong></h2>
                    <p class="mb-4" data-aos="fade-up">Más sobre nosotros!</p>
                    <p data-aos="fade-up">GeoPlastic se destaca en el mercado de filamentos para impresoras 3D gracias a una ventaja competitiva única que combina sostenibilidad y calidad.</p>
                    <p data-aos="fade-up">Geo Plastic es una solución innovadora y ecológica para la comunidad de impresión 3D...</p>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
  .contact-image {
    max-width: 450px; /* Ajusta el ancho máximo según sea necesario */
    margin: 0 auto; /* Centra el div en la página, si es necesario */
  }

  .contact-image img {
    max-width: 100%; /* Asegura que la imagen no exceda el ancho del contenedor */
    height: auto; /* Mantiene la proporción de la imagen */
    display: block; /* Elimina el espacio adicional debajo de la imagen */
    margin: 0 auto; /* Centra la imagen dentro del div, si es necesario */
  }
</style>

<!-- TESTIMONIAL -->
<section class="testimonial section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
                <div class="contact-image" data-aos="fade-up">
                    <img src="img/logo.png" class="img-fluid" alt="website">
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-12" align="justify">

                <h2 class="mb-2" data-aos="fade-up" data-aos-delay="300">Misión:</h2>
                <p data-aos="fade-up" data-aos-delay="300">
                Nuestra misión es liderar la revolución sostenible en la impresión 3D al proporcionar filamento de alta calidad, fabricado a partir de botellas PET recicladas. Nos comprometemos a contribuir activamente a la reducción de desechos plásticos y a la preservación del medio ambiente, empoderando a nuestros clientes para que creen de manera responsable y sostenible.                </p>
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Visión:</h2>
                <p data-aos="fade-up" data-aos-delay="300">
                En GeoPlastic, aspiramos a ser reconocidos a nivel mundial como líderes en la fabricación de filamento para impresoras 3D sostenible. Buscamos inspirar a una comunidad global de impresores 3D a abrazar la sostenibilidad y a través de GeoPlastic, cambiar la forma en que el mundo imprime, reduce los residuos plásticos y cuida nuestro planeta            </p>
            </div>
        </div>
    </div>











<div class="container">
    <div class="card ">
        @if (session('notification'))
            <div class="alert alert-success text-center">
                {{ session('notification') }}
            </div>
        @endif
        <div class=" text-center">

            <br><br>
            <span class="login100-form-title p-b-34 p-t-27 title">
                CONTACTANOS
            </span>
        </div>
        <form class="contact-form" name="enviar" method="POST" action="{{ url('/message/new') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <label class="bmd-label-floating">¿Cuál es tu nombre?</label>
            <input type="text" onkeypress="return soloLetras(event)" name="name_user" maxlength="40" minlength="4" class="form-control" required autofocus>
        </div>
        <div class="col-md-6">
            <label class="bmd-label-floating">Tu correo electrónico</label>
            <input type="email" id="email" maxlength="40" minlength="10" name="email" class="form-control" required>
            <span id="emailOK" style="font-size: 15px;"></span>
        </div>
        <div class="col-md-6">
            <label class="bmd-label-floating">Asunto:</label>
            <input type="text" name="asunto" maxlength="25" minlength="4" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="exampleMessage" class="bmd-label-floating">Plantea tus dudas</label>
            <textarea type="text" name="message" maxlength="100" minlength="10" class="form-control" rows="4" id="exampleMessage" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 ml-auto mr-auto text-center">
            <button class="btn btn-success">
                Enviar respuesta
            </button>
        </div>
    </div>
</form>

        <script src="js/valite.js"></script>
    </div>
</div>

</div>
</section><!-- #team -->




  <!-- end main -->

@endsection

<!DOCTYPE html>
<html lang="es">
<header>
<title>Geo Plastic</title>
<meta charset="UTF-8">
<meta name="title" content="Laravel.DSM">
<meta name="description" content="Descripción del correo">
</header>
<body>

<style>
     


    
.nav-link :hover{	background-color:#077f94;color:#0789f3;}





.site-footer
{
background-color:#0a0a0a;
padding:45px 0 20px;
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
margin-top:5px;
letter-spacing:2px
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

.site-footer .social-icons a
{
width:40px;
height:40px;
line-height:40px;
margin-left:6px;
margin-right:0;
border-radius:100%;
background-color:#06000a
}
.copyright-text
{
margin:0
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
.social-icons
{
padding-left:0;
margin-bottom:0;
list-style:none
}
.social-icons li
{
display:inline-block;
margin-bottom:4px
}
.social-icons li.title
{
margin-right:15px;
text-transform:uppercase;
color:#a0d308;
font-weight:700;
font-size:13px
}
.social-icons a{
background-color:#91cf0b;
color:#91cf0b;
font-size:16px;
display:inline-block;
line-height:44px;
width:44px;
height:44px;
text-align:center;
margin-right:8px;
border-radius:100%;
-webkit-transition:all .2s linear;
-o-transition:all .2s linear;
transition:all .2s linear
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
.social-icons a.facebook:hover
{
background-color:#118aaf
}
.social-icons a.twitter:hover
{
background-color:#118aaf
}
.social-icons a.linkedin:hover
{
background-color:#118aaf
}
.social-icons a.dribbble:hover
{
background-color:#118aaf
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
padding: 0.9375rem 0;
text-align: center;
display: -webkit-flex;
/* Safari */
/* Safari 6.1+ */
display: flex;
}
  body{
      background-color: rgb(255, 255, 255);
  }
 strong{
     font-size:22px;
     color: #151799;

 }
 p{
     font-family: 'lato': 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     font-size: 19px;
   
 }

  </style>

<section id="banner_parallax" class="slide_banner1">
  <div class="container">
     <div class="row">
      <div class="col-md-6">
       
     </div>
      <div class="container">
        <div class="row">
          <div class=" col-md-6 ml-auto mr-auto">

    
          
            <center>
Geo Plastic
<br ></br>
<strong>Estimado cliente: </strong><h1>{{ $nombre }}</h1><br>
<strong>Correo: </strong><h1>({{ $correo }})</h1><br>
<br>
<br>
<strong>Asunto: </strong> <h1>{{ $asunto }}</h1><br><br>

    <strong>Notificamos: </strong><h1>({{ $mensaje }})</h1><br>
<br><br>
</div>
                 
</center>

</div>
</div>
</div>



<footer class="site-footer" >
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-6">
<h6>Sobre nosotros</h6>
<div class="text-justify" tex-align="justify">  
Geo Plastic: GeoPlastic es una solución innovadora y ecológica para la comunidad de impresión 3D. Nuestro filamento de alta calidad está fabricado a partir de botellas de PET recicladas, contribuyendo así a la reducción de desechos plásticos y al cuidado del medio ambiente. GeoPlastic ofrece una combinación perfecta de rendimiento y sostenibilidad, permitiéndote materializar tus proyectos creativos con la confianza de estar apoyando la reutilización de uno de los materiales menos biodegradables del planeta. Únete a la revolución ecológica de la impresión 3D con GeoPlastic y da vida a tus ideas mientras cuidas nuestro mundo
</div>
</div>

<div class="col-xs-6 col-md-3">
<h6>UTVT</h6>
<ul class="footer-links">
<li>IDGS-101</li>
<span class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Telefono:</span>

<strong class="d-block py-3 pl-5 text-white" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-phone mr-2"></i> +52 553223244</strong>

</ul>
</div>



</ul>
</div>
</div>
<hr>
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-6 col-xs-12">
<p class="copyright-text">         <script>  document.write(new Date().getFullYear()) </script>  
  Geo Plastic
</p>
</div>


<div class="col-md-4 col-sm-6 col-xs-12">
<ul class="social-icons">
<li><a class="facebook" href="#">facebook<i class="fa fa-facebook"></i></a></li><br>
<li><a class="twitter" href="#">twitter<i class="fa fa-twitter"></i></a></li>

</ul>
</div>
</div>
</div>
</div>
</footer>  
</body>
</html>
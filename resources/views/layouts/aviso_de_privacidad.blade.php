<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(dash/images/cios/pexels-fauxels-3183150_mobile.jpg) !important;
            background-attachment: unset;
        }
        .event-item-classic{
          flex-direction: row-reverse !important;
        }
      }
    </style>
  </head>
  <body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="dash/images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      @include('layouts.header')
      <!-- Swiper-->
      <section class="parallax-container" id="portada" data-parallax-img="dash/images/cios/pexels-fauxels-3183197.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Aviso de Privacidad</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Aviso de Privacidad</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Privacy Policy-->
      <section class="section section-md bg-default">
              <div class="container">
          <h2>Aviso de Privacidad</h2>
          <!-- Terms list-->
          <dl class="list-terms">
            <dt class="heading-6">¿Quiénes somos?</dt>
            <dd>CIO's LATAM, mejor conocido como CIO's LATAM , con domicilio en calle CDMX Insurgentes San Borja, colonia Miguel Hidalgo, ciudad Ciudad de México, municipio o delegación Miguel Hidalgo, c.p. 03100, en la entidad de Mex., país Mexico , y portal de internet contacto@ciosmexicanos.com , es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente: </dd>
            <br>
            <dd>De manera adicional, utilizaremos su información personal para las siguientes finalidades secundarias que no son necesarias para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención:<br>
            <br><span class="font-italic">Verificar Identidad.</span>
            <br><span class="font-italic">Prospección comercial.</span>
          </dd>
            <dt class="heading-6">¿Para qué fines utilizaremos sus datos personales?	</dt>
            <dd>En caso de que no desee que sus datos personales sean tratados para estos fines secundarios, desde este momento usted nos puede comunicar lo anterior a través del siguiente mecanismo: <br></dd>
            <br><span class="font-italic">Mail.</span>
            <dd> <br>La negativa para el uso de sus datos personales para estas finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros. <br></dd>
            <dt class="heading-6">¿Dónde puedo consultar el aviso de privacidad integral?	</dt>
            <dd>Para conocer mayor información sobre los términos y condiciones en que serán tratados sus datos personales, como los terceros con quienes compartimos su información personal y la forma en que podrá ejercer sus derechos ARCO, puede consultar el aviso de privacidad integral en: <br></dd>
            <br><span class="font-italic">A través de Internet.</span>
          </dl>
        </div>
      </section>
      <?php
        //include('api_block_partners.php');
      ?>
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
  </body>
</html>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/portadaNuevaMovil.png) !important;
            background-attachment: unset;
        }
      }
    </style>

  </head>
  <body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/dash/images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
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
      <section class="parallax-container" id="portada" data-parallax-img="dash/images/cios/portadaNueva.png">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Conocenos</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Conocenos</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-default text-center">
        <div class="container">
          <h3>¿Quienes Somos?</h3>
          <div class="row row-50">
            <!-- Owl Carousel-->
            <div class="owl-carousel" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
              <div class="pricing-corporate">
                <h5 class="pricing-corporate-title">Nuestra Misión</h5>
                <ul class="pricing-corporate-list">
                  <li>Fomentar el desarrollo y promover el uso y aprovechamiento de las Tecnologías de la Información y las Comunicaciones en México, tomando como base En Mexico y LATAM experiencia y conocimiento de nuestros asociados.</li>
                </ul>
              </div>
              <div class="pricing-corporate box-pricing-selected">
                <h5 class="pricing-corporate-title">Nuestra Visión</h5>
                <ul class="pricing-corporate-list">
                  <li>Ser reconocidos como un organismo competente, experto e influyente para la toma de decisiones en materia de TIC's en las organizaciones del ámbito Nacional e Internacional</li>
                  <li>Extended Access</li>
                </ul>
              </div>
              <div class="pricing-corporate">
                <h5 class="pricing-corporate-title">Objetivos</h5>

                <ul class="pricing-corporate-list">
                  <li>Posicionar a CIO's LATAM como un organismo reconocido que influya en la definición de estrategias, políticas, evaluación, dictamen y certificación en las diferentes disciplinas que conforman la industria de las Tecnologías de la Información y las Comunicaciones.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>      
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 pr-xl-5"><img src="/dash/images/image-3-conocenos.jpeg" alt="" width="518" height="430"/>
            </div>
            <div class="col-lg-6">
              <div class="text-with-divider">
                <div class="divider"></div>
                <h4>CIO's LATAM es una comunidad inspiradora que fomenta la unión y el apoyo entre sus asociados basados en sus propias experiencias</h4>
              </div>
              <p>Somos una Asociación Civil fundada en diciembre del 2012. Se crea como un espacio de participación e intercambio de experiencias, conocimientos y visiones para los responsables de encausar y dar sentido al uso y aprovechamiento de las Tecnologías de Información y Comunicaciones (TIC), en las Organizaciones. La participación de los CIOs de los distintos sectores y regiones del país le permitirá a la asociación consolidarse como un grupo que influya de manera positiva y responsable en la toma de decisiones sobre TICs, en beneficio de Mexico & LATAM.</p>
            </div>
          </div>
        </div>
      </section>      
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
  </body>
</html>
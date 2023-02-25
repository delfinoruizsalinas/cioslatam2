<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/pexels-andrea-piacquadio-789822_mobile.jpg) !important;
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
      <section class="parallax-container" data-parallax-img="/dash/images/cios/shaking-hands-2499629_960_720.jpeg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Contenido de nuestros Partners</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-default text-center">
        <div class="container">
          <h3 class="title-decorate title-decorate-center">Resumen de Partners</h3>
          <div class="row row-30">


            @foreach($detalle_contenido as $key => $pres)
              
              <div class="col-sm-6 col-lg-3">
                <a class="box-sponsor wow fadeInUp" href="partners-detalle/{{ $pres->id_resumen }}" target="_blank" data-wow-delay="{{ $key }}s">
                <h2 class="heading-font text-accent-3"><img src="{{ $pres->partner }}" /></h2>
                </a>
              </div>
            @endforeach  
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
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
                <h2 class="breadcrumbs-custom-title">Comité Ejecutivo</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Comité Ejecutivo</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-xl bg-gray-700 bg-decorate">
        <div class="container">
        <div class="row row-30 align-items-lg-end">
            <div class="col-lg-4 order-lg-2 text-lg-right wow-outer">
            <div class="wow slideInRight" style="visibility: visible; animation-name: slideInRight;">
                <h3 class="title-decorate">Comité Ejecutivo </h3>
            </div>
            </div>
            <div class="col-lg-8 order-lg-1 wow-outer">
            <div class="wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                <p class="text-opacity-80">CIO's LATAM es una comunidad inspiradora que fomenta la unión y el apoyo entre sus asociados basados en sus propias experiencias</p>
            </div>
            </div>
        </div>
        <div class="row row-30">
          @foreach($comite as $comit)
          <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="team-modern">
                <div class="team-modern-figure"> <img src="{{ $comit['imagen'] }}" alt="" width="375" height="290">
                    <ul class="team-modern-soc-list">
                        <li><a class="icon icon-sm fa-linkedin" href="{{ $comit['id'] }}" target="_blank"></a></li>
                        <li><a class="icon icon-sm fa-twitter" href="{{ $comit['tw'] }}" target="_blank"></a></li>
                    </ul>
                </div>
                <div class="team-modern-caption">
                    <h4><a class="team-name" href="#">{{ $comit['titulo'] }}</a></h4>
                    <p>{{ $comit['cargo'] }}</p>
                </div>
            </div>
          </div>
          @endforeach  
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
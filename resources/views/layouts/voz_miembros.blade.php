<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(images/cios/pexels-helena-lopes-705792-mobile.jpg) !important;
            background-attachment: unset;
        }
        .event-item-classic{
          flex-direction: row-reverse !important;
        }
    }
    .icono_evento{
          bottom: 20px;
          width: 60px;
          left: 20px;
          position: absolute;
          transition: .5s ease;
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
      <section class="parallax-container" id="portada" data-parallax-img="/dash/images/cios/pexels-helena-lopes-705792.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">CIO’s LATAM - La voz de nuestros Miembros</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">CIO’s LATAM - La voz de nuestros Miembros</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
     
      <!-- EVENTOS CIOS LIFES-->

      <section class="section section-lg bg-gray-1">
      <div class="container">
      <div class="wow-outer">
        <div class="wow slideInDown text-center">
          <!-- <h3 class="title-decorate title-decorate-center">CIO’s Life</h3>-->
          </div>
        </div>
        <div class="row row-50">
            @foreach($dataPostMiembro as $notiMiembro)

            <div class="col-md-6 col-lg-4">
              <div class="wow slideInDown" style="visibility: visible; animation-name: slideInDown;">
                <div class="post-modern post-modern-reverse">
                  <div class="post-modern-figure">
                    <a href="miembros-detalle/{{ str_replace(' ', '-', $notiMiembro->titulo) }}" target="_blank">
                      <img src="news/{{ $notiMiembro->imagen }}" width="370" height="255">
                    </a>
                  </div>
                  <div class="post-modern-caption">
                    <p class="post-modern-date"> 
                      <span class="icon mdi mdi-calendar"></span> {{ \Carbon\Carbon::parse($notiMiembro->created_at)->translatedFormat('d F, Y') }} 
                    </p>
                    <h4 class="post-modern-title">
                      <a href="miembros-detalle/{{ str_replace(' ', '-', $notiMiembro->titulo) }}" target="_blank">{{ Str::limit($notiMiembro->titulo, 75) }}...</a>
                    </h4>
                    <h6 class="post-minimal-title-2" style="color: rgba(0, 0, 0, 0.5);">Por {{ $notiMiembro->nom_contacto }} {{ $notiMiembro->ap_contacto }}</h6>
                  </div>
                </div>
              </div>
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
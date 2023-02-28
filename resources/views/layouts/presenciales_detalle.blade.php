<?php 
$url_site = 'http://188.166.16.108:1337';
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/pexels-helena-lopes-705792-mobile.jpg) !important;
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
      <section class="parallax-container" id="portada" data-parallax-img="/dash/images/cios/pexels-cottonbro-5989933.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Acerca de</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="{{ url('/cios-presenciales') }}">Eventos Presenciales</a></li>
                  <li class="active">ACERCA DE</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
     
      <section class="section section-lg bg-gray-1">
        <div class="container"> 
        <section class="section section-lg bg-default">
          <div class="container">
            <div class="row row-50 justify-content-lg-between">
              <div class="col-lg-6">
                <ul class="blog-post-meta">
                  <li><a class="badge" href="#">{{ $presenciales->data->attributes->ubicacion }}</a></li>
                  <li><span class="icon mdi mdi-calendar"></span>{{ $presenciales->data->attributes->fecha }}</li>
                </ul>
                <h3 class="blog-post-title">{{ $presenciales->data->attributes->titulo }}</h3>
                <div class="blog-post-content">{!! html_entity_decode($presenciales->data->attributes->descripcion) !!}</div>
              </div>
              <div class="col-lg-6 col-xl-5"><img src="{{ $presenciales->data->attributes->imagen->data->attributes->url }}" alt="" width="518" height="569"/>
              </div>
            </div>
          </div>
        </section>
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
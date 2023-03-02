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
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/">
    <img src="/dash/images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
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
 
      <section class="parallax-container" data-parallax-img="/dash/images/cios/office-620817_1280.jpeg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">{{ $info_partner[0]->nom_empresa }}</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8">
              <div class="team-item-info">
                <div class="team-item-info-name">
                      
                  <h3>{{ $info_partner[0]->nom_empresa }}</h3>
                </div>
                <ul class="team-info-list">

                  <li><span class="icon mdi mdi-account"></span>{{ $info_partner[0]->nom_contacto }}</li>
                  <li><span class="icon mdi mdi-phone"></span><a href="tel:#">{{ $info_partner[0]->num_sec }}</a></li>
                  <li><span class="icon mdi mdi-email-outline"></span><a href="mailto:#">{{ $info_partner[0]->correo_empresarial }}</a></li>
                  <li><span class="icon mdi mdi-web"></span><span id="getUrl" style="cursor:pointer;">{{ $info_partner[0]->website }}</span></li>
                </ul>
                <br>
                <h5>Resumen</h5>
                <p class="post-classic-meta"> {!! html_entity_decode($info_partner[0]->resumen) !!}</p>
                <br>
                <h5>Clientes</h5>
                <p class="post-classic-meta"> {!! html_entity_decode($info_partner[0]->clientes) !!}</p>
                <br>            
                <h5>Servicios</h5>
                <p class="post-classic-meta"> {!! html_entity_decode($info_partner[0]->servicios) !!}</p>
                <br>
                <h5>Años en el Mercado</h5>
                <p class="post-classic-meta"> {!! html_entity_decode($info_partner[0]->anios_mercado) !!}</p>
                <br>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="block-decorate-img">
                <div class="block-decorate-inner"><img src="{{ $ruta_partner }}" />
                </div>
              </div>
               
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>

    function validateURL(url) {
      if(/^(http(s):\/\/.)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/g.test(url)) {
        return 1;
      } else {
        return 0;
      }
    }
      $(document).ready(function(){
        
        $("#getUrl").click(function(){
          
          if (validateURL($(this).text()) == 1) {
            open($(this).text());
          }else{
            open('https://'+$(this).text());
          }
        });
      
      });
    </script>
  </body>
</html>
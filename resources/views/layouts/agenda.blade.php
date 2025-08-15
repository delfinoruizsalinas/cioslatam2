<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
  <title>{{  $title }}</title>

  <!-- facebook-->
  <meta property="og:title" content="{{  $title }}"/>
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta name="keywords" content="{{  $title }}"/>
  <meta property="og:image" content="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta property="og:image:url" content="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />

  <link rel="apple-touch-icon" href="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta name="apple-mobile-web-app-title" content="{{ $title }}">


    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/trd1h_.jpeg) !important;
            background-size: cover;
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
    .fs-2{
      font-size: 2rem !important;
    }
    .bi-green{
      width: 3em;
      height: 3em;
      color: #007bff!important;
    }
    .bi-red{
      width: 3em;
      height: 3em;
      color: #dc3545!important;
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
      <section id="portada">
        <div class="parallax-content context-dark"> 
          
            <img src="/dash/images/cios/trd1h_.jpeg" alt="CIO's LATAM Technology Retreat 2024 Hotel Las Brisas" class="img-fluid w-100">

        </div>
      </section>
      <section class="section-lg section bg-gray-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center wow-outer">
              <div class="wow slideInLeft">
                <h3 class="title-decorate title-decorate-center">Agenda <br>CIO’s LATAM Technology Retreat 2025 <br></h3>
                <p>Huatulco</p>
              </div>
            </div>
          </div>
          <div class="tabs-custom tabs-horizontal tabs-modern" id="tabs-1">
            <div class="row no-gutters">
              <div class="col-lg-4 col-xl-3 order-lg-2 wow-outer">
                <div class="wow slideInRight">
                  <ul class="nav nav-tabs nav-tabs-modern">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">4 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">5 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">6 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">7 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-toggle="tab">Ubica tu mesa</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-6" data-toggle="tab">Reserva tu Canción</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-7" data-toggle="tab">Encuestas Partners</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-8" data-toggle="tab">Encuesta Final</a></li>                    
                  </ul>
                </div>
              </div>
              <div class="col-lg-8 col-xl-9 order-lg-1 wow-outer">
                <div class="wow slideInLeft">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-1-1">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep7) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-2">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep8) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-3">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep9) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-4">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep10) !!}  

                        </div>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="tabs-1-5">

                      <div class="event-item-classic text-center">
                        
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="{{  url($dia7_file) }}" target="_blank">{{  $dia7_name }}</a></h4>

                          </h5>
                        </div>
                      </div>

                      <!--<div class="event-item-classic text-center">
                        
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="{{  url($dia8_file) }}" target="_blank">{{  $dia8_name }}</a></h4>

                          </h5>
                        </div>
                      </div> -->
                    
                      <div class="event-item-classic text-center">
                        
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="{{  url($dia8_file) }}" target="_blank">{{  $dia8_name }}</a></h4>

                          </h5>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="tab-pane fade" id="tabs-1-6">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                        <h4 class="event-item-classic-title"><a href="{{  url($booking) }}" target="_blank">{{  $booking }}</a></h4> 

                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-1-7">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          <h4 class="event-item-classic-title"><a href="{{  url($BePrime) }}" target="_blank">ENCUESTA VOSEDA</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($Syniti) }}" target="_blank">ENCUESTA EQUINIX</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($RakenDataGroup) }}" target="_blank">ENCUESTA HONNE SERVICES</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($Nutanix) }}" target="_blank">ENCUESTA THINK CARE</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($Appsell) }}" target="_blank">ENCUESTA INTELLIGENT NETWORKS</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($C3ntroTelecom) }}" target="_blank">ENCUESTA INFINYT - MORPHISEC</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($Equinix) }}" target="_blank">ENCUESTA BAMBÚ</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($Linko) }}" target="_blank">ENCUESTA STORE AGE</a></h4> 
                          <h4 class="event-item-classic-title"><a href="{{  url($NETjer) }}" target="_blank">ENCUESTA HUAWEI</a></h4>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-1-8">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          <h4 class="event-item-classic-title"><a href="{{  url($encuesta) }}" target="_blank">{{  $encuesta }}</a></h4> 
                        </div>
                      </div>
                    </div>

                  </div>
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
  </body>
</html>
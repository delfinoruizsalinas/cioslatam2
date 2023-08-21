<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
  <title>{{  $title }}</title>

  <!-- facebook-->
  <meta property="og:title" content="{{  $title }}"/>
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta name="keywords" content="{{  $title }}"/>
  <meta property="og:image" content="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta property="og:image:url" content="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />

  <link rel="apple-touch-icon" href="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta name="apple-mobile-web-app-title" content="{{ $title }}">


    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/trd.jpeg) !important;
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
          
            <img src="/dash/images/cios/trd.jpeg" alt="">

        </div>
      </section>
      <section class="section-lg section bg-gray-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center wow-outer">
              <div class="wow slideInLeft">
                <h3 class="title-decorate title-decorate-center">Agenda <br>CIO’s LATAM Technology Retreat 2023 Hotel Las Brisas</h3>
                <p>Ixtapa Zihuatanejo</p>
              </div>
            </div>
          </div>
          <div class="tabs-custom tabs-horizontal tabs-modern" id="tabs-1">
            <div class="row no-gutters">
              <div class="col-lg-4 col-xl-3 order-lg-2 wow-outer">
                <div class="wow slideInRight">
                  <ul class="nav nav-tabs nav-tabs-modern">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">7 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">8 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">9 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">10 Septiembre</a></li>
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
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-2">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep8) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-3">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep9) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-4">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep10) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
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
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

    .post-modern-caption {
      padding: 25px;
      background: #ffffff;
      height: 650px;
          }
          a[href*='tel'], a[href*='mailto'] {
      white-space: normal;
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
      <section class="parallax-container" id="portada" data-parallax-img="/dash/images/cios/pexels-helena-lopes-705792.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Noticias</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Noticias</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- api eventos master class -->   
      <!-- EVENTOS ENTRE AMIGOS-->
      <section class="section section-lg bg-gray-600">
        <div class="container">
          <div class="row row-50">
            @foreach($noticias as $noti)
            <div class="col-md-6 col-lg-4">
              <div class="wow fadeInUp">
                <div class="post-modern">
                    <div class="post-modern-caption">
                      <p class="post-modern-date">{{ $noti['fecha'] }}</p>
                      <a href="{{ $noti['link'] }}" target="_blank">  
                        <h4 class="post-modern-title" style="color:rgb(8, 71, 90);">
                            {{ $noti['titulo'] }}
                        </h4>
                        <img src="{{ $noti['img'] }}" alt="" width="370" height="255" />
                      </a>
                      <div class="post-modern-text">
                          {{ $noti['content'] }}...
                      </div>
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
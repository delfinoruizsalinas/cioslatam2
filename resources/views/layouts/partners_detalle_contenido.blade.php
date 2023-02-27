@inject('carbon', 'Carbon\Carbon')
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
      .sizeImage{
        padding: 0.25rem;
        background-color: #fff;
        border-radius: 0.25rem;
        max-height: 200px;
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
      <section class="parallax-container" data-parallax-img="/dash/images/cios/office-620817_1280.jpeg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title"> {{ $detalle_contenido[0]->titulo }}</h2>
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
          <div class="row row-50 justify-content-lg-between">
            <div class="col-lg-6 col-xl-5">
              <img src="{{ $detalle_contenido[0]->partner }}" class="float-left sizeImage">
              <ul class="blog-post-meta">
                <li>
                  
                </li>
                
                <li><span class="icon mdi mdi-clock"></span>
                  {{ \Carbon\Carbon::parse($detalle_contenido[0]->updated_at)->translatedFormat('d F, Y') }}
                </li>
              </ul>
              <h3 class="blog-post-title"> {{ $detalle_contenido[0]->titulo }}</h3>
              <div class="blog-post-content">
              {!! html_entity_decode($detalle_contenido[0]->resumen) !!}  
              </div>
            </div>
            <div class="col-lg-6 col-xl-5"><img src="/news/{{$detalle_contenido[0]->imagen}}" alt="" width="518" height="569"/>
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

<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>{{  $title }}</title>

    <!-- facebook-->
    <meta property="og:title" content="{{  $title }}"/>
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="keywords" content="{{  $title }}"/>
    <meta property="og:image" content="https://cioslatam.com/news/{{$detalle_contenido[0]->imagen }}">
    <meta property="og:image:url" content="https://cioslatam.com/news/{{$detalle_contenido[0]->imagen }}">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    
    <link rel="apple-touch-icon" href="https://cioslatam.com/news/{{$detalle_contenido[0]->imagen }}">
    <meta name="apple-mobile-web-app-title" content="{{ $title }}">

    @include('layouts.css')
    <style>
      @media (max-width: 600px) {
        #portada {
            background-image: url(/dash/images/cios/pexels-andrea-piacquadio-789822_mobile.jpg) !important;
            background-attachment: unset;
        }
        .share {
            right: 0;
            top: 50%;
            z-index: 2;
        }
        .fixed{
          position: fixed;
        }
        
      }
      .sizeImage{
        padding: 0.25rem;
        background-color: #fff;
        border-radius: 0.25rem;
        max-height: 200px;
      }
  
      div#social-links {
          margin: 0 auto;
          max-width: 500px;
      }
      div#social-links ul li {
          display: inline-block;
      }          
      div#social-links ul li a {
          padding: 20px;
          border: 1px solid #ccc;
          margin: 1px;
          font-size: 30px;
          color: #222;
          background-color: #ccc;
      }

      .social-toggler {
        margin-left: 5px;
        background: rgb(8, 71, 90);
        transition: .3s;
        width: 40px;
        height: 40px;
        border-radius: 3px;
        color: #fff;
        display: block;
        display: flex;
        align-items: center;
        justify-content: center;
        
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
              <ul class="blog-post-meta">
                <li>
                  <span class="icon mdi mdi-calendar"></span>
                  {{ \Carbon\Carbon::parse($detalle_contenido[0]->updated_at)->translatedFormat('d F, Y') }}
                </li>
              </ul>

              <ul class="blog-post-meta">
                <li>
                  <h6>Por {{ $detalle_contenido[0]->nom_contacto }} {{ $detalle_contenido[0]->ap_contacto }}</h6>
                </li>
                <li class="float-right">
                  <div class="share md:flex fixed md:static social-toggler">
                    <div onclick="javascript:url=window.document.URL;title=window.document.title;let shareDat={title,url};navigator.share(shareDat)" title="Compartir enlace" style="float:left;height: 32px;width: 32px;cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="white" d="M384 336a63.78 63.78 0 0 0-46.12 19.7l-148-83.27a63.85 63.85 0 0 0 0-32.86l148-83.27a63.8 63.8 0 1 0-15.73-27.87l-148 83.27a64 64 0 1 0 0 88.6l148 83.27A64 64 0 1 0 384 336Z"/></svg></div>
                  </div>
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
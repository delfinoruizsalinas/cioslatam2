<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{ $title }}</title>
    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(dash/images/cios/pexels-andrea-piacquadio-789822_mobile.jpg) !important;
            background-attachment: unset;
        }
      }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
      @include('layouts.header_admin')
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-1" data-loop="false" data-autoplay="5000" data-simulate-touch="false">
        <div class="swiper-wrapper">
          <div class="swiper-slide context-dark" data-slide-bg="/dash/images/cios/stock-1863880_1280.jpg">
            <div class="swiper-slide-caption section-lg">
              <div class="container">
                <div class="row justify-content-md-center">
                  <div class="col-md-9">
                    <h5><span data-caption-animate="fadeInLeft" data-caption-delay="150">{{ $fecha_hoy }}</span></h5>
                    <div class="divider" data-caption-animate="fadeInLeft" data-caption-delay="350"></div>
                    <h2 class="text-accent-3"><span data-caption-animate="fadeInLeft" data-caption-delay="250">Partners</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="/dash/images/cios/office-865091_1280.jpg" style="background-position: 50% 50%">
            <div class="swiper-slide-caption section-lg">
              <div class="container">
                <div class="row row-30 justify-content-md-center align-items-md-end">
                  <div class="col-md-2 order-md-2">

                  </div>
                  <div class="col-md-7 order-md-1">
                    <h5><span data-caption-animate="fadeInLeft" data-caption-delay="150">{{ $fecha_hoy }}</span></h5>
                    <div class="divider" data-caption-animate="fadeInLeft" data-caption-delay="350"></div>
                    <h2 class="text-accent-3"><span data-caption-animate="fadeInLeft" data-caption-delay="250">Socios comerciales premium</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-counter"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev fa-arrow-left"></div>
        <div class="swiper-button-next fa-arrow-right"></div>
      </section>
            
      
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
  </body>
</html>
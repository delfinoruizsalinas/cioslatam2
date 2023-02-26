<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5YSQ82VP1J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-5YSQ82VP1J');
    </script>
    <title>CIO's Latam - Comite Ejecutivo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/cios/logo_icono.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CRoboto:400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(images/cios/pexels-fauxels-3183150_mobile.jpg) !important;
            background-attachment: unset;
        }
        .event-item-classic{
          flex-direction: row-reverse !important;
        }
    }

    </style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <?php include 'header.php' ?>
      <!-- Swiper-->
      <section class="parallax-container" id="portada" data-parallax-img="images/cios/pexels-fauxels-3183197.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Comité Ejecutivo</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.php">Inicio</a></li>
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
                  <p class="text-opacity-80">CIO's Mexicanos & Latam es una comunidad inspiradora que fomenta la unión y el apoyo entre sus asociados basados en sus propias experiencias</p>
              </div>
              </div>
          </div>
          <div class="row row-30">
          <?php
            include('api_block_comite_ejecutivo.php');
          ?>  
          </div>
      </section>
      <!-- api partners -->   

      <?php
        include('api_block_partners.php');
      ?>


      <!-- Page Footer-->
      <?php include 'footer.php' ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
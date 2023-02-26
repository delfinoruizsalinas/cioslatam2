<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <?php
      include('api_block_headers_share.php');
    ?>  
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5YSQ82VP1J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-5YSQ82VP1J');
    </script>    
    <title>CIO's Latam - Presenciales detalle</title>

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
            background-image: url(images/cios/pexels-cottonbro-5989933_mobile.jpg) !important;
            background-attachment: unset;
        }
        .block-decorate-img{
            padding-left: 0px;
        }
    }
    </style>
    
  </head>
  <body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
      <!-- Swiper data-parallax-img="images/cios/pexels-cottonbro-5989933.jpg"-->
      <section class="parallax-container" id="portada" data-parallax-img="images/cios/pexels-cottonbro-5989933.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Acerca de</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="cios-presenciales.php">Eventos Presenciales</a></li>
                  <li class="active">ACERCA DE</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-gray-1">
        <div class="container"> 
          <?php
            include('api_block_eventos_id.php');
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
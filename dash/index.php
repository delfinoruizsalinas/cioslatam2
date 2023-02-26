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
    <title>CIO's Latam - Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/cios/logo_icono.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CRoboto:400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
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
      <section class="section section-lg section-main-bunner section-main-bunner-filter">
        <div class="main-bunner-img" style="background-image: url(&quot;images/cios/transformacion-digital.jpg&quot;); background-size: cover;"></div>
        <div class="main-bunner-inner">
          <div class="container">
            <div class="row row-50 justify-content-lg-center align-items-lg-center">
              <div class="col-lg-12">
                <div class="bunner-content-modern text-center">
                  <p class="text-accent-2">CIO's</p>
                  <div class="box-location">
                    <h4>Latam</h4>
                    <h5 class="text-secondary" id="date_now"></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- api events -->   

      <?php
        include('api_block_events.php');
      ?>
      
      <section class="section section-xl bg-gray-700 bg-decorate">
        <div class="container">
          <div class="row row-50 justify-content-lg-between align-items-lg-center">
            <div class="col-lg-6">
              <div class="box-img-animate"> 
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;: 0, &quot;x&quot;: 140,  &quot;smoothness&quot;: 50 }"><img src="images/cios/01.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;: 150, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"><img src="images/cios/09.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:70, &quot;x&quot;: -150,  &quot;smoothness&quot;: 50 }"><img src="images/cios/03.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:20, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"><img src="images/cios/04.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:60, &quot;x&quot;: 70,  &quot;smoothness&quot;: 50 }"><img src="images/cios/05.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:0, &quot;x&quot;: 140,  &quot;smoothness&quot;: 50 }"><img src="images/cios/08.png" alt=""></div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-5">
              <h3>Únete a Nuestra Comunidad</h3>
              <p class="text-opacity-80">CIO's Mexicanos & Latam es una asociación sin fines de lucro conformada por directores de TI de diferentes industrias en nuestro país. Siendo esta, una red de colaboración, integración y crecimiento de nuestros asociados. Es un privilegio poder ser parte de esta gran comunidad donde trabajamos conjuntamente para darle la fuerza y el soporte que requieren los CIO's en nuestro país y en el mundo. Hoy sabemos la importancia que tiene el rol de CIO en las Industrias. Si eres CIO activo o fuiste CIO en cualquier institución pública o privada te invito a sumarte a este gran equipo.</p>
   
              <div class="row row-50">
                <div class="col-md-6 col-lg-12">
                  <div class="box-icon-modern">
                    <div class="box-icon-inner decorate-triangle"></div>
                    <h4><mark>Algunos de nuestros miembros</mark></h4>
                  </div>
                </div>
              </div>
              <div class="row row-50">
                <div class="col-md-6 col-lg-12">
                  <div class="box-icon-modern">
                    <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-mustache-glasses icon-gradient-1"></span></div>
                    <div class="box-icon-caption">
                      <h4><a href="contacto.php">Hablemos</a></h4>
                      <p>¿Eres CIO, CTO, CDO o CISO y te interesa sumarte a nuestra comunidad ?
Escríbenos y en breve nos pondremos en contacto contigo.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>   
      <!-- api partners -->   

      <?php
        include('api_block_partners.php');
      ?>

      <section class="section section-xl bg-gray-700 bg-dots-light">
        <div class="container">
          <div class="row row-50">
            <div class="col-sm-6 col-lg-3">
              <article class="counter-classic">
                <div class="counter-classic-main">
                  <p>+</p><div class="counter">
                    <?php 
                      //url api eventos-virtuales                                                                           
                      $json = file_get_contents($url_site.'/api/miembros-actives/1');
                      // Decode the JSON string into an object
                      $obj = json_decode($json);
                      echo $obj->data->attributes->numero;       
                    ?>
                  </div>
                </div>
                <p class="counter-classic-title">Miembros activos conforman nuestra asociación</p>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <article class="counter-classic">
                <div class="counter-classic-main">
                  <div class="counter">87</div><p>%</p>
                </div>
                <p class="counter-classic-title">De nuestros asociados pertenecen a las principales industrias privadas</p>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <article class="counter-classic">
                <div class="counter-classic-main">
                  <div class="counter">13</div><p>%</p>
                </div>
                <p class="counter-classic-title">De nuestros asociados pertenecen al sector gobierno</p>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <article class="counter-classic">
                <div class="counter-classic-main">
                <!--<a class="button button-secondary button-sm" href="#"></a>-->
                </div>
                <p class="counter-classic-title">
                Somos una asociación que busca aumentar la participación de CxO (es decir, CIO | CTO | CDO) de diferentes industrias para delinear una agenda digital en temas de interés común como tendencias en tecnologías, herramientas y metodologías de vanguardia; 
                </p>
              </article>
            </div>
          </div>
        </div>
      </section>
   
      <!-- Page Footer-->
      <?php include 'footer.php' ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
    <script>
      moment.locale('es');

      $("#date_now").text(moment(Date.now()).format('LL'));
    </script>
  </body>
</html>
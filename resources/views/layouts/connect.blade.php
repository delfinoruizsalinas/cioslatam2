<?php 
$url_site = 'http://188.166.16.108:1337';
?>
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
      <section class="parallax-container" id="portada" data-parallax-img="/dash/images/cios/pexels-helena-lopes-705792.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">CIO’s - CIO's Connect</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">CIO’s - CIO's Connect</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
     
      <!-- EVENTOS PRESENCIALES-->
      <section class="section section-lg bg-default">
          <div class="container">
              <h3 class="title-decorate title-decorate-center text-center"><!--CIO’s Presenciales--></h3>
              <div class="row">
              <div class="col-12">
                  <div class="owl-carousel" data-items="1" data-md-items="2" data-lg-items="3" data-autoplay="true" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-margin="30" data-mouse-drag="false">
                  
                      <?php 
                          //url api eventos-virtuales                                                                           
                          $json = file_get_contents($url_site.'/api/evento-presencials?populate=imagen&sort[6]=fecha%3Adesc');
                          // Decode the JSON string into an object
                          $obj = json_decode($json);
                          // In the case of this input, do key and array lookups to get the values
                          foreach ($obj->data as $key => $value) {
                              
                              foreach($value->attributes->imagen as $item){

                                      $url = $item->attributes->url;
                              }
                            
                              //comite-ejecutivo-biografia.php?id='.$value->id.'
                              echo '<div class="wow slideInUp">
                                      <div class="post-classic">
                                      <div class="post-classic-figure"><a href="cios-connect-detalle/'.$value->id.'"><img src="'.$url.'" style="width: 370px; height: 255px;"/></a></div>
                                      <div class="post-classic-caption">
                                          <h4 class="post-classic-title"><a href="cios-connect-detalle/'.$value->id.'">'.$value->attributes->titulo.'</a></h4>
                                          <ul class="post-classic-meta">
                                          <li>'.$value->attributes->fecha.'</li>
                                          <li><a class="post-classic-tag-secondary-2 post-classic-tag" href="#">'.$value->attributes->ubicacion.'</a></li>
                                          </ul>
                                      </div>
                                      </div>
                                  </div>';
                          }           
                      ?>
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
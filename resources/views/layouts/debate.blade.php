<?php 
$url_site = 'http://188.166.16.108:1337';
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(images/cios/pexels-helena-lopes-705792-mobile.jpg) !important;
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
                <h2 class="breadcrumbs-custom-title">CIO’s - Mesa de Debate</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">CIO’s - Mesa de Debate</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
     
      <!-- EVENTOS MESA DE DEBATE-->

      <section class="section section-lg bg-gray-1">
      <div class="container">
      <div class="wow-outer">
        <div class="wow slideInDown text-center">
            <!-- <h3 class="title-decorate title-decorate-center">CIO’s Master Class</h3>-->
          </div>
        </div>
        <div class="row row-50">
          <?php 
            //url api eventos-virtuales                                                                           
            $json = file_get_contents($url_site.'/api/mesa-de-debates?populate=imagen&sort[2]=fecha%3Adesc');
            // Decode the JSON string into an object
            $obj = json_decode($json);
            // In the case of this input, do key and array lookups to get the values
            foreach ($obj->data as $key => $value) {
              
                $url ="";
                $link = "";
                $i = $key;
                $youtube ="";
                $fecha ="";
                $hora ="";
                $titulo ="";

                if(empty($value->attributes->link_pange)){
                    $link = '#';
                }else{
                    $link = $value->attributes->link_pange;                        
                }

                if(empty($value->attributes->youtube)){
                  $youtube = '#';
                }else{
                  $youtube = $value->attributes->youtube;                        
                }

                if(empty($value->attributes->fecha)){
                  $fecha = '';
                }else{
                  $fecha =  date("d-m-Y", strtotime($value->attributes->fecha));                         
                }
                
                if(empty($value->attributes->hora)){
                  $hora = '';
                }else{
                  $hora =  substr ($value->attributes->hora, 0, 5);                       
                }
                
                if(empty($value->attributes->titulo)){
                  $titulo = '#';
                }else{
                  $titulo = $value->attributes->titulo;                        
                }          
                
                foreach($value->attributes->imagen as $item){

                        if(empty($item->attributes->formats->small)){
                            $url = $item->attributes->url;
                        }else{
                            $url = $item->attributes->formats->small->url;                               
                        }
                }       
                echo '<div class="col-md-6 col-lg-4"><div class="post-modern"><div class="post-modern-figure"><a href="'.$youtube.'" target="_blank"><img src="'.$url.'" alt="" width="370" height="255"></a></div><div class="post-modern-caption"><p class="post-modern-date"> <span class="icon mdi mdi-calendar"></span> '.$fecha.' <span class="icon mdi mdi-clock"></span> '.$hora.'</p><h4 class="post-modern-title"><a href="'.$youtube.'" target="_blank">'.$titulo.'</a></h4></div></div></div>';
              }
                      
          ?>
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
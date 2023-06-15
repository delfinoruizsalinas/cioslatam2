<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <style>

    .icono_evento{
      bottom: 20px;
      width: 60px;
      left: 20px;
      position: absolute;
      transition: .5s ease;
    }

    .post-modern-caption1 {
      padding: 10px;
      background: #f7f7f7;
      height: 120px;
          }
          a[href*='tel'], a[href*='mailto'] {
      white-space: normal;
    }
    .post-modern-title1 {
      line-height: 15px;
      font-size: 12px;
      letter-spacing: -0.03em;
      margin-top: 5px;
    }
    .post-modern-date1 {
      font-weight: 400;
      color: rgba(0, 0, 0, 0.5);
      font-size: 10px;
      margin-top: 3px;  
    }
    .post-modern-date {
      font-size: 12px;
    }
    .post-minimal-title-1{
      float: left;
      width: 100%;
      line-height: 23px;
      font-size: 15px;
      font-weight: 500;
    }
    .post-minimal {
      margin-top: 10px;
    }
    .box-countdown-dark {

    padding: 25px;
    background: #003642;
    box-shadow: 0 4px 20px rgb(0 0 0 / 25%);
    border-radius: 7px;
    }
    .icon{
      font-size: 10px;
    }
    .nav-tabs-cteative .nav-link {
      position: relative;
      font-weight: 700;
      text-transform: none;
      font-size: 12px;
      letter-spacing: 0.1em;
      color: rgba(255, 255, 255, 0.4);
      background: transparent;
    }

    .event-item-classic-figure img{
        border-radius: 1%;
    }
    .post-corporate{
      height: 290px;
    }

    .post-minimal-title-2{
      float: left;
      width: 100%;
      line-height: 23px;
      font-size: 12px;
      /*font-weight: 500; */
    }
 
    @media only screen and (max-width: 600px) {
      .space-mobail{
        margin-top: 30px;
        text-align: center;
      }
      .mobile-center{
        text-align: center;
      }
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
      <section class="section section-lg section-main-bunner section-main-bunner-filter">
        <div class="main-bunner-img" style="background-image: url(&quot;/dash/images/cios/transformacion-digital.jpg&quot;); background-size: cover;"></div>
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
      
      <section class="section-lg bg-gray-200">
        <div class="container">

          <div class="row row-70 justify-content-xl-between">
            <div class="col-lg-8">
              <h3 class="wow slideInDown mobile-center"><a href="{{ url('/noticias') }}">Últimas Noticias</a></h3>
              <div class="row row-50 justify-content-center">
                @foreach($noticias as $noti)
                  <div class="col-md-6">
                    <div class="post-classic">
                      <a href="{{ $noti['link'] }}">
                        <img src="{{ $noti['img'] }}" alt="" width="370" style="height: 255px;">
                      </a>
                      <ul class="post-classic-meta">
                        <li>{{ $noti['fecha'] }}</li>
                      </ul>
                    </div>

                    <div class="post-classic-caption">
                      <h4 class="post-classic-title"><a href="{{ $noti['link'] }}">{{ Str::limit($noti['titulo'], 75) }}...</a></h4>
                    </div>

                  </div>
                @endforeach  
              </div>
            </div>
            <div class="col-lg-4 col-xl-4">
              <div class="block-aside">
                <div class="block-aside-item">
                  <h3 class="wow slideInDown" style="margin-bottom: 10px;"><a href="{{ url('/la-voz-de-nuestros-miembros') }}">La voz de nuestros Miembros</a></h3>
                  <div class="space-mobail"></div>
                  @foreach($dataPostMiembro as $notiMiembro)
                    
                    <div class="post-minimal">
                      <div class="row">
                        <div class="col-lg-4">
                          <a href="miembros-detalle/{{ str_replace(' ', '-', $notiMiembro->titulo) }}" target="_blank">  
                            <img class="rounded" src="news/{{ $notiMiembro->imagen }}" alt="" width="100%">
                          </a>
                          <p class="post-modern-date1">{{ \Carbon\Carbon::parse($notiMiembro->created_at)->translatedFormat('d F, Y') }}</p>
                        </div>
                         
                        <div class="col-lg-8">
                          <h5 class="post-minimal-title-1">
                            <a href="miembros-detalle/{{ str_replace(' ', '-', $notiMiembro->titulo) }}" target="_blank">  
                              {{ Str::limit($notiMiembro->titulo, 75) }}...
                            </a>
                          </h5>
                          <h6 class="post-minimal-title-2">Por {{ $notiMiembro->nom_contacto }} {{ $notiMiembro->ap_contacto }}</h6>
                        </div>
                          
                      </div>
                    </div>
                  @endforeach

                </div>
              </div>
            </div>
          <div>
        </div>
      </section>

      <section class="section-lg bg-default" style="padding: 0px 0;">
        <div class="container wow-outer">
          <h3 class="text-center wow slideInDown">Contenido de nuestros Partners</h3>
          <!-- Owl Carousel-->
          @if(count($dataPostPartner) >=3)
          <div class="owl-carousel owl-dots-dark wow fadeInUp" data-items="1" data-autoplay="true" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-margin="30" data-mouse-drag="false">
          @else
          <div class="owl-carousel owl-dots-dark wow fadeInUp" data-items="1" data-autoplay="true" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-margin="30" data-mouse-drag="false">
          @endif
            @foreach($dataPostPartner as $dataposts)
           
            <div class="post-corporate post-corporate-img-bg">
              <div class="post-corporate-bg" style="background-image: url(news/{{ $dataposts->imagen }} ); background-size: cover;"></div><a class="badge post-corporate-badge" href="partners-detalle-contenido/{{ str_replace(' ', '-', $dataposts->titulo) }}"><img src="{{ $dataposts->partner }}" style="height: 80px;"></a>
              <h4 class="post-corporate-title"><a href="partners-detalle-contenido/{{ str_replace(' ', '-', $dataposts->titulo) }}" target="_blank"> {{ Str::limit($dataposts->titulo, 40) }}</a></h4>
              
              <ul class="post-classic-meta">
                <li style="color: #ffffff;font-size: 12px"> {{ \Carbon\Carbon::parse($dataposts->updated_at)->translatedFormat('d F, Y') }}</li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </section>  
      
      <section class="section tabs-custom tabs-horizontal tabs-creative" id="tabs-1">
        <div class="container container-wide">
          <div class="row">
            <div class="col-lg-1 col-xl-2">
              <div class="tabs-creative-title">
                <h3 class="title-decorate title-decorate-left">Eventos</h3>
              </div>
            </div>
            <div class="col-lg-11 col-xl-10">
              <div class="nav-tabs-cteative-wrap">
                <ul class="nav nav-tabs nav-tabs-cteative">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">CIO’s Vlog</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">CIO's Connect</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">CIO’s Life</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">Programa “Entre Amigos”</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-toggle="tab">Mesa de Debate</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-6" data-toggle="tab">Master class</a></li>                                    
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="section-md bg-gray-1">
          <div class="container">
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tabs-1-1">
              <div class="wow-outer">
              <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-vlog') }}">CIO’s Vlog</a></h3>
              </div>
            </div>
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataVlog as $vlog)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="{{ $vlog['youtube'] }}" target="_blank">
                          <img src="{{ $vlog['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span> {{ $vlog['fecha'] }} <span class="icon mdi mdi-clock"></span> {{ $vlog['hora'] }}
                        </p>
                        <h4 class="post-modern-title">
                          <a href="{{ $vlog['youtube'] }}" target="_blank">{{ $vlog['titulo'] }}</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  @endforeach 
                </div>   
              </div>

              <div class="tab-pane fade" id="tabs-1-2">
              <div class="wow-outer">
                <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                  <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-connect') }}">CIO's Connect</a></h3>
                </div>
              </div>
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataPres as $pres)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="cios-connect-detalle/{{ $pres['id'] }}" target="_blank">
                          <img src="{{ $pres['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span> {{ $pres['fecha'] }}
                        </p>
                        <h4 class="post-modern-title">
                        <a href="cios-connect-detalle/{{ $pres['id'] }}" target="_blank">{{ $pres['titulo'] }}</a>
                        </h4>
                        <span class="location">{{ $pres['ubicacion'] }}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach  
                </div>  
              </div>
              <div class="tab-pane fade" id="tabs-1-3">
              <div class="wow-outer">
                <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                  <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-life') }}">CIO’s Life</a></h3>
                </div>
              </div>
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataLife as $life)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="{{ $life['youtube']  }}" target="_blank">
                          <img src="{{ $life['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span>{{ $life['fecha'] }}
                        </p>
                        <h4 class="post-modern-title">
                          <a href="{{ $life['youtube'] }}" target="_blank">{{ $life['titulo'] }}</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  @endforeach  
                </div> 
              </div>
              <div class="tab-pane fade" id="tabs-1-4">
              <div class="wow-outer">
                <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                  <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-entre-amigos') }}">Programa “Entre Amigos”</a></h3>
                </div>
              </div>                
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataAmigos as $amigos)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="{{ $amigos['youtube']  }}" target="_blank">
                          <img src="{{ $amigos['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span>{{ $amigos['fecha'] }}
                        </p>
                        <h4 class="post-modern-title">
                          <a href="{{ $amigos['youtube'] }}" target="_blank">{{ $amigos['titulo'] }}</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  @endforeach  
                </div> 
              </div>
           
              <div class="tab-pane fade" id="tabs-1-5">
              <div class="wow-outer">
                <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                  <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-mesa-de-debate') }}">Mesa de Debate</a></h3>
                </div>
              </div>                 
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataDebate as $debate)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="{{ $debate['youtube']  }}" target="_blank">
                          <img src="{{ $debate['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span>{{ $debate['fecha'] }}
                        </p>
                        <h4 class="post-modern-title">
                          <a href="{{ $debate['youtube'] }}" target="_blank">{{ $debate['titulo'] }}</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  @endforeach  
                </div> 
              </div>

              <div class="tab-pane fade" id="tabs-1-6">
              <div class="wow-outer">
                <div class="wow slideInDown text-center" style="visibility: visible; animation-name: slideInDown;">
                  <h3 class="title-decorate title-decorate-center"><a href="{{ url('/cios-master-class') }}">Master class</a></h3>
                </div>
              </div>                 
                <div class="event-item-classic wow slideInleft">
                  @foreach($dataMaster as $master)
                  <div class="col-md-6 col-lg-4">
                    <div class="post-modern">
                      <div class="post-modern-figure">
                        <a href="{{ $master['youtube']  }}" target="_blank">
                          <img src="{{ $master['url_img'] }}" alt="" width="370" height="255">
                        </a>
                      </div>
                      <div class="post-modern-caption">
                        <p class="post-modern-date">
                          <span class="icon mdi mdi-calendar"></span>{{ $master['fecha'] }}
                        </p>
                        <h4 class="post-modern-title">
                          <a href="{{ $master['youtube'] }}" target="_blank">{{ $master['titulo'] }}</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  @endforeach  
                </div> 
              </div>              

            </div>
          </div>
        </div>
      </section>
    
      <!-- api events -->   

      <?php
        //include('api_block_events.php');
      ?>
      
      <section class="section section-xl bg-gray-700 bg-decorate">
        <div class="container">
          <div class="row row-50 justify-content-lg-between align-items-lg-center">
            <div class="col-lg-6">
              <div class="box-img-animate"> 
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;: 0, &quot;x&quot;: 140,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/01.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;: 150, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/09.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:70, &quot;x&quot;: -150,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/03.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:20, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/04.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:60, &quot;x&quot;: 70,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/05.png" alt=""></div>
                <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:0, &quot;x&quot;: 140,  &quot;smoothness&quot;: 50 }"><img src="dash/images/cios/08.png" alt=""></div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-5">
              <h3>Únete a Nuestra Comunidad</h3>
              <p class="text-opacity-80">CIO's LATAM es una asociación sin fines de lucro conformada por directores de TI de diferentes industrias en LATAM. Siendo esta, una red de colaboración, integración y crecimiento de nuestros asociados. Es un privilegio poder ser parte de esta gran comunidad donde trabajamos conjuntamente para darle la fuerza y el soporte que requieren los CIO's en LATAM y en el mundo. Hoy sabemos la importancia que tiene el rol de CIO en las Industrias. Si eres CIO activo o fuiste CIO en cualquier institución pública o privada te invito a sumarte a este gran equipo.</p>
   
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
                      <h4><a href="{{ url('/contacto') }}">Hablemos</a></h4>
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
        //include('api_block_partners.php');
      ?>

      <section class="section section-xl bg-gray-700 bg-dots-light">
        <div class="container">
          <div class="row row-50">
            <div class="col-sm-6 col-lg-3">
              <article class="counter-classic">
                <div class="counter-classic-main">
                  <p>+</p><div class="counter">
                    {{ $members }}
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

      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
  </body>
</html>
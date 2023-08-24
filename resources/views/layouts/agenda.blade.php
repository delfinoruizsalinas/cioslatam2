<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
  <title>{{  $title }}</title>

  <!-- facebook-->
  <meta property="og:title" content="{{  $title }}"/>
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta name="keywords" content="{{  $title }}"/>
  <meta property="og:image" content="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta property="og:image:url" content="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />

  <link rel="apple-touch-icon" href="https://cioslatam.com/dash/images/cios/trd.jpeg">
  <meta name="apple-mobile-web-app-title" content="{{ $title }}">


    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/trd.jpeg) !important;
            background-size: cover;
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
    .fs-2{
      font-size: 2rem !important;
    }
    .bi-green{
      width: 3em;
      height: 3em;
      color: #28a745!important;
    }
    .bi-red{
      width: 3em;
      height: 3em;
      color: #dc3545!important;
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
      <section id="portada">
        <div class="parallax-content context-dark"> 
          
            <img src="/dash/images/cios/trd.jpeg" alt="CIO's LATAM Technology Retreat 2023 Hotel Las Brisas" class="img-fluid w-100">

        </div>
      </section>
      <section class="section-lg section bg-gray-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center wow-outer">
              <div class="wow slideInLeft">
                <h3 class="title-decorate title-decorate-center">Agenda <br>CIO’s LATAM Technology Retreat 2023 <br>Hotel Las Brisas</h3>
                <p>Ixtapa Zihuatanejo</p>
              </div>
            </div>
          </div>
          <div class="tabs-custom tabs-horizontal tabs-modern" id="tabs-1">
            <div class="row no-gutters">
              <div class="col-lg-4 col-xl-3 order-lg-2 wow-outer">
                <div class="wow slideInRight">
                  <ul class="nav nav-tabs nav-tabs-modern">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">7 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">8 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">9 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">10 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-toggle="tab">Ubica tu mesa</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8 col-xl-9 order-lg-1 wow-outer">
                <div class="wow slideInLeft">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-1-1">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep7) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-2">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep8) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-3">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep9) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-4">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep10) !!}  
                          <!--<p class="events-time">9:00 am - 11:00 am </p>
                          <h4 class="event-item-classic-title"><a href="schedule.html">Efficient Business Management Techniques</a></h4>
                          <h5>by <a href="speaker-page.html">Jane Smith</a>, <span>JCole  Co.</span>
                          </h5>
                          -->
                        </div>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="tabs-1-5">

                      <div class="event-item-classic text-center">
                        <div class="event-item-classic-figure">
                          <a href="{{  url($dia7_file) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="{{ $dia7_clase }} bi-file-pdf" viewBox="0 0 16 16">
                              <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                              <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                            </svg>
                          </a>
                        </div>
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="schedule.html">{{  $dia7_name }}</a></h4>

                          </h5>
                        </div>
                      </div>

                      <div class="event-item-classic text-center">
                        <div class="event-item-classic-figure">
                          <a href="{{  url($dia8_file) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="{{ $dia8_clase }} bi-file-pdf" viewBox="0 0 16 16">
                              <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                              <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                            </svg>
                          </a>
                        </div>
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="schedule.html">{{  $dia8_name }}</a></h4>

                          </h5>
                        </div>
                      </div>
                      
                      
                      <div class="event-item-classic text-center">
                        <div class="event-item-classic-figure">
                          <a href="{{  url($dia9_file) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="{{ $dia9_clase }} bi-file-pdf" viewBox="0 0 16 16">
                              <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                              <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                            </svg>
                          </a>
                        </div>
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title"><a href="schedule.html">{{  $dia9_name }}</a></h4>

                          </h5>
                        </div>
                      </div>
                      
                    </div>       
                  </div>
                </div>
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
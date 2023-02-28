<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(dash/images/cios/pexels-andrea-piacquadio-789822_mobile.jpg) !important;
            background-attachment: unset;
        }
      }
      .post-minimal-date1 {
          font-size: 15px;
          line-height: 17px;
          color: rgba(0, 0, 0, 0.5);
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
      @include('layouts.header_admin')
      <!-- Swiper-->
      <section class="section section-lg section-main-bunner">
        <div class="main-bunner-img" style="background-image: url(&quot;dash/images/cios/Inf_general.jpeg&quot;); background-size: cover;"></div>
        <div class="main-bunner-inner">
          <div class="container">
            <div class="row row-50 justify-content-lg-between align-items-lg-center">
              <div class="col-lg-2 order-lg-2 text-center text-lg-right mr-xl-2">
                <!--  
                <div class="block-video-button"><a href="https://youtu.be/NLOkpy6OOnM" data-lightgallery="item"><span class="icon fa-play icon-md"></span></a></div>
                -->
              </div>
              <div class="col-lg-9 col-xl-8 order-lg-1">
                <h5 class="bunner-location"><span class="icon mdi mdi-map-marker icon-secondary"></span><a class="text-opacity-80" href="#"></a>Ciudad de México, <span id="date_now"></span></h5>
                <h1 style="text-transform: none;">Actualizar Información General</h1>
                <div class="countdown-gradient">
                  <div class="countdown" data-type="until" data-time="17 Aug 2020 16:00" data-format="dhms"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('layouts.alert');

      <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-9 col-lg-7">
            <h3>Actualizar Información General</h3>
              <!-- RD Mailform-->
              <form class="rd-form rd-form-centered" action="/actualizar-informacion-general" method="post">
                  @csrf
                  <input id="id_resumen" type="hidden" name="id_resumen" value="{{$info_partner[0]->id}}">
                <div class="form-wrap">
                  <label for="nom_contacto">Nombre de Contacto Principal *</label>
                  <input class="form-input" id="nom_contacto" type="text" name="nom_contacto" value="{{$info_partner[0]->nom_contacto}}">
       
                </div>
                <div class="form-wrap">
                  <label for="ap_contacto">Apellido Contacto Principal *</label>                  
                  <input class="form-input" id="ap_contacto" type="text" name="ap_contacto" value="{{$info_partner[0]->ap_contacto}}">
                </div>  
                <div class="form-wrap">
                  <label for="num_contacto">Número de Contacto Principal *</label>                  
                  <input class="form-input" id="num_contacto" type="text" name="num_contacto" value="{{$info_partner[0]->num_contacto}}">
                </div>
                <div class="form-wrap">
                  <label for="num_sec">Número Secundario de Contacto</label>                  
                  <input class="form-input" id="num_sec" type="text" name="num_sec" value="{{$info_partner[0]->num_sec}}">
                </div>    
                <div class="form-wrap">
                  <label for="correo_empresarial">Correo Electrónico Empresarial *</label>                  
                  <input class="form-input" id="correo_empresarial" type="mail" name="correo_empresarial" value="{{$info_partner[0]->correo_empresarial}}">
                </div>                                     
                <div class="form-wrap">
                  <label for="nom_empresa">Nombre de la Empresa *</label>                  
                  <input class="form-input" id="nom_empresa" type="text" name="nom_empresa" value="{{$info_partner[0]->nom_empresa}}">
                </div> 
                <div class="form-wrap">
                  <label for="website">Website *</label>
                  <input class="form-input" id="website" type="text" name="website" value="{{$info_partner[0]->website}}">
                </div>                
                <div class="row row-20 row-gutters-14">
                  <div class="col-sm-4">
                    <button class="button button-block button-gradient button-lg" type="submit">Enviar</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </section>
     
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
      <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
      <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
      ClassicEditor
        .create( document.querySelector('#resumen'),{
          removePlugins: [ 'Heading', 'Link', 'CKFinder' ],
          toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
        //console.error( error );
      } );
      ClassicEditor
        .create( document.querySelector('#clientes'),{
          removePlugins: [ 'Heading', 'Link', 'CKFinder' ],
          toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
        //console.error( error );
      } );
      ClassicEditor
        .create( document.querySelector('#servicios'),{
          removePlugins: [ 'Heading', 'Link', 'CKFinder' ],
          toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
        //console.error( error );
      } ); 
      ClassicEditor
        .create( document.querySelector('#anios_mercado'),{
          removePlugins: [ 'Heading', 'Link', 'CKFinder' ],
          toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
        //console.error( error );
      } ); 
    </script>
  </body>
</html>
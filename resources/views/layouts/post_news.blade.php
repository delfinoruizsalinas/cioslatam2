<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{  $title }}</title>
    @include('layouts.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(dash/images/cios/pexels-andrea-piacquadio-789822_mobile.jpg) !important;
            background-attachment: unset;
        }
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
      <section class="parallax-container" id="portada"><div class="material-parallax parallax"><img src="/dash/images/cios/news-644847_1280.jpeg" alt="" style="display: block; transform: translate3d(-50%, 123px, 0px);"></div>
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                @if(Auth::user()->rol == "partner")
                <h2 class="breadcrumbs-custom-title">Crear Contenido</h2>
                @elseif( Auth::user()->rol == "admin")
                <h2 class="breadcrumbs-custom-title">Administrar Usuarios</h2>
                @endif               
               </div>
            </div>
          </div>
        </div>
      </section>
      @include('layouts.alert')
      @if(Auth::user()->rol == "partner")
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          <div class="group-xl">
            <div class="button button-icon button-icon-right button-default-outline button-lg" data-toggle="modal" data-target="#modalCrearnoticia"><span class="icon mdi mdi-plus"></span>Crear Contenido</div>
          </div>
        </div>
      </div>
      @endif    
      
      @if(Auth::user()->rol == "partner")
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-bordered" id="table-news">
              <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Update</th>
                  <th>Editar</th> 
                  <th>Borrar</th>    
                </tr>
              </thead>
              <tbody>
                @foreach($post as $now)
                  <tr>  
                    <td>{{ $now->titulo }}</td>
                    <td>{{ $now->updated_at }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#modalModificarnoticia" onClick="modificarNota('{{ $now->id }}')">Editar</button>
                    </td>                                                                
                    <td>
                      <button type="button" class="btn btn-outline-danger" onClick="borrarNota('{{ $now->id }}')">Borrar</button>
                    </td>                                                                
                  </tr>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>
      @elseif( Auth::user()->rol == "admin")
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          <h3>Administrar Usuarios</h3>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Registros de Partners</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contenidos de Partners</a>
                <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">Usuarios del Sistema</a>                
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                  <table class="table table-bordered" >
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Empresa</th>      
                        <th>Aprobar Partner y dar Acceso al sistema</th>
                      </tr>
                    </thead>
                    <tbody id="table-users">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                  
                  <div class="col-12">
                      <table class="table table-bordered" id="table-news-admin">
                        <thead>
                          <tr>
                            <th>Partner</th>
                            <th>Titulo</th>
                            <th>Update</th>
                            <th>Editar</th> 
                            <th>Borrar</th>    
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($post as $now)
                            <tr>  
                              <td>{{ $now->nom_empresa }}</td>
                              <td>{{ $now->titulo }}</td>
                              <td>{{ $now->updated_at }}</td>
                              <td>
                                <button type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#modalModificarnoticia" onClick="modificarNota('{{ $now->id }}')">Editar</button>
                              </td>                                                                
                              <td>
                                <button type="button" class="btn btn-outline-danger" onClick="borrarNota('{{ $now->id }}')">Borrar</button>
                              </td>                                                                
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                <div class="row">
                  
                  <div class="col-12">
                      <table class="table table-bordered" id="table-news-admin">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Partner</th>
                            <th>Desactivar o Activar Usuario</th>                             
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $usuarios)
                            <tr>  
                              <td>{{ $usuarios->name }}</td>
                              <td>{{ $usuarios->email }}</td>
                              <td>{{ $usuarios->rol }}</td>
                              <td><img src="{{ $usuarios->partner }}" alt="" style="max-width: 160px;"></td>                                                                
                              <td>
                                @if($usuarios->status == "active")
                                <button type="button" class="btn btn-outline-danger" onClick="desactivarUsuario('{{ $usuarios->id }}')">Desactivar Cuenta </button>
                                @else
                                <button type="button" class="btn btn-outline-info" onClick="activarUsuario('{{ $usuarios->id }}')">Activar Cuenta </button>                                
                                @endif

                              </td>                                                                
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
      @endif
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>

    
     <!-- modal crear noticia -->
     <div class="modal" id="modalModificarnoticia" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">  
                <div class="card mb-1">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Contenido</h6> 
                  </div>
                  <div class="card-body">

                    <!-- RD Mailform-->
                    <form class="rd-form rd-form-centered" action="/post-partner-update" method="post" enctype="multipart/form-data">
                      @csrf
                      <input class="form-input" id="id_post" type="hidden" name="id_post" value="{{ old('id_post') }}">
                      <div class="form-wrap">
                        <label for="titulo_up">Titulo de Contenido * </label>
                        <input class="form-input" id="titulo_up" type="text" name="titulo_up" value="{{ old('titulo_up') }}">
                      </div>

                      <div class="form-wrap">
                        <label for="imagen_up">Imagen de Contenido * </label>
                          <input type="file" class="form-control" id="imagen_up" name="imagen_up">
                      </div>
                      <div class="form-wrap">
                        <label for="editor_up">Resumen de Contenido * </label>
                        <textarea id="editor_up" name="editor_up"></textarea>
                      </div>  
                      
                        <div class="form-wrap">
                          <button class="button button-block button-gradient button-lg" type="submit">Enviar</button>
                        </div>
                      
                    </form>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal crear noticia -->
    <div class="modal" id="modalCrearnoticia" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">  
                <div class="card mb-1">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Crear Contenido</h6> 
                  </div>
                  <div class="card-body">

                    <!-- RD Mailform-->
                    <form class="rd-form rd-form-centered" action="/post-partner" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-wrap">
                        <label for="titulo">Titulo de Contenido * </label>
                        <input class="form-input" id="titulo" type="text" name="titulo" value="{{ old('titulo') }}">
                      </div>
                      <div class="form-wrap">
                        <label for="imagen">Imagen de Contenido * </label>
                          <input type="file" class="form-control" id="imagen" name="imagen">
                      </div>
                      <div class="form-wrap">
                        <label for="editor">Resumen de Contenido * </label>
                        <textarea id="editor" name="editor" value="{{ old('editor') }}"></textarea>
                      </div>  
                      
                        <div class="form-wrap">
                          <button class="button button-block button-gradient button-lg" type="submit">Enviar</button>
                        </div>
                      
                    </form>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal Update activate user -->
    <div class="modal" id="modalUpdateUser" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">  
                <div class="card mb-1">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Aprobar Partner</h6> 
                  </div>
                  <div class="card-body">

                    <!-- RD Mailform-->
                    <form class="rd-form rd-form-centered" action="update-user" method="post">
                      @csrf
                      <div class="form-wrap">
                        <label for="titulo">Elegir Partner a asociar a ésta cuenta. </label>
                        <select class="form-control" name="partner" id="partner">
                        </select>
                        <br>
                        <input type="hidden" name="id_registro_partner" id="id_registro_partner">
                        <input type="hidden" name="imagen_user" id="imagen_user">                                                
                        <input type="hidden" name="aprobar_cuenta" id="aprobar_cuenta" value="1">
                      </div>
                      <h2 class="text-center">APROBAR PARTNER Y DAR ACCESO AL SISTEMA</h2>
                      <div class="form-wrap">
                        <button class="button button-block button-gradient button-lg" type="submit">Enviar</button>
                      </div>
                      
                    
                    </form>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    
    @extends('layouts.js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $.ajax({
            url:'/get-list-partner',
            method:'GET',
            data:{
                id:1,
                _token:$('input[name="_token"]').val()
            }
        }).done(function(res){
         
          //console.log(res);
          let arreglo = JSON.parse(res);
          let todo = '<option value="" data-img="">Seleccionar una Opción</option>'; 
          
          for(var x=0; x<arreglo.length; x++ ){

            todo += '<option value="'+arreglo[x].nombre+'" data-img="'+arreglo[x].imagen+'">' + arreglo[x].nombre + '</option>';
           
          }
          $('#partner').append(todo);
        });

      function borrarNota(id){
       
        $.ajax({
          url:'/post-news-borrar',
          method:'POST',
          data:{
              id:id,
              _token:$('input[name="_token"]').val()
          }
        }).done(function(res){
          
          if(res == "ok"){
            alert("El registro se eliminó correctamente");
            location.reload();
          }
        });
      }
      
      function desactivarUsuario(id){
       //console.log(id);
       $.ajax({
         url:'/post-desactivar-partners',
         method:'POST',
         data:{
             id:id,
             _token:$('input[name="_token"]').val()
         }
       }).done(function(res){
         //console.log(res);
         if(res == "ok"){
           alert("Usuario bloqueado correctamente");
           location.reload();
         }
       });
     }

     function activarUsuario(id){
       //console.log(id);
       $.ajax({
         url:'/post-activar-partners',
         method:'POST',
         data:{
             id:id,
             _token:$('input[name="_token"]').val()
         }
       }).done(function(res){
         //console.log(res);
         if(res == "ok"){
           alert("Usuario desbloqueado correctamente");
           location.reload();
         }
       });
     }

      let YourEditor;
      ClassicEditor
        .create(document.querySelector('#editor_up'))
        .then(editor => {
          window.editor = editor;
          YourEditor = editor;
      });
        
      function modificarNota(id){
        //alert(id);
        $.ajax({
          url:'/post-partner-get',
          method:'GET',
          data:{
              id:id,
              _token:$('input[name="_token"]').val()
          }
        }).done(function(res){
          var arreglo = JSON.parse(res); 
          //console.log(arreglo);
          $('#titulo_up').val(arreglo.titulo);
          YourEditor.setData(arreglo.resumen);    
          $('#id_post').val(id);
        });
      }

    //ckeditor nuevo
    ClassicEditor
      .create( document.querySelector( '#editor'),{
        removePlugins: [ 'Heading', 'Link', 'CKFinder' ],
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
      })
      .catch( error => {
      //console.error( error );
    } );
      
    $.noConflict();
      jQuery( document ).ready(function( $ ) {
        $('#table-news').DataTable();
        $('#table-news-admin').DataTable();

 
      //USUARIOS
      $.ajax({
          url:'/get-aprobar-users',
          method:'GET',
          data:{
              id:1,
              _token:$('input[name="_token"]').val()
          }
      }).done(function(res){
       
        var arreglo = JSON.parse(res);
        for(var x=0; x<arreglo.length; x++ ){
          let aprobar = null;
          if(arreglo[x].estatus == 0){
            aprobar = '<button type="button" class="btn btn-outline-primary" onClick="reqClass('+arreglo[x].id+');" data-nombre="'+arreglo[x].nom_contacto+'" data-toggle="modal" data-target="#modalUpdateUser">Aprobar</button>';
            
          }else{
            
            aprobar = '<button type="button" class="btn btn-outline-success disabled">Aprobado</button>';
          }

          var todo = '<tr><td>'+arreglo[x].nom_contacto+'</td><td>'+arreglo[x].correo_empresarial+'</td><td>'+arreglo[x].nom_empresa+'</td><td>'+aprobar+'</td></tr>';
          $('#table-users').append(todo);
        }
      });

      $('#partner').change(function(){
          let imagen = $(this).find(':selected').attr('data-img');
          
          $("#imagen_user").val(imagen); 
      });
      
    });
      function reqClass(id_registro_partner){
        //console.log(id);
        $("#id_registro_partner").val(id_registro_partner);
      }
    </script>
  </body>
</html>
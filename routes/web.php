<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ConocenosController;
use App\Http\Controllers\ComiteEjecutivoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostnewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MiembrosController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\AvisoPrivacidadController;
use App\Http\Controllers\AgendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Controller::class, 'index']);

Route::controller(AgendaController::class)->group(function(){
    Route::GET('agenda-technology-retreat-2023-ixtapa-zihuatanejo', 'index');
});

Route::controller(NoticiasController::class)->group(function(){
    Route::GET('noticias', 'index');
});

Route::controller(ConocenosController::class)->group(function(){
    Route::GET('conocenos', 'index');
});

Route::controller(ComiteEjecutivoController::class)->group(function(){
    Route::GET('comite-ejecutivo', 'index');
});

Route::controller(ContactoController::class)->group(function(){
    Route::GET('contacto', 'index');
    Route::POST('contactanos', 'register');
});

Route::controller(PartnerController::class)->group(function(){
    Route::GET('partner-slider', 'index');
});

Route::controller(AvisoPrivacidadController::class)->group(function(){
    Route::GET('aviso-de-privacidad', 'index');
});

Route::controller(EventosController::class)->group(function(){
    Route::GET('cios-vlog', 'getVlog');
    Route::GET('cios-master-class', 'getMaster');
    Route::GET('cios-life', 'getLife');
    Route::GET('cios-entre-amigos', 'getAmigos');
    Route::GET('cios-mesa-de-debate', 'getDebate');
    Route::GET('cios-connect', 'getConnect'); 
    Route::GET('cios-connect-detalle/{id}', 'getConnectDetalle'); 
       
});

Route::controller(PartnersController::class)->group(function(){
    Route::GET('partners-registro', 'index');
    Route::POST('partners-free-registro', 'register');
    Route::GET('partners-resumen', 'page_resumen');
    Route::GET('partners-detalle/{id}', 'detalle');
    Route::GET('partners-detalle-contenido/{titulo}', 'detalleContenido');
});

Route::controller(MiembrosController::class)->group(function(){
    Route::GET('miembros-registro', 'index');
    Route::POST('miembros-free-registro', 'register');
    Route::GET('la-voz-de-nuestros-miembros', 'showMiembros');    
    Route::GET('miembros-detalle/{titulo}', 'detalleContenido');
});


Route::GET('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => true, // Password Reset Routes...
    'verify' => true, // Email Verification Routes...
]);
Route::GET('logout', [HomeController::class, 'logout'])->name('logout');

Route::group(['middleware'=>'auth'],function(){
  // Descargar plantilla en word y subir escrito en pdf
    Route::controller(PostnewsController::class)->group(function(){
        
        Route::GET('/partners', 'index');
        Route::GET('/post-news', 'getPostPartner');
        Route::POST('/post-news-borrar', 'borrarPostPartner');
        Route::GET('/get-aprobar-users-partners', 'getUsersPartners');
        Route::GET('/get-aprobar-users-miembros', 'getUsersMiembros');        
        
        Route::POST('/post-desactivar-partners', 'borrarPartners');   
        Route::POST('/post-desactivar-miembros', 'borrarMiembros');   
        Route::POST('/post-activar-partners', 'activarPartners');    
        Route::POST('/post-activar-miembros', 'activarMiembros');
                    
        Route::GET('/get-list-partner', 'getList');
        Route::POST('/update-user', 'editUser');

        Route::POST('/update-user-miembro', 'activeUserMiembro');
        Route::POST('/delete-user-miembro', 'deleteUserMiembro');
        

        //abc partners
        Route::POST('/post-partner', 'store');
        Route::GET('/post-partner-get', 'getPartner');  
        Route::POST('/post-partner-update', 'updatePostPartner'); 
        Route::POST('/delete-user-partner', 'deleteUserPartner');

        //abc admin
        Route::GET('/actualizar-resumen', 'resumenAdmin');
        Route::GET('/informacion-general', 'resumeninfGeneralAdmin');
        Route::POST('/actualizar-informacion-general', 'updateInfGeneralAdmin');        
        
        Route::POST('/update-resumen', 'editarResumen');
        //abc miembros
        Route::POST('/post-miembro', 'create_post_miembro');
        Route::GET('/post-miembro-get', 'getMiembro');
        Route::POST('/post-miembro-update', 'updatePostMiembro'); 
        Route::POST('/post-news-borrar-miembro', 'borrarPostMiembro');

        
    });  
});
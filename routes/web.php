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
});

Route::controller(PartnerController::class)->group(function(){
    Route::GET('partner-slider', 'index');
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
    Route::GET('partners-detalle-contenido/{id}', 'detalleContenido');
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
        Route::GET('/get-aprobar-users', 'getUsers');
        Route::POST('/post-desactivar-partners', 'borrarPartners');   
        Route::POST('/post-activar-partners', 'activarPartners');                
        Route::GET('/get-list-partner', 'getList');
        Route::POST('/update-user', 'editUser');
        Route::POST('/post-partner', 'store');
        Route::GET('/post-partner-get', 'getPartner');  
        Route::POST('/post-partner-update', 'updatePostPartner');        
        Route::GET('/actualizar-resumen', 'resumenAdmin');
        Route::GET('/informacion-general', 'resumeninfGeneralAdmin');
        Route::POST('/actualizar-informacion-general', 'updateInfGeneralAdmin');        
        
        Route::POST('/update-resumen', 'editarResumen');
        
    });  
});
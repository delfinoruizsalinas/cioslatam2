<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
         //FOOTER PARTNERS
         $url_site = 'http://188.166.16.108:1337';
         $urlPart = $url_site.'/api/partners?populate=imagen';
         $responsePart = file_get_contents($urlPart);
         $newsPartn = json_decode($responsePart);
         
         foreach ($newsPartn->data as $valuepart) {
 
             $urlImg = $valuepart->attributes->imagen->data->attributes->url;
 
             if(empty($valuepart->attributes->link_pange)){
                 $link = '#';
             }else{
                 $link = $valuepart->attributes->link_pange;                        
             }
 
             $partn[] = array(
                                 'link'=> $link,                                       
                                 'imagen' => $urlImg,           
                             );
         }
 
         //return view('layouts.partner_slider', compact('partn')); 
         View::share(['partner_slider' => $partn]);
    }

    public function index(){
        
        $title = "CIO's LATAM - INICIO";
        Carbon::setLocale('es');
        // NOTICIAS
        $url = 'https://api.rss2json.com/v1/api.json?rss_url=https://expansion.mx/rss/tecnologia';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        $i=0;
        foreach ($newsData->items as $value) {
            if($i <=3){
                $img = "";
                if($value->enclosure->link){
                    $img = $value->enclosure->link;
                }else{
                    $img = $value->thumbnail;
                }
                $fecha = Carbon::parse($value->pubDate)->translatedFormat('d F, Y');
                $hora =  Carbon::parse($value->pubDate)->format('h:m');
                $noticias[] = array('titulo' => $value->title, 'link'=> $value->link,'description'=> $value->description,'img'=>$img, 'fecha' =>$fecha,'hora' =>$hora);
            }
            $i++;
        }

        //VLOG
        $url_site = 'http://188.166.16.108:1337';
        $urlVlog = $url_site.'/api/evento-virtuals?populate=imagen&sort[5]=fecha%3Adesc';
        $responseVlog = file_get_contents($urlVlog);
        $newsDataVlog = json_decode($responseVlog);
        
        $i=0;
        foreach ($newsDataVlog->data as $valuevlog) {
            if($i <=2){
                if(empty($valuevlog->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuevlog->attributes->iamgen;
                }else{
                    $urlImg = $valuevlog->attributes->imagen->data->attributes->formats->small->url;
                }
                
                $dataVlog[] = array('titulo'=>$valuevlog->attributes->titulo,
                                    'fecha'=> Carbon::parse($valuevlog->attributes->fecha)->translatedFormat('d F, Y'), 
                                    'hora'=> Carbon::parse($valuevlog->attributes->hora)->format('h:m'),                                     
                                    'youtube' => $valuevlog->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }

        //PRESENCIALES
        $urlPresenc = $url_site.'/api/evento-presencials?populate=imagen&sort[6]=fecha%3Adesc';
        $responsePresenc = file_get_contents($urlPresenc);
        $newsDataPresenc = json_decode($responsePresenc);
        $i=0;
        foreach ($newsDataPresenc->data as $valuepres) {
            if($i <=2){
                if(empty($valuepres->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuepres->attributes->iamgen;
                }else{
                    $urlImg = $valuepres->attributes->imagen->data->attributes->formats->small->url;
                }

                $dataPres[] = array('id'=> $valuepres->id,
                                    'titulo'=>$valuepres->attributes->titulo,
                                    'fecha'=> Carbon::parse($valuepres->attributes->fecha)->translatedFormat('d F, Y'),                                      
                                    'ubicacion' => $valuepres->attributes->ubicacion,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }
        
       
        //LIFE
        $urlLife = $url_site.'/api/evento-cio-lives?populate=imagen&sort[1]=fecha%3Adesc';
        $responseLife = file_get_contents($urlLife);
        $newsDataLife = json_decode($responseLife);
        
        $i=0;
        foreach ($newsDataLife->data as $valuelife) {
            if($i <=2){
                if(empty($valuelife->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuelife->attributes->iamgen;
                }else{
                    $urlImg = $valuelife->attributes->imagen->data->attributes->formats->small->url;
                }
        
                $dataLife[] = array('titulo'=>$valuelife->attributes->titulo,
                                    'fecha'=> Carbon::parse($valuelife->attributes->fecha)->translatedFormat('d F, Y'),                                    
                                    'youtube' => $valuelife->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }
        
        //EVENTOS ENTRE AMIGOS
        $urlAmigos = $url_site.'/api/entre-amigos?populate=imagen&sort[2]=fecha%3Adesc';
        $responseAmigos = file_get_contents($urlAmigos);
        $newsDataAmigos = json_decode($responseAmigos);
        
        $i=0;
        foreach ($newsDataAmigos->data as $valueamigos) {
            if($i <=2){
                if(empty($valueamigos->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valueamigos->attributes->iamgen;
                }else{
                    $urlImg = $valueamigos->attributes->imagen->data->attributes->formats->small->url;
                }
        
                $dataAmigos[] = array('titulo'=>$valueamigos->attributes->titulo,
                                    'fecha'=> Carbon::parse($valueamigos->attributes->fecha)->translatedFormat('d F, Y'),                                      
                                    'youtube' => $valueamigos->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }

        //DEBATE
        $urlDebate = $url_site.'/api/mesa-de-debates?populate=imagen&sort[2]=fecha%3Adesc';
        $responseDebate = file_get_contents($urlDebate);
        $newsDataDebate = json_decode($responseDebate);
        
        $i=0;
        foreach ($newsDataDebate->data as $valuedebate) {
            if($i <=2){
                if(empty($valuedebate->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuedebate->attributes->iamgen;
                }else{
                    $urlImg = $valuedebate->attributes->imagen->data->attributes->formats->small->url;
                }
        
                $dataDebate[] = array('titulo'=>$valuedebate->attributes->titulo,
                                    'fecha'=> Carbon::parse($valuedebate->attributes->fecha)->translatedFormat('d F, Y'),                                      
                                    'youtube' => $valuedebate->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }        
        
        //MASTER
        $urlMaster = $url_site.'/api/master-classes?populate=imagen&sort[2]=fecha%3Adesc';
        $responseMaster = file_get_contents($urlMaster);
        $newsDataMaster = json_decode($responseMaster);
        
        $i=0;
        foreach ($newsDataMaster->data as $valuemaster) {
            if($i <=2){
                if(empty($valuemaster->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuemaster->attributes->iamgen;
                }else{
                    $urlImg = $valuemaster->attributes->imagen->data->attributes->formats->small->url;
                }
        
                $dataMaster[] = array('titulo'=>$valuemaster->attributes->titulo,
                                    'fecha'=> Carbon::parse($valuemaster->attributes->fecha)->translatedFormat('d F, Y'),                                       
                                    'youtube' => $valuemaster->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            $i++;
        }        
        
        //NUM MEMBERS
        $urlMember = $url_site.'/api/miembros-actives/1';
        $responseMem = file_get_contents($urlMember);
        $newsDataMaster = json_decode($responseMem);
        $members = $newsDataMaster->data->attributes->numero;
        
        //PARTNERS POST
        $publicacion = \DB::table('post_partner')
        ->join('users', 'post_partner.id_usuario', '=', 'users.id')
        ->select('post_partner.*','users.partner')
        ->where('post_partner.estatus','=',1)
        ->orderBy('updated_at','DESC')
        ->get();
        $dataPostPartner = json_decode($publicacion);


        //MIEMBROS POST
        $dataPostMiembro = \DB::table('post_miembro')
        ->join('users', 'post_miembro.id_usuario', '=', 'users.id')
        ->join('free_register_miembro', 'free_register_miembro.id_usuario', '=', 'users.id')
        ->select('post_miembro.*','users.partner','free_register_miembro.nom_contacto','free_register_miembro.ap_contacto')
        ->where('post_miembro.estatus','=',1)
        ->orderBy('updated_at','DESC')
        ->take(8)->get();
        //$dataPostMiembro = json_decode($publicacion_miembro);
        //dd($dataPostMiembro);

        return view('layouts.home', compact('title','noticias','dataVlog','dataPres','dataLife','dataAmigos','dataDebate','dataMaster','members','dataPostPartner','dataPostMiembro'));
    }
}

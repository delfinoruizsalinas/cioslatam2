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

        //HEADER MODO DE PLANTILLA
        $urlPart1 = $url_site.'/api/efecto-navidad';
        $responsePart1 = file_get_contents($urlPart1);
        $efect_template = json_decode($responsePart1);
        
        if($efect_template->data->attributes->Navidad === true){
            $navidad = 1;
        }else{
            $navidad = 0;                        
        }
      
        View::share(['header' => $navidad]);
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
                if(empty($value->enclosure->link)){
                    $img = "https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg";
                }else{
                    if($value->enclosure->link){
                        $img = $value->enclosure->link;
                    }else{
                        $img = $value->thumbnail;
                    }
                }
                
                $fecha = Carbon::parse($value->pubDate)->translatedFormat('d F, Y');
                $hora =  Carbon::parse($value->pubDate)->format('h:m');
                $noticias[] = array('titulo' => $value->title, 'link'=> $value->link,'description'=> $value->description,'img'=>$img, 'fecha' =>$fecha,'hora' =>$hora);
            }
            $i++;
        }

        $dataVlog1 = array();
        $dataPres1 = array();
        $dataLife1 = array();
        $dataAmigos1 = array();
        $dataDebate1 = array();
        $dataMaster1 = array();
        
        //Url EndPoints
        $url_site = 'http://188.166.16.108:1337';
        
        $carrusel = array();
        //GALLERY HOME
        $urlCarrusel = $url_site.'/api/carrusel-homes?populate=imagen';
        $responseCarrusel = file_get_contents($urlCarrusel);
        $newsDataCarrusel = json_decode($responseCarrusel);
        //dd($newsDataCarrusel);

        
        foreach ($newsDataCarrusel->data as $carruel) {
            
                if(empty($carruel->attributes->imagen->data->attributes->formats->large)){
                    $urlImg = $carruel->attributes->iamgen;
                }else{
                    $urlImg = $carruel->attributes->imagen->data->attributes->formats->large->url;
                }
                if(empty($carruel->attributes->Titulo1)){
                    $titulo1 = "";
                }else{
                    $titulo1 = $carruel->attributes->Titulo1;
                }
                if(empty($carruel->attributes->Titulo2)){
                    $titulo2 = "";
                }else{
                    $titulo2 = $carruel->attributes->Titulo2;
                }
                $carrusel[] = array('url_img' => $urlImg,'titulo1' => $titulo1,'titulo2' => $titulo2);
        }
        //dd($carrusel);
        //VLOG
       
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
                
                //Carbon::parse($valuevlog->attributes->fecha)->format('m')
                $dataVlog[] = array('titulo'=>$valuevlog->attributes->titulo,
                                'fecha'=> Carbon::parse($valuevlog->attributes->fecha)->translatedFormat('d F, Y'), 
                                'fecha1'=> Carbon::parse($valuevlog->attributes->fecha)->format('m'), 
                                'hora'=> substr($valuevlog->attributes->hora, 0, 5),                                     
                                'youtube' => $valuevlog->attributes->youtube,
                                'url_img' => $urlImg,                                    
                            );
            }
            if($i <=9){
                if(empty($valuevlog->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuevlog->attributes->iamgen;
                }else{
                    $urlImg = $valuevlog->attributes->imagen->data->attributes->formats->small->url;
                }
                
                if(Carbon::parse($valuevlog->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                //if(Carbon::parse($valuevlog->attributes->fecha)->format('y') == Carbon::now()->format('y')){
                    $dataVlog1[] = array('titulo'=>$valuevlog->attributes->titulo,
                        'fecha'=> Carbon::parse($valuevlog->attributes->fecha)->translatedFormat('d F, Y'), 
                        'fecha1'=> Carbon::parse($valuevlog->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuevlog->attributes->fecha)->format('y-m-d'), 
                        'hora'=> substr($valuevlog->attributes->hora, 0, 5),
                        'fecha3'=> Carbon::parse($valuevlog->attributes->fecha .' '. substr($valuevlog->attributes->hora, 0, 5))->getPreciseTimestamp(3),                
                        'youtube' => $valuevlog->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataVlog1[] = array('titulo'=>$valuevlog->attributes->titulo,
                        'fecha'=> Carbon::parse($valuevlog->attributes->fecha)->translatedFormat('d F, Y'), 
                        'fecha1'=> Carbon::parse($valuevlog->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuevlog->attributes->fecha)->format('y-m-d'), 
                        'hora'=> substr($valuevlog->attributes->hora, 0, 5),
                        'fecha3'=> Carbon::parse($valuevlog->attributes->fecha .' '. substr($valuevlog->attributes->hora, 0, 5))->getPreciseTimestamp(3),                
                        'youtube' => $valuevlog->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    ); 
                }               
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
                                    'fecha1'=> Carbon::parse($valuepres->attributes->fecha)->format('m'),                                    
                                    'ubicacion' => $valuepres->attributes->ubicacion,
                                    'url_img' => $urlImg,                                    
                                );
            }
            if($i <=9){
                if(empty($valuepres->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuepres->attributes->iamgen;
                }else{
                    $urlImg = $valuepres->attributes->imagen->data->attributes->formats->small->url;
                }
                if(Carbon::parse($valuepres->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                //if(Carbon::parse($valuepres->attributes->fecha)->format('y') >= Carbon::now()->format('y')){
                    $dataPres1[] = array('id'=> $valuepres->id,
                        'titulo'=>$valuepres->attributes->titulo,
                        'fecha'=> Carbon::parse($valuepres->attributes->fecha)->translatedFormat('d F, Y'),
                        'fecha1'=> Carbon::parse($valuepres->attributes->fecha)->format('m'), 
                        'fecha2'=> Carbon::parse($valuepres->attributes->fecha)->format('y-m-d'),
                        'fecha3'=> Carbon::parse($valuepres->attributes->fecha .' 19:00')->getPreciseTimestamp(3),
                        'ubicacion' => $valuepres->attributes->ubicacion,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataPres1[] = array('id'=> $valuepres->id,
                    'titulo'=>$valuepres->attributes->titulo,
                    'fecha'=> Carbon::parse($valuepres->attributes->fecha)->translatedFormat('d F, Y'),
                    'fecha1'=> Carbon::parse($valuepres->attributes->fecha)->format('m'), 
                    'fecha2'=> Carbon::parse($valuepres->attributes->fecha)->format('y-m-d'),
                    'fecha3'=> Carbon::parse($valuepres->attributes->fecha .' 19:00')->getPreciseTimestamp(3),
                    'ubicacion' => $valuepres->attributes->ubicacion,
                    'url_img' => $urlImg,                                    
                );
                }                     
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
                                    'fecha1'=> Carbon::parse($valuelife->attributes->fecha)->format('m'),                                    
                                    'youtube' => $valuelife->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            if($i <=9){
                if(empty($valuelife->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuelife->attributes->iamgen;
                }else{
                    $urlImg = $valuelife->attributes->imagen->data->attributes->formats->small->url;
                }
                if(Carbon::parse($valuelife->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                //if(Carbon::parse($valuelife->attributes->fecha)->format('y') >= Carbon::now()->format('y')){
                    $dataLife1[] = array('titulo'=>$valuelife->attributes->titulo,
                        'fecha'=> Carbon::parse($valuelife->attributes->fecha)->translatedFormat('d F, Y'),
                        'fecha1'=> Carbon::parse($valuelife->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuelife->attributes->fecha)->format('y-m-d'), 
                        'fecha3'=> Carbon::parse($valuelife->attributes->fecha .' '. substr($valuelife->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                   
                        'youtube' => $valuelife->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataLife1[] = array('titulo'=>$valuelife->attributes->titulo,
                        'fecha'=> Carbon::parse($valuelife->attributes->fecha)->translatedFormat('d F, Y'),
                        'fecha1'=> Carbon::parse($valuelife->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuelife->attributes->fecha)->format('y-m-d'), 
                        'fecha3'=> Carbon::parse($valuelife->attributes->fecha .' '. substr($valuelife->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                   
                        'youtube' => $valuelife->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }               
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
                                    'fecha1'=> Carbon::parse($valueamigos->attributes->fecha)->format('m'),                                     
                                    'youtube' => $valueamigos->attributes->youtube,
                                    'url_img' => $urlImg,                                    
                                );
            }
            if($i <=9){
                if(empty($valueamigos->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valueamigos->attributes->iamgen;
                }else{
                    $urlImg = $valueamigos->attributes->imagen->data->attributes->formats->small->url;
                }
                if(Carbon::parse($valueamigos->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                //if(Carbon::parse($valueamigos->attributes->fecha)->format('y') >= Carbon::now()->format('y')){
                    $dataAmigos1[] = array('titulo'=>$valueamigos->attributes->titulo,
                        'fecha'=> Carbon::parse($valueamigos->attributes->fecha)->translatedFormat('d F, Y'),  
                        'fecha1'=> Carbon::parse($valueamigos->attributes->fecha)->format('m'),  
                        'fecha2'=> Carbon::parse($valueamigos->attributes->fecha)->format('y-m-d'),  
                        'fecha3'=> Carbon::parse($valueamigos->attributes->fecha .' '. substr($valueamigos->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                    
                        'youtube' => $valueamigos->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataAmigos1[] = array('titulo'=>$valueamigos->attributes->titulo,
                        'fecha'=> Carbon::parse($valueamigos->attributes->fecha)->translatedFormat('d F, Y'),  
                        'fecha1'=> Carbon::parse($valueamigos->attributes->fecha)->format('m'),  
                        'fecha2'=> Carbon::parse($valueamigos->attributes->fecha)->format('y-m-d'),  
                        'fecha3'=> Carbon::parse($valueamigos->attributes->fecha .' '. substr($valueamigos->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                    
                        'youtube' => $valueamigos->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );                    
                }              
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
                        'fecha1'=> Carbon::parse($valuedebate->attributes->fecha)->format('m'),                                    
                        'youtube' => $valuedebate->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );                 
            }
            if($i <=9){
                if(empty($valuedebate->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuedebate->attributes->iamgen;
                }else{
                    $urlImg = $valuedebate->attributes->imagen->data->attributes->formats->small->url;
                }
                
                //if(Carbon::parse($valuedebate->attributes->fecha)->format('y') >= Carbon::now()->format('y')){
                if(Carbon::parse($valuedebate->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                    $dataDebate1[] = array('titulo'=>$valuedebate->attributes->titulo,
                        'fecha'=> Carbon::parse($valuedebate->attributes->fecha)->translatedFormat('d F, Y'),  
                        'fecha1'=> Carbon::parse($valuedebate->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuedebate->attributes->fecha)->format('y-m-d'),     
                        'fecha3'=> Carbon::parse($valuedebate->attributes->fecha .' '. substr($valuedebate->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                                             
                        'youtube' => $valuedebate->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataDebate1[] = array('titulo'=>$valuedebate->attributes->titulo,
                        'fecha'=> Carbon::parse($valuedebate->attributes->fecha)->translatedFormat('d F, Y'),  
                        'fecha1'=> Carbon::parse($valuedebate->attributes->fecha)->format('m'),
                        'fecha2'=> Carbon::parse($valuedebate->attributes->fecha)->format('y-m-d'),     
                        'fecha3'=> Carbon::parse($valuedebate->attributes->fecha .' '. substr($valuedebate->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                                             
                        'youtube' => $valuedebate->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    ); 
                }                 
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
                    'fecha1'=> Carbon::parse($valuemaster->attributes->fecha)->format('m'),                                      
                    'youtube' => $valuemaster->attributes->youtube,
                    'url_img' => $urlImg,                                    
                );
                        
            }
            if($i <=9){
                if(empty($valuemaster->attributes->imagen->data->attributes->formats->small)){
                    $urlImg = $valuemaster->attributes->iamgen;
                }else{
                    $urlImg = $valuemaster->attributes->imagen->data->attributes->formats->small->url;
                }
                if(Carbon::parse($valuemaster->attributes->fecha)->getPreciseTimestamp(3) > Carbon::parse(Carbon::now())->getPreciseTimestamp(3)){
                    $dataMaster1[] = array('titulo'=>$valuemaster->attributes->titulo,
                        'fecha'=> Carbon::parse($valuemaster->attributes->fecha)->translatedFormat('d F, Y'),
                        'fecha1'=> Carbon::parse($valuemaster->attributes->fecha)->format('m'),        
                        'fecha2'=> Carbon::parse($valuemaster->attributes->fecha)->format('y-m-d'),
                        'fecha3'=> Carbon::parse($valuemaster->attributes->fecha .' '. substr($valuemaster->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                                                           
                        'youtube' => $valuemaster->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );
                }else{
                    $dataMaster1[] = array('titulo'=>$valuemaster->attributes->titulo,
                        'fecha'=> Carbon::parse($valuemaster->attributes->fecha)->translatedFormat('d F, Y'),
                        'fecha1'=> Carbon::parse($valuemaster->attributes->fecha)->format('m'),        
                        'fecha2'=> Carbon::parse($valuemaster->attributes->fecha)->format('y-m-d'),
                        'fecha3'=> Carbon::parse($valuemaster->attributes->fecha .' '. substr($valuemaster->attributes->hora, 0, 5))->getPreciseTimestamp(3),                                                                           
                        'youtube' => $valuemaster->attributes->youtube,
                        'url_img' => $urlImg,                                    
                    );   
                }               
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

        // CIOS Vlog, Connect, Life, Entre amigos, Debate, Master Class
        $dataCollage = array();
        $dataProxEvnts = array();
        $fechaHoy = Carbon::now()->format('y-m-d');
        $mesPasado = Carbon::now()->format('m');

        foreach ($dataVlog1 as $key => $value) {
            
            if($value['fecha2'] < $fechaHoy){ 
                $dataCollage[] = array($value);
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }
        foreach ($dataPres1 as $key => $value) {
            if($value['fecha2'] < $fechaHoy){
                $dataCollage[] = array($value                                    
                );
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }
        foreach ($dataLife1 as $key => $value) {
            if($value['fecha2'] < $fechaHoy){
                $dataCollage[] = array($value                                    
                );
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }
        foreach ($dataAmigos1 as $key => $value) {
            if($value['fecha2'] < $fechaHoy){
                $dataCollage[] = array($value);
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }

        foreach ($dataDebate1 as $key => $value) {
            if($value['fecha2'] < $fechaHoy){
                $dataCollage[] = array($value);
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }

        foreach ($dataMaster1 as $key => $value) {
            if($value['fecha2'] < $fechaHoy){
                $dataCollage[] = array($value                                    
                );
            }
            if($value['fecha2'] >= $fechaHoy){
                $dataProxEvnts[] = array($value);
            }
        }
        
        //MIEMBROS POST
        $dataPostMiembro = \DB::table('post_miembro')
        ->join('users', 'post_miembro.id_usuario', '=', 'users.id')
        ->join('free_register_miembro', 'free_register_miembro.id_usuario', '=', 'users.id')
        ->select('post_miembro.*','users.partner','free_register_miembro.nom_contacto','free_register_miembro.ap_contacto')
        ->where('post_miembro.estatus','=',1)
        ->orderBy('created_at','DESC')
        ->take(8)->get();
        //$dataPostMiembro = json_decode($publicacion_miembro);
        //dd($dataPostMiembro);

        function array_sort_by_mes(&$arrIni, $col, $order = SORT_DESC)
        {
            $arrAux = array();
            foreach ($arrIni as $key=> $row)
            {
                $arrAux[$key] = is_object($row[0]) ? $arrAux[$key] = $row[0]->$col : $row[0][$col];
                $arrAux[$key] = strtolower($arrAux[$key]);
            }
            array_multisort($arrAux, $order, $arrIni);
        }
        
        array_sort_by_mes($dataCollage, 'fecha3', $order = SORT_DESC);
        array_sort_by_mes($dataProxEvnts, 'fecha3', $order = SORT_ASC);

        return view('layouts.home', compact('title','noticias','dataVlog','dataPres','dataLife','dataAmigos','dataDebate','dataMaster','members','dataPostPartner','dataPostMiembro', 'dataCollage','dataProxEvnts','carrusel'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComiteEjecutivoController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - COMITÉ EJECUTIVO";
        //COMITE
        $urlPresenc = 'http://188.166.16.108:1337';
        $urlComite = $urlPresenc.'/api/biografias?populate=imagen';
        $responseComite = file_get_contents($urlComite);
        $newsComite = json_decode($responseComite);
        
        foreach ($newsComite->data as $valuecomite) {

            $urlImg = $valuecomite->attributes->imagen->data->attributes->url;
            $comite[] = array(
                                'id'=> $valuecomite->attributes->linkdn,                                      
                                'tw' => $valuecomite->attributes->twt,
                                'titulo' => $valuecomite->attributes->titulo,
                                'cargo' => $valuecomite->attributes->cargo, 
                                'imagen' => $urlImg,           
                            );
        }
        return view('layouts.comite_ejecutivo', compact('title','comite'));
    }
}

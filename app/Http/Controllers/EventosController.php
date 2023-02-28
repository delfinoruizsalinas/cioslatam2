<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function getVlog()
    {
        $title="CIO's LATAM - Vlog";
        return view('layouts.vlog', compact('title'));
    }
    public function getMaster()
    {
        $title="CIO's LATAM - Master Class"; 
        return view('layouts.master', compact('title'));
    }
    public function getLife()
    {
        $title="CIO's LATAM - Life"; 
        return view('layouts.life', compact('title'));
    }
    public function getAmigos()
    {
        $title="CIO's LATAM - Entre Amigos"; 
        return view('layouts.amigos', compact('title'));
    }
    public function getDebate()
    {
        $title="CIO's LATAM - Mesa de Debate"; 
        return view('layouts.debate', compact('title'));
    }
    public function getConnect()
    {
        $title="CIO's LATAM - Connect"; 
        return view('layouts.connect', compact('title'));
    }
    public function getConnectDetalle($id)
    {
        $title="CIO's LATAM - Connect Detalle"; 
        
     
        $url = 'http://188.166.16.108:1337';
    
       
                                                                                
          $json = file_get_contents($url.'/api/evento-presencials/'.$id.'?populate=imagen');
          $presenciales = json_decode($json);
          //dd($presenciales);
        return view('layouts.connect_detalle', compact('title','presenciales'));
    }
    
}

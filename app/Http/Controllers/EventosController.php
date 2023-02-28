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
    public function getConnect()
    {
        $title="CIO's LATAM - Connect"; 
        return view('layouts.connect', compact('title'));
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
    public function getClass()
    {
        $title="CIO's Master Class"; 
        return view('layouts.class', compact('title'));
    }
    
    
    
    
    
    
}

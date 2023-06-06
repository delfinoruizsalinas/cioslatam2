<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisoPrivacidadController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - AVISO DE PRIVACIDAD";
              
        return view('layouts.aviso_de_privacidad', compact('title'));
    }
}

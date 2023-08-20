<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){
        $title = "Agenda Technology Retreat 2023 Ixtapa Zihuatanejo";
              
                                                          
            $json = file_get_contents('http://188.166.16.108:1337/api/technology-retreat-2023s');
            // Decode the JSON string into an object
            $obj = json_decode($json);
            // In the case of this input, do key and array lookups to get the values
            foreach ($obj->data as $key => $value) {
             
                $sep7 = null;
                $sep8 = null;
                $sep9 = null;
                $sep10 = null;

                if(empty($value->attributes->SEP7)){
                    $sep7 = '';
                }else{
                    $sep7 = $value->attributes->SEP7;                        
                }

                if(empty($value->attributes->SEP8)){
                    $sep8 = '';
                }else{
                    $sep8 = $value->attributes->SEP8;                        
                }
                if(empty($value->attributes->SEP9)){
                    $sep9 = '';
                }else{
                    $sep9 = $value->attributes->SEP9;                        
                }
                if(empty($value->attributes->SEP10)){
                    $sep10 = '';
                }else{
                    $sep10 = $value->attributes->SEP10;                        
                }   
                
            }           
         
        return view('layouts.agenda', compact('title','sep7','sep8','sep9','sep10'));
    }
}

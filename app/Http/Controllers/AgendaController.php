<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){
        $title = "Agenda Technology Retreat 2023 Ixtapa Zihuatanejo";
              
                                                          
            $json = file_get_contents('http://188.166.16.108:1337/api/technology-retreat-2023s?populate=MESA_DIA_7&populate=MESA_DIA_8&populate=MESA_DIA_9');
            // Decode the JSON string into an object
            $obj = json_decode($json);

           
            // In the case of this input, do key and array lookups to get the values
            foreach ($obj->data as $key => $value) {
             
                $sep7 = null;
                $sep8 = null;
                $sep9 = null;
                $sep10 = null;
                $dia7_file = null;
                $dia8_file = null;
                $dia9_file = null;

                $dia7_clase ='bi-red';
                $dia8_clase ='bi-red';
                $dia9_clase ='bi-red';
                
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

                if(empty($value->attributes->MESA_DIA_7->data->attributes->url)){
                    $dia7_name = 'DÍA 7';
                    $dia7_file = '#';
                }else{
                    $dia7_name = $value->attributes->MESA_DIA_7->data->attributes->name;
                    $dia7_file = $value->attributes->MESA_DIA_7->data->attributes->url;
                    $dia7_clase = 'bi-green';
                }

                if(empty($value->attributes->MESA_DIA_8->data->attributes->url)){
                    $dia8_name = 'DÍA 8';
                    $dia8_file = '#';
                }else{
                    $dia8_name = $value->attributes->MESA_DIA_8->data->attributes->name;
                    $dia8_file = $value->attributes->MESA_DIA_8->data->attributes->url;
                    $dia8_clase = 'bi-green';
                } 

                if(empty($value->attributes->MESA_DIA_9->data->attributes->url)){
                    $dia9_name = 'DÍA 9';
                    $dia9_file = '#';
                }else{
                    $dia9_name = $value->attributes->MESA_DIA_9->data->attributes->name;
                    $dia9_file = $value->attributes->MESA_DIA_9->data->attributes->url;
                    $dia9_clase = 'bi-green';
                } 
                
                if(empty($value->attributes->ENCUESTA)){
                    $encuesta = '';

                }else{
                    $encuesta = $value->attributes->ENCUESTA;

                } 
                
            }               

         
        return view('layouts.agenda', compact('title','sep7','sep8','sep9','sep10','dia7_file','dia7_name','dia8_file','dia8_name','dia9_file','dia9_name','dia7_clase', 'dia8_clase','dia9_clase','encuesta'));
    }
}

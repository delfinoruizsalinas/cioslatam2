<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class NoticiasController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - NOTICIAS";
        
        // NOTICIAS
        $url = 'https://api.rss2json.com/v1/api.json?rss_url=https://expansion.mx/rss/tecnologia';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        $i=0;
        foreach ($newsData->items as $value) {
            if($i <=8){
                $img = "";
                if($value->enclosure->link){
                    $img = $value->enclosure->link;
                }else{
                    $img = $value->thumbnail;
                }
                $dateformat = Carbon::parse($value->pubDate)->format('d-m-Y h:m');
                $noticias[] = array('titulo' => $value->title, 'link'=> $value->link,'description'=> $value->description,'img'=>$img, 'fecha' =>$dateformat,'content'=>$value->content);
            }
            $i++;
        }
        
        return view('layouts.noticias', compact('title','noticias'));
    }
}

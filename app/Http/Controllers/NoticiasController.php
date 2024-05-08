<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NoticiasController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - NOTICIAS";
        $noticias =""; 
        // NOTICIAS
        /*$url = 'https://api.rss2json.com/v1/api.json?rss_url=https://expansion.mx/rss/tecnologia';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        $i=0;
        foreach ($newsData->items as $value) {
            if($i <=8){
                $img = "";
                $converted = strip_tags(Str::substr($value->content, 1, 200));

                if (strlen($converted)>0) {
                    if(empty($value->enclosure->link)){
                        $img = "https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg";
                    }else{
                        if($value->enclosure->link){
                            $img = $value->enclosure->link;
                        }else{
                            $img = $value->thumbnail;
                        }
                    }
    
                    $dateformat = Carbon::parse($value->pubDate)->format('d-m-Y h:m');
                   
    
                    $noticias[] = array('titulo' => $value->title, 'link'=> $value->link,'description'=> $value->description,'img'=>$img, 'fecha' =>$dateformat,'content'=>$converted);
                    $i++;
                }
            }
            
        }
        */
        return view('layouts.noticias', compact('title','noticias'));
    }
}

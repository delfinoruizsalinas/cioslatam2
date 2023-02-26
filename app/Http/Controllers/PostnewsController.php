<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\Models\Post_partner;
use App\Models\Free_register_partner;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\MailController;


class PostnewsController extends Controller
{
    public function index()
    {
        $title = "CIO's LATAM - Partner";
        $dt = Carbon::now();
        $fecha_hoy = Carbon::parse($dt)->translatedFormat('d F, Y');

        return view('layouts.partners', compact('title','fecha_hoy'));
    }
  
    public function getPostPartner(Request $request)
    {
      $title = "CIO's LATAM - News Post";

      $publicacion = \DB::table('post_partner')
      ->select('post_partner.*')
      ->orderBy('updated_at','DESC')
      ->where('id_usuario', '=', Auth::user()->id)
      ->get();
      $post = json_decode($publicacion);
      
      return view('layouts.post_news',compact('title','post'));
    }

    public function getUsers()
    {
      $users = \DB::table('free_register_partner')
      ->select('free_register_partner.*')
      ->orderBy('updated_at','DESC')
      ->get();
      return response(json_encode($users),200)->header('Content-type','text/plain'); 
    }
    
    public function store(Request $request)
    {
      //dd($request);
      $validator = Validator::make($request->all(),[
        'titulo' => 'required',
        'editor' => 'required',
        'imagen' => 'nullable|mimes:jpg,bmp,png,webp',
      ]);

      if($validator ->fails()){
        return back()
        ->withErrors($validator)
        ->withInput()
        ->with('ErrorInsert','Favor de llenar todos los campos');
      }else{
        $imagen = $request-> file('imagen');
        $nombreImg = time().'.'.$imagen->getClientOriginalExtension(); //20_12_222
        Image::make($imagen)->resize(360, 290)->save(public_path().'/news/'.$nombreImg);
  
        $empresa = Post_partner::create([
          'titulo' => $request->titulo,
          'imagen' => $nombreImg,
          'resumen' => $request->editor,
          'id_usuario' => Auth::user()->id
        ]);
       // return back()->with('success', 'Se guardó correctamente la publicación');
        return back()->with('Listo','El registro se actualizo correctamente');
      }
    }

    public function resumenAdmin()
    {   
        $title = "CIO's LATAM - ACTUALIZAR RESUMEN";

        $info_partner = \DB::table('free_register_partner')
        ->select('free_register_partner.*')
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();
        $info_partner = json_decode($info_partner);

        return view('layouts.partners_resumen_admin', compact('title','info_partner'));   
    }

    public function editarResumen(Request $request)
    {
        $resumen = Free_register_partner::find($request->id_resumen);
        $resumen->resumen = $request->resumen;
        $resumen->clientes = $request->clientes;
        $resumen->servicios = $request->servicios;
        $resumen->anios_mercado = $request->anios_mercado;

        $resumen->save();
        return back()->with('Listo','El registro se actualizo correctamente');
    }
    public function editUser(Request $request)
    {
      $register = Free_register_partner::find($request->id_user);
      
      //dd($request);
      $usuario = User::create([
        'name' => $register->nom_contacto,
        'password' => $register->password,
        'email' => $register->correo_empresarial,
        'rol' => 'partner',
        'partner' => $request->imagen_user,
      ]);
      //$usuario();

      $register->estatus = $request->act_user;
      $register->id_usuario = $usuario->id;
      
      $register->save();
      if($request->act_user == 1){
        app(MailController::class)->mailPartnerActivation();
      }
      return back()->with('Listo','El registro se actualizo correctamente');
    }
    
    public function getList()
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
            $nombre = $valuepart->attributes->nombre;  
            $partnL[] = array(
                                'link'=> $link,                                       
                                'imagen' => $urlImg,
                                'nombre' => $nombre,           
                            );
        }
        return response(json_encode($partnL),200)->header('Content-type','text/plain'); 
    }
}

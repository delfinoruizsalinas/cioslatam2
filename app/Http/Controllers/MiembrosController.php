<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Free_register_miembro;
use App\Http\Controllers\MailController;
use App\Models\User;

use Validator;
use Image;
use Hash;
use Auth;



class MiembrosController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - MIEMBROS REGISTRO";
        return view('layouts.miembros_registro', compact('title'));   
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nom_contacto" => "required",
            "ap_contacto" => "required",
            "num_contacto" => "required",
            "correo_personal" => 'required|min:3|email',
            "password" => "required|min:8|required_with:password2|same:password2",
            "password2" => "required|min:8",
            "nom_empresa" => "required",
        ]);
        
        if($validator ->fails()){
            return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos');
          }else{
            
            $empresa = Free_register_miembro::create([
                'nom_contacto' => $request->nom_contacto,
                'ap_contacto' => $request->ap_contacto,
                'num_contacto' => $request->num_contacto,
                'num_sec' => $request->num_sec,
                'correo_personal' => $request->correo_personal,
                'password' => Hash::make($request->password),
                'nom_empresa' => $request->nom_empresa,
            ]);

            app(MailController::class)->mailMiembro();
           // return back()->with('success', 'Se guardó correctamente la publicación');
            return back()->with('Listo','El registro se actualizo correctamente, recibiras un correo de confirmación.');
        }

    }
   
    public function detalleContenido($titulo)
    {
        $title = "CIO's LATAM - MIEMBROS DETALLE CONTENIDO";
        
        $tituloNote = str_replace('-', ' ', $titulo);
        //dd($titulo);
        $publicacion = \DB::table('post_miembro')
        ->join('users', 'post_miembro.id_usuario', '=', 'users.id')
        ->join('free_register_miembro', 'free_register_miembro.id_usuario', '=', 'users.id')
        ->select('post_miembro.*','users.partner','free_register_miembro.nom_contacto','free_register_miembro.ap_contacto')
        ->orderBy('updated_at','DESC')
        ->where('post_miembro.titulo', '=', $tituloNote)
        ->where('post_miembro.estatus', '=', 1)
        ->get();
        
        //dd($publicacion);
        
        if(sizeof($publicacion) >=1 ){
            $detalle_contenido = json_decode($publicacion);
            $imagen = '<img src="https://cioslatam.com/news/'.$detalle_contenido[0]->imagen.'">';
            
            $shareComponent = \Share::page(url('miembros-detalle/'.$titulo))
            ->linkedin();
    
            return view('layouts.miembros_detalle_contenido', compact('title','detalle_contenido','shareComponent'));   
        }else{
            return redirect('/');
        } 
    }
    public function showMiembros()
    {
        $title = "CIO's LATAM - VOZ DE NUESTROS MIMEBROS";
        $dataPostMiembro = \DB::table('post_miembro')
        ->join('users', 'post_miembro.id_usuario', '=', 'users.id')
        ->join('free_register_miembro', 'free_register_miembro.id_usuario', '=', 'users.id')
        ->select('post_miembro.*','users.partner','free_register_miembro.nom_contacto','free_register_miembro.ap_contacto')
        ->where('post_miembro.estatus','=',1)
        ->orderBy('updated_at','DESC')
        ->get();


        return view('layouts.voz_miembros', compact('title','dataPostMiembro')); 
    }
}
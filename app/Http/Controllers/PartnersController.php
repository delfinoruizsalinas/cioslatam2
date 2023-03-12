<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Free_register_partner;
use App\Http\Controllers\MailController;
use App\Models\User;

use Validator;
use Image;
use Hash;
use Auth;

class PartnersController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - PARTNERS REGISTRO";
        return view('layouts.partners_registro', compact('title'));   
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nom_contacto" => "required",
            "ap_contacto" => "required",
            "num_contacto" => "required",
            "correo_empresarial" => 'required|min:3|email',
            "password" => "required|min:8|required_with:password2|same:password2",
            "password2" => "required|min:8",
            "nom_empresa" => "required",
            "website" => "required"
        ]);
        
        if($validator ->fails()){
            return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos');
          }else{
            if($request->hasFile('curriculum')){
                $curriculum = $request-> file('curriculum');
                $nombreFile = time().'.'.$curriculum->extension(); //20_12_222
                $destino = public_path('cvs');
                $request->curriculum->move($destino,$nombreFile);
            }else{
                $nombreFile =null;
            }

            
            $empresa = Free_register_partner::create([
                'nom_contacto' => $request->nom_contacto,
                'ap_contacto' => $request->ap_contacto,
                'num_contacto' => $request->num_contacto,
                'num_sec' => $request->num_sec,
                'correo_empresarial' => $request->correo_empresarial,
                'password' => Hash::make($request->password),
                'nom_empresa' => $request->nom_empresa,
                'website' => $request->website,
                'editor' => $request->editor,
                'curriculum' => $nombreFile
            ]);

            app(MailController::class)->mailPartner();
           // return back()->with('success', 'Se guardó correctamente la publicación');
            return back()->with('Listo','El registro se actualizo correctamente, recibiras un correo de confirmación.');
        }

    }

    public function detalle($id)
    {   

        $title = "CIO's LATAM - RESUMEN";

        $info_partner = \DB::table('free_register_partner')
        ->select('free_register_partner.*')
        ->where('id', '=', $id)
        ->get();

        $users = User::find($info_partner[0]->id_usuario);
        $ruta_partner = $users->partner;
        $info_partner = json_decode($info_partner);                         
        return view('layouts.partners_detalle', compact('title','info_partner','ruta_partner'));   
        
    }


    public function page_resumen()
    {   
        $title = "CIO's LATAM - PARTNERS RESUMEN";
        //RESUMEN DE PARTNERS
        $publicacion = \DB::table('users')
        ->join('free_register_partner', 'free_register_partner.id_usuario', '=', 'users.id')
        ->where('users.rol', '=', 'partner')
        ->where('free_register_partner.estatus', '=', 1)
        ->select('users.id', 'users.partner', 'users.rol', 'free_register_partner.id as id_resumen')        
        ->get();

    
        $detalle_contenido = json_decode($publicacion);
        //dd($detalle_contenido);
        return view('layouts.partners_resumen', compact('title','detalle_contenido'));   
    }
    
    public function detalleContenido($id)
    {
        $title = "CIO's LATAM - PARTNERS DETALLE CONTENIDO";

        $publicacion = \DB::table('post_partner')
        ->join('users', 'post_partner.id_usuario', '=', 'users.id')
        ->select('post_partner.*','users.partner')
        ->orderBy('updated_at','DESC')
        ->where('post_partner.id', '=', $id)
        ->get();
       
        $detalle_contenido = json_decode($publicacion);


        return view('layouts.partners_detalle_contenido', compact('title','detalle_contenido'));   
    }

}

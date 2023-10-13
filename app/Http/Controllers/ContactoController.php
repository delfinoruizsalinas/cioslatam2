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

class ContactoController extends Controller
{
    public function index(){
        $title = "CIO's LATAM - CONTACTO";
        return view('layouts.contacto', compact('title'));    
    }
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nombre" => "required|min:3",
            "email" => "required|min:3|email",
            "telefono" => "required|min:3",
            "mensaje" => 'required|min:3',
        ]);
        
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos para poder contactarnos por éste medio.');
          }else{
            
            $mailData = [
                'nombre' => $request->nombre,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'mensaje' => $request->mensaje
            ];

            //dd($mailData);

            app(MailController::class)->mailContacto($mailData);
            // return back()->with('success', 'Se guardó correctamente la publicación');
             return back()->with('Listo','Hemos recibido tu mensaje.');
           
        }

    }
}

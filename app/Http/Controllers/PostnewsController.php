<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\Models\Post_partner;
use App\Models\Post_miembro;
use App\Models\Free_register_partner;
use App\Models\Free_register_miembro;
use App\Models\User;
use Auth;
use Session;
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
      $users = null;
      $post_miembros = null;

      if(Auth::user()->rol == "partner"){

        $publicacion = \DB::table('post_partner')
        ->select('post_partner.id','post_partner.titulo','post_partner.imagen','post_partner.resumen','post_partner.updated_at')
        ->orderBy('updated_at','DESC')
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();
  
      }else if(Auth::user()->rol == "admin"){
        $publicacion = \DB::table('post_partner')
        ->select('post_partner.id','post_partner.titulo','post_partner.imagen','post_partner.resumen','post_partner.updated_at','free_register_partner.nom_empresa')
        ->join('free_register_partner', 'free_register_partner.id_usuario', '=', 'post_partner.id_usuario')
        ->orderBy('post_partner.updated_at','DESC')
        ->get();
        
        $post_miembros = \DB::table('post_miembro')
        ->select('post_miembro.id','post_miembro.titulo','post_miembro.imagen','post_miembro.updated_at','free_register_miembro.nom_contacto','free_register_miembro.ap_contacto')
        ->join('free_register_miembro', 'free_register_miembro.id_usuario', '=', 'post_miembro.id_usuario')
        ->orderBy('post_miembro.updated_at','DESC')
        ->get();
        
        //Usuarios del sistema
        $users = \DB::table('users')
        ->select('*')
        ->where('users.rol','!=','admin')
        ->get();


      }else if(Auth::user()->rol == "miembro"){
        $publicacion = \DB::table('post_miembro')
        ->select('post_miembro.id','post_miembro.titulo','post_miembro.imagen','post_miembro.resumen','post_miembro.updated_at')
        ->orderBy('updated_at','DESC')
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();
       
      }
      $post = json_decode($publicacion);
      
      
      if(Auth::user()->status == 'inactive'){
        Session::flush();
        Auth::logout();
        return redirect('login');

      }else{
        return view('layouts.post_news',compact('title','post','users','post_miembros'));    
      }
    
    }
    
    
    public function borrarPostPartner(Request $request)
    {

      $post_partner = Post_partner::find($request->id);
      $post_partner->delete();
      
      return response()->json('ok');
      //return response(json_encode($post_partner),200)->header('Content-type','text/plain'); 
      //return back()->with('Listo', 'El registro se eliminó correctamente');
    }    

    public function borrarPostMiembro(Request $request)
    {

      $post_partner = Post_miembro::find($request->id);
      $post_partner->delete();
      
      return response()->json('ok');
      //return response(json_encode($post_partner),200)->header('Content-type','text/plain'); 
      //return back()->with('Listo', 'El registro se eliminó correctamente');
    }    

    //Lista de solicitudes a aprobar de usuarios partners
    public function getUsersPartners()
    {
      $solicitud_users_partner = \DB::table('free_register_partner')
      ->select('*')
      ->where('free_register_partner.id_usuario','=',0)
      ->orderBy('updated_at','DESC')
      ->get();

      
      return response(json_encode($solicitud_users_partner),200)->header('Content-type','text/plain'); 
    }
   
    //Lista de solicitudes a aprobar de usuarios miembros
    public function getUsersMiembros()
    {
      $solicitud_users_partner = \DB::table('free_register_miembro')
      ->select('*')
      ->where('free_register_miembro.id_usuario','=',0)
      ->orderBy('updated_at','DESC')
      ->get();

      
      return response(json_encode($solicitud_users_partner),200)->header('Content-type','text/plain'); 
    }

    public function borrarPartners(Request $request)
    {
      
      $Userpartner = User::find($request->id);
      $Userpartner->status = "inactive"; 
      $Userpartner->save();
      if($Userpartner->wasChanged() == 1){
        $post_partner = Post_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 0]);
        $resumen = Free_register_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 0]);

      }

      return response()->json('ok');
    }

    public function borrarMiembros(Request $request)
    {
      
      $UserMiembro = User::find($request->id);
      $UserMiembro->status = "inactive"; 
      $UserMiembro->save();
      if($UserMiembro->wasChanged() == 1){
        $post_miembro = Post_miembro::where('id_usuario', '=', $request->id)->update(['estatus' => 0]);
        //$resumen = Free_register_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 0]);

      }

      return response()->json('ok');
    }
    
    public function activarPartners(Request $request)
    {
      
      $Userpartner = User::find($request->id);
      $Userpartner->status = "active"; 
      $Userpartner->save();
      if($Userpartner->wasChanged() == 1){
        $post_partner = Post_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 1]);
        $resumen = Free_register_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 1]);
      }

      return response()->json('ok');
    }

    public function activarMiembros(Request $request)
    {
      
      $UserMiembro = User::find($request->id);
      $UserMiembro->status = "active"; 
      $UserMiembro->save();
      if($UserMiembro->wasChanged() == 1){
        $post_miembro = Post_miembro::where('id_usuario', '=', $request->id)->update(['estatus' => 1]);
        //$resumen = Free_register_partner::where('id_usuario', '=', $request->id)->update(['estatus' => 1]);
      }

      return response()->json('ok');
    }

    public function getPartner(Request $request)
    { 
      $post_partner = Post_partner::find($request->id);
      return response(json_encode($post_partner),200)->header('Content-type','text/plain');     
    }

    public function getMiembro(Request $request)
    { 
      $post_miembro = Post_miembro::find($request->id);
      return response(json_encode($post_miembro),200)->header('Content-type','text/plain');     
    }

    //actualizar partner
    public function updatePostPartner(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'titulo_up' => 'required',
        'editor_up' => 'required',
      ]);

      if($validator ->fails()){
        return back()
        ->withErrors($validator)
        ->withInput()
        ->with('ErrorInsert','Favor de llenar todos los campos');
      }else{
        $post_partner = Post_partner::find($request->id_post);
        $imagen = $request-> file('imagen_up');
        if ($imagen == null) {
          $post_partner->titulo = $request->titulo_up;
          $post_partner->resumen = $request->editor_up;
          $post_partner->save();
        }else{
          
          $imagen = $request-> file('imagen_up');
          $nombreImg = time().'.'.$imagen->getClientOriginalExtension(); //20_12_222
          Image::make($imagen)->resize(360, 290)->save(public_path().'/news/'.$nombreImg);

          $post_partner->titulo = $request->titulo_up;
          $post_partner->resumen = $request->editor_up;
          $post_partner->imagen = $nombreImg;        
          
          $post_partner->save();
        }

       // return back()->with('success', 'Se guardó correctamente la publicación');
        return back()->with('Listo','El registro se actualizo correctamente');
      }
    }

    //actualizar un miembro
    public function updatePostMiembro(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'titulo_up_miembro' => 'required',
        'editor_up_miembro' => 'required',
      ]);

      if($validator ->fails()){
        return back()
        ->withErrors($validator)
        ->withInput()
        ->with('ErrorInsert','Favor de llenar todos los campos');
      }else{
        $post_miembro = Post_miembro::find($request->id_post_miembro);
        $imagen = $request-> file('imagen_up_miembro');
        if ($imagen == null) {
          $post_miembro->titulo = $request->titulo_up_miembro;
          $post_miembro->resumen = $request->editor_up_miembro;
          $post_miembro->save();
        }else{
          
          $imagen = $request-> file('imagen_up_miembro');
          $nombreImg = time().'.'.$imagen->getClientOriginalExtension(); //20_12_222
          Image::make($imagen)->resize(360, 290)->save(public_path().'/news/'.$nombreImg);

          $post_miembro->titulo = $request->titulo_up_miembro;
          $post_miembro->resumen = $request->editor_up_miembro;
          $post_miembro->imagen = $nombreImg;        
          
          $post_miembro->save();
        }

       // return back()->with('success', 'Se guardó correctamente la publicación');
        return back()->with('Listo','El registro se actualizo correctamente');
      }
    }

    public function store(Request $request)
    {
      //dd($request);
      $validator = Validator::make($request->all(),[
        'titulo' => 'required',
        'editor' => 'required',
        'imagen' => 'required|mimes:jpg,bmp,png,webp',
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

    //funcion postear articulo de un miembro
    public function create_post_miembro(Request $request)
    {
      //dd($request);
      $validator = Validator::make($request->all(),[
        'titulo_miembro' => 'required',
        'editor_miembro' => 'required',
        'imagen_miembro' => 'required|mimes:jpg,bmp,png,webp',
      ]);

      if($validator ->fails()){
        return back()
        ->withErrors($validator)
        ->withInput()
        ->with('ErrorInsert','Favor de llenar todos los campos');
      }else{
        $imagen = $request-> file('imagen_miembro');
        $nombreImg = time().'.'.$imagen->getClientOriginalExtension(); //20_12_222
        Image::make($imagen)->resize(360, 290)->save(public_path().'/news/'.$nombreImg);
  
        $empresa = Post_miembro::create([
          'titulo' => $request->titulo_miembro,
          'imagen' => $nombreImg,
          'resumen' => $request->editor_miembro,
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

    public function resumeninfGeneralAdmin()
    {   
        $title = "CIO's LATAM - ACTUALIZAR INFORMACIÓN GENERAL";

        $info_partner = \DB::table('free_register_partner')
        ->select('free_register_partner.*')
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();
        //dd($info_partner);
        $info_partner = json_decode($info_partner);

        return view('layouts.partners_informacion_general_admin', compact('title','info_partner'));   
    }

    public function updateInfGeneralAdmin(Request $request)
    {

      $validator = Validator::make($request->all(),[
        "nom_contacto" => "required",
        "ap_contacto" => "required",
        "num_contacto" => "required",
        "correo_empresarial" => 'required|min:3|email',
        "nom_empresa" => "required",
        "website" => "required"
      ]);

      if($validator ->fails()){
        return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos');
      }else{
        $resumen = Free_register_partner::find($request->id_resumen);

        $resumen->nom_contacto = $request->nom_contacto;
        $resumen->ap_contacto = $request->ap_contacto;
        $resumen->num_contacto = $request->num_contacto;
        $resumen->num_sec = $request->num_sec;
        $resumen->correo_empresarial = $request->correo_empresarial;
        $resumen->nom_empresa = $request->nom_empresa;
        $resumen->website = $request->website;

        $resumen->save();
        return back()->with('Listo','El registro se actualizo correctamente');
      }

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
      $validator = Validator::make($request->all(),[
        "partner" => "required",
        "aprobar_cuenta" => 'required',
      ]);
      if($validator ->fails()){
        return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos');

      }else{
        $register = Free_register_partner::find($request->id_registro_partner);
        //id_registro_partner
        //imagen_user
        //dd($register->id_usuario);
        if($register->id_usuario == 0){ //Se activa cuenta y No existe un usuario creado
          $usuario = User::create([
            'name' => $register->nom_contacto,
            'password' => $register->password,
            'email' => $register->correo_empresarial,
            'rol' => 'partner',
            'partner' => $request->imagen_user,
          ]);
          $id_user_user_create = User::latest('id')->first(); //Se retornan los datos del nuevo usuario en la tabla Users

          $register->id_usuario = $id_user_user_create->id;
          $register->estatus = 1;
          $register->save();

          if($register->wasChanged() == 1){ //si se actualizó se envía mail
            app(MailController::class)->mailPartnerActivation($register->correo_empresarial);
            return back()->with('Listo','El registro se actualizo correctamente');
          }

        }else{
            return back()->with('ErrorInsert','El partner ya tiene una usuario creado');
        }
        
      }
    }

    public function activeUserMiembro(Request $request)
    {
      $validator = Validator::make($request->all(),[
        "id_registro_miembro" => "required",
        "aprobar_cuenta_miembro" => 'required',
      ]);
      if($validator ->fails()){
        return back()
            ->withErrors($validator)
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos');

      }else{
        $register = Free_register_miembro::find($request->id_registro_miembro);
        //id_registro_partner
        //imagen_user
        //dd($register->id_usuario);
        if($register->id_usuario == 0){ //Se activa cuenta y No existe un usuario creado
          $usuario = User::create([
            'name' => $register->nom_contacto,
            'password' => $register->password,
            'email' => $register->correo_personal,
            'rol' => 'miembro',
          ]);
          $id_user_user_create = User::latest('id')->first(); //Se retornan los datos del nuevo usuario en la tabla Users

          $register->id_usuario = $id_user_user_create->id;
          $register->estatus = 1;
          $register->save();

          if($register->wasChanged() == 1){ //si se actualizó se envía mail
            app(MailController::class)->mailMiembroActivation($register->correo_personal);
            return back()->with('Listo','El registro se actualizo correctamente');
          }

        }else{
            return back()->with('ErrorInsert','El partner ya tiene una usuario creado');
        }
        
      }
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

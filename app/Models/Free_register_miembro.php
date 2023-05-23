<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free_register_miembro extends Model
{
    protected $table = 'free_register_miembro';
    protected $fillable =[
        'nom_contacto',
        'ap_contacto',
        'num_contacto',
        'num_sec',
        'correo_personal',
        'password',
        'nom_empresa',
        'estatus',
        'id_usuario',
    ];
}

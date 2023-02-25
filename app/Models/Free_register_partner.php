<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free_register_partner extends Model
{
    protected $table = 'free_register_partner';
    protected $fillable =[
        'usuario',
        'nom_contacto',
        'ap_contacto',
        'num_contacto',
        'num_sec',
        'correo_empresarial',
        'password',
        'password2',
        'nom_empresa',
        'website',
        'curriculum',
        'resumen',
        'clientes',
        'servicios',
        'anios_mercado',
        'id_usuario',
    ];
}

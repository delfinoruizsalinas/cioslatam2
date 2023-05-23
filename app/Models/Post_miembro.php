<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_miembro extends Model
{
    protected $table = 'post_miembro';
    protected $fillable =[
        'titulo',
        'imagen',
        'resumen',
        'id_usuario',
    ];
}

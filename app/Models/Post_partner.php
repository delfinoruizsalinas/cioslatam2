<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_partner extends Model
{
    protected $table = 'post_partner';
    protected $fillable =[
        'titulo',
        'imagen',
        'resumen',
        'id_usuario',
    ];
}

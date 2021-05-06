<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'idCategoria', 'email', 'telefono', 'descripcion', 'imagen', 'idUsuario'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}

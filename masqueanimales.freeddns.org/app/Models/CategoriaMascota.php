<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMascota extends Model
{
    use HasFactory;

    protected $table = "categorias_animal";
    protected $fillable = ['nombre'];
    protected $hidden = ['created_at', 'updated_at'];
    // Los siguientes campos del array $dates, será considerados como fechas 
    //y serán accesibles directamente a través de funciones Carbon (para poder operar con ellos o cambiarles el formato)
    protected $dates = ['created_at', 'updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = ['idCategoria', 'nombre', 'edad', 'sexo', 'imagen'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}

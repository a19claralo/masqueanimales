<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasAnunciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_anuncio')->insert([
            'nombre' => 'Desaparecidos'
        ]);
        DB::table('categorias_anuncio')->insert([
            'nombre' => 'Solidario'
        ]);
        DB::table('categorias_anuncio')->insert([
            'nombre' => 'Otros'
        ]);
    }
}

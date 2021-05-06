<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasMascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_animal')->insert([
            'nombre' => 'Perros'
        ]);
        DB::table('categorias_animal')->insert([
            'nombre' => 'Gatos'
        ]);
        DB::table('categorias_animal')->insert([
            'nombre' => 'Otros'
        ]);
    }
}

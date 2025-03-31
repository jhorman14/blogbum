<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre_categoria' => 'Tecnología'],
            ['nombre_categoria' => 'Deportes'],
            ['nombre_categoria' => 'Viajes'],
            ['nombre_categoria' => 'Comida'],
            ['nombre_categoria' => 'Música'],
            ['nombre_categoria' => 'Libros'],
            ['nombre_categoria' => 'Películas'],
            ['nombre_categoria' => 'Videojuegos'],
            ['nombre_categoria' => 'Moda'],
            ['nombre_categoria' => 'Arte'],
        ]);
    }
}
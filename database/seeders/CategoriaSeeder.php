<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Bebida',
                'descripcion' => 'Bebidas frías y calientes',
            ],
            [
                'nombre' => 'Postre',
                'descripcion' => 'Dulces y postres variados',
            ],
            [
                'nombre' => 'Comida',
                'descripcion' => 'Platos principales y guarniciones',
            ],
        ]);
    }
}

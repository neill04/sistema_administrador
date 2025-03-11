<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesTableSeeder extends Seeder
{
    public function run(): void
    {
        $paises = [
            'Argentina', 'Brasil', 'Chile', 'Colombia', 'Ecuador',
            'México', 'Perú', 'Venezuela', 'Bolivia', 'Paraguay',
            'Uruguay', 'Costa Rica', 'Panamá', 'Guatemala', 'Honduras',
            'El Salvador', 'Nicaragua', 'Cuba', 'República Dominicana', 'España'
        ];

        foreach ($paises as $pais) {
            DB::table('paises')->insert([
                'nombre' => $pais,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

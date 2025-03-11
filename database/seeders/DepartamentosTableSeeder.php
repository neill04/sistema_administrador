<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    public function run(): void
    {
        $peruId = DB::table('paises')->where('nombre', 'Perú')->value('id');

        if (!$peruId) {
            return; // Si no se encuentra Perú, no inserta nada.
        }

        $departamentos = [
            'Amazonas', 'Áncash', 'Apurímac', 'Arequipa', 'Ayacucho',
            'Cajamarca', 'Callao', 'Cusco', 'Huancavelica', 'Huánuco',
            'Ica', 'Junín', 'La Libertad', 'Lambayeque', 'Lima',
            'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco', 'Piura',
            'Puno', 'San Martín', 'Tacna', 'Tumbes', 'Ucayali'
        ];

        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert([
                'nombre' => $departamento,
                'pais_id' => $peruId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

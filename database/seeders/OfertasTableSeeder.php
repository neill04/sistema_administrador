<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Empresa;

class OfertasTableSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener una empresa aleatoria (asumiendo que ya hay empresas creadas)
        $empresa = Empresa::inRandomOrder()->first();

        if (!$empresa) {
            // Si no hay empresas, lanzar una advertencia
            $this->command->warn('No hay empresas en la base de datos. Agrega algunas antes de ejecutar este seeder.');
            return;
        }

        // Insertar datos en la tabla ofertas
        DB::table('ofertas')->insert([
            [
                'empresa_id' => $empresa->id,
                'titulo_oferta' => 'Desarrollador Web',
                'informacion_adicional' => 'Se busca desarrollador con experiencia en PHP y Laravel.',
                'url' => 'https://empresa.com/trabajo/desarrollador-web',
                'cargo' => 'Desarrollador',
                'area' => 'Tecnología',
                'numero_vacantes' => 3,
                'celular_contacto' => '987654321',
                'correo_contacto' => 'contacto@empresa.com',
                'fecha_vencimiento' => now()->addDays(30), // 30 días después de hoy
                'tipo_oferta' => 'Contrato a plazo fijo',
                'salario' => '1025 - 1500',
                'jornada_laboral' => 'Tiempo completo',
                'disponibilidad' => 'Inmediata',
                'ubicacion_oferta' => 'Trabajo en Lima',
                'dirigido' => 'Egresado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'empresa_id' => $empresa->id,
                'titulo_oferta' => 'Analista de Datos',
                'informacion_adicional' => 'Experiencia con SQL y Python.',
                'url' => 'https://empresa.com/trabajo/analista-datos',
                'cargo' => 'Analista',
                'area' => 'Datos',
                'numero_vacantes' => 2,
                'celular_contacto' => '987654322',
                'correo_contacto' => 'contacto@empresa.com',
                'fecha_vencimiento' => now()->addDays(45), // 45 días después de hoy
                'tipo_oferta' => 'Prácticas profesionales',
                'salario' => '1510 - 2000',
                'jornada_laboral' => 'Medio tiempo',
                'disponibilidad' => 'Proceso de selección',
                'ubicacion_oferta' => 'Trabajo en Sede principal',
                'dirigido' => 'Bachiller',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $this->command->info('✅ Se han insertado ofertas de trabajo en la base de datos.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTiposSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            'Aeronaves/Astillero',
            'Agrícola/Ganadera/Agroindustria',
            'Agroindustria',
            'Agua y alcantarillado/Obras Sanitarias',
            'Arquitectura/Diseño/Decoración',
            'Automotriz',
            'Bancos/Financieras',
            'Carpintería/Muebles',
            'Científica',
            'Combustibles (Gas/Petróleo)',
            'Comercial',
            'Comercio Mayorista (Intermediac./Dist.)',
            'Comercio Minorista',
            'Confecciones',
            'Construcción',
            'Consultor en RRHH',
            'Consultoría/Asesoría',
            'Consumo Masivo (Bebidas/Alimentos/etc)',
            'Defensa',
            'Educación/Capacitación',
            'Electricidad (Distribución/Generación)',
            'Electrónica',
            'Entretenimiento',
            'Estudios Jurídicos',
            'Exportación/Importación/Comercio exterior',
            'Farmacéutica',
            'Forestal/Papel/Celulosa',
            'Gobierno',
            'Head-Hunters',
            'Hotelería/Turismo/Restaurantes',
            'Imprenta/Editoriales',
            'Ingeniería',
            'Inmobiliaria/Propiedades',
            'Internet',
            'Inversiones (Soc./Cías. Holding)',
            'Investigación de Mercado',
            'Logística/Distribución',
            'Manufacturas Varias',
            'Materiales de Construcción',
        ];

        foreach ($tipos as $tipo) {
            DB::table('empresa_tipos')->insert([
                'nombre' => $tipo
            ]);
        }
    }
}

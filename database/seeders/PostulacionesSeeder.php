<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Oferta;

class PostulacionesSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();  
        $oferta = Oferta::first();  

        if ($user && $oferta) {
            if (!$user->postulaciones->contains($oferta->id)) {
                $user->postulaciones()->attach($oferta->id);
                echo "¡Postulación realizada correctamente! \n";
            } else {
                echo "El usuario ya ha postulado a esta oferta. \n";
            }
        } else {
            echo "No se encontraron el usuario o la oferta. \n";
        }
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\User;

class InicioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('inicio', function ($view) {
            $view->with([
                'Desarrollo' => User::where('carrera', 'Desarrollo de Sistemas de Información')->count(),
                'Construccion' => User::where('carrera', 'Construcción Civil')->count(),
                'Contabilidad' => User::where('carrera', 'Contabilidad')->count(),
                'Electricidad' => User::where('carrera', 'Electricidad Industrial')->count(),
                'Electronica' => User::where('carrera', 'Electrónica Industrial')->count(),
                'Mecatronica' => User::where('carrera', 'Mecatrónica Automotriz')->count(),
                'Mecanica' => User::where('carrera', 'Mecánica de Producción Industrial')->count(),
                'Produccion' => User::where('carrera', 'Producción Agropecuaria')->count(),
                'Secretariado' => User::where('carrera', 'Secretariado Ejecutivo')->count(),
            ]);
        });
    }
}

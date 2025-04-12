<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Postulacion;

class BolsaLaboralServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.bolsa_laboral', function ($view) {
            $view->with([
                'totalEmpresas' => Empresa::count(),
                'totalOfertas' => Oferta::count(),
                'totalPostulaciones' => Postulacion::count(),
            ]);
        });
    }
}

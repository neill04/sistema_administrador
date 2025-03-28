<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Empresa;
use App\Models\Oferta;

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
                // Agrega otros contadores si es necesario
            ]);
        });
    }
}

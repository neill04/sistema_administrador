<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\EmpresaPolicy;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('manage-companies', [EmpresaPolicy::class, 'manage']);
        Gate::define('view-cvs', [UserPolicy::class, 'viewCvs']);
    }
}

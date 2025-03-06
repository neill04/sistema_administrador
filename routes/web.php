<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

use App\Http\Controllers\EmpresaController;

Route::resource('empresas', EmpresaController::class);


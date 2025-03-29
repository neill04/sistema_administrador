<?php

use Illuminate\Support\Facades\Route;

// Ruta para el manejo de la bolsa laboral
Route::get('/bolsa_laboral', function () {
    return redirect()->route('empresas.index');
})->name('bolsa_laboral');

// Ruta inicial de la página web
Route::get('/', function () {
    return view('inicio');
})->name('inicio');


use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpresaTipoController;
use App\Http\Controllers\PaisController;

// Oferta
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\OfertaAtributoController;

Route::resource('empresas', EmpresaController::class);
Route::get('/paises', [PaisController::class, 'index']);
Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/empresa_tipos', [EmpresaTipoController::class, 'index']);
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index'); // Mostrar todas las empresas
Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store'); // Guardar una nueva empresa
Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update');

// Ruta para ofertas
Route::resource('ofertas', OfertaController::class); // Crea las rutas CRUD para ofertas
Route::resource('ofertas.atributos', OfertaAtributoController::class)->shallow(); 







<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpresaTipoController;
use App\Http\Controllers\PaisController;

Route::resource('empresas', EmpresaController::class);
Route::get('/paises', [PaisController::class, 'index']);
Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/tipos-empresa', [EmpresaTipoController::class, 'index']);
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');







<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CvController;

use App\Http\Controllers\EmpresaController;

use App\Http\Controllers\OfertaController;
use App\Http\Controllers\OfertaAtributoController;
use App\Http\Controllers\PostulacionController;


// Ruta para el manejo de la bolsa laboral
Route::get('/bolsa_laboral', function () {
    return redirect()->route('empresas.index');
})->name('bolsa_laboral');

// Ruta inicial de la página web

Route::get('/', function () {
    return view('inicio');
})->name('inicio');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/professor/dashboard', [DashboardController::class, 'index'])->name('professor.dashboard')->middleware('auth');
Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::post('/subir-cv', [CvController::class, 'store'])->name('subir.cv');
});

// Ruta para la gestión de CVs
Route::middleware(['auth', 'can:viewCvs,App\Models\User'])->group(function () {
    Route::get('/cvs', [CvController::class, 'Cvs'])->name('alumnos.cvs');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mi-cv', [CvController::class, 'miCv'])->name('mi.cv');
    Route::get('/ofertas-trabajo', [OfertaController::class, 'index'])->name('ofertas.trabajo');
});

// Ruta para la gestión de empresas
Route::middleware(['auth', 'can:manage,App\Models\Empresa'])->group(function () {
    Route::resource('empresas', EmpresaController::class);
});

// Ruta para la gestión de ofertas
Route::middleware(['auth'])->group(function () {
    Route::resource('ofertas', OfertaController::class);  
});

Route::middleware(['auth', 'can:view_create,App\Models\Oferta'])->group(function () {
    Route::get('/ofertas/create', [OfertaController::class, 'create'])->name('ofertas.create');
});

Route::middleware(['auth', 'can:postular,App\Models\User'])->group(function () {
    Route::post('/postulaciones/{oferta}', [PostulacionController::class, 'store'])->name('postulaciones.store');
});


Route::resource('ofertas.atributos', OfertaAtributoController::class)->shallow(); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

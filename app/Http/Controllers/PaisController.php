<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function create()
    {
        $paises = Pais::all(); // Obtiene todos los paises
        return view('empresas.index', compact('paises')); // Envía los datos a la vista
    }
}

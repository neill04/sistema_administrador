<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function create()
    {
        $departamentos = Departamento::all(); // Obtiene todos los departamentos
        return view('empresas.index', compact('departamentos')); // Envia los datos a la vista
    }
}

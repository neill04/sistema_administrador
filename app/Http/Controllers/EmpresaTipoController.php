<?php

namespace App\Http\Controllers;

use App\Models\EmpresaTipo;
use Illuminate\Http\Request;

class EmpresaTipoController extends Controller
{
    public function index()
    {
        $empresa_tipos = EmpresaTipo::all(); // Obtiene los tipos de empresa
        return view('empresas.index', compact('empresa_tipos')); // Envía los datos a la vista
    }
}

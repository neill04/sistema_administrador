<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    // Método para el Dashboard
    public function index()
    {
        // Comprobamos el rol y devolvemos la vista correspondiente
        if (Auth::user()->role == 'admin') {
            return redirect()->route('empresas.index'); // Vista para el administrador
        } elseif (Auth::user()->role == 'profesor') {
            return redirect()->route('empresas.index');  // Vista para el profesor
        } elseif (Auth::user()->role == 'estudiante') {
            return redirect()->route('ofertas.index');  // Vista para el estudiante
        }

        // Si no se encuentra el rol, redirige a una página de error o inicio
        return redirect()->route('home');
    }
}

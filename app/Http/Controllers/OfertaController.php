<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::all(); // Obtiene todas las ofertas
        return view('ofertas.index', compact('ofertas')); // Retorna la vista con los datos
    }

    public function create()
    {
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id', // Debe existir en la tabla empresas
            'titulo_oferta' => 'required|string|max:255',
            'informacion_adicional' => 'nullable|string',
            'url' => 'nullable|url|max:255', // URL válida
            'cargo' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1', // Debe ser un número entero mayor a 0
            'celular_contacto' => 'required|string|regex:/^[0-9]{9,15}$/', // Solo números entre 9 y 15 dígitos
            'correo_contacto' => 'required|email|max:255', // Correo válido
            'fecha_vencimiento' => 'required|date|after:today', // Fecha válida y posterior a hoy

            // ✅ Validaciones para los campos ENUM
            'tipo_oferta' => 'required|in:Contrato a plazo fijo,Contrato por hora,Prácticas profesionales,Prácticas preprofesionales,No mostrar',
            'salario' => 'required|in:A tratar,1025 - 1500,1510 - 2000,2010 - 2500,2510 - 3000,3010 - 3500',
            'jornada_laboral' => 'required|in:Tiempo completo,Medio tiempo,Horario por Horas,No mostrar',
            'disponibilidad' => 'required|in:Inmediata,Proceso de selección,No mostrar',
            'ubicacion_oferta' => 'required|in:Trabajo en Sede principal,Trabajo en Lima,No mostrar',
            'dirigido' => 'required|in:Estudiante,Egresado,Bachiller,Titulado,Magister,Doctorado',
        ]);
    
        Oferta::create($request->all()); // Crea la oferta en la BD
    
        return redirect()->route('ofertas.index')->with('success', 'Oferta creada con éxito.');
    }

    public function show(Oferta $oferta)
    {
        return view('ofertas.show', compact('oferta'));
    }

    public function edit(Oferta $oferta)
    {
        return view('ofertas.edit', compact('oferta'));
    }

    public function update(Request $request, Oferta $oferta)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id', // Debe existir en la tabla empresas
            'titulo_oferta' => 'required|string|max:255',
            'informacion_adicional' => 'nullable|string',
            'url' => 'nullable|url|max:255', // URL válida
            'cargo' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1', // Debe ser un número entero mayor a 0
            'celular_contacto' => 'required|string|regex:/^[0-9]{9,15}$/', // Solo números entre 9 y 15 dígitos
            'correo_contacto' => 'required|email|max:255', // Correo válido
            'fecha_vencimiento' => 'required|date|after:today', // Fecha válida y posterior a hoy

            // ✅ Validaciones para los campos ENUM
            'tipo_oferta' => 'required|in:Contrato a plazo fijo,Contrato por hora,Prácticas profesionales,Prácticas preprofesionales,No mostrar',
            'salario' => 'required|in:A tratar,1025 - 1500,1510 - 2000,2010 - 2500,2510 - 3000,3010 - 3500',
            'jornada_laboral' => 'required|in:Tiempo completo,Medio tiempo,Horario por Horas,No mostrar',
            'disponibilidad' => 'required|in:Inmediata,Proceso de selección,No mostrar',
            'ubicacion_oferta' => 'required|in:Trabajo en Sede principal,Trabajo en Lima,No mostrar',
            'dirigido' => 'required|in:Estudiante,Egresado,Bachiller,Titulado,Magister,Doctorado',
        ]);
    
        $oferta->update($request->all()); // Actualiza la oferta
    
        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada.');
    }

    public function destroy(Oferta $oferta)
    {
        $oferta->delete(); // Elimina la oferta

        return redirect()->route('ofertas.index')->with('success', 'Oferta eliminada.');
    }
}

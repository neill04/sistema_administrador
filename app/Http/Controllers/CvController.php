<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function miCv()
    {
        $cv = Cv::where('user_id', Auth::id())->first(); // Obtener el CV del usuario autenticado
        return view('bolsa_trabajo.mi_cv', compact('cv'));
    }

    public function Cvs()
    {
        $cvs = User::where('role', 'estudiante')->has('cvs')->with('cvs')->get(); // Obtiene todos los alumnos que tienen su CV
        return view('bolsa_trabajo._cvs', compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = Auth::user();

        // Verifica si el usuario ya tiene un CV
        $cvExistente = Cv::where('user_id', $user->id)->first();

        if ($cvExistente) {
            // Elimina el archivo anterior del almacenamiento
            Storage::disk('public')->delete($cvExistente->archivo);
            
            // Elimina el registro de la base de datos
            $cvExistente->delete();
        }
    
        // Procesar el archivo subido
        $cvPath = $request->file('cv')->store('cvs', 'public');
    
        // Guardar en la base de datos
        $cv = new Cv();
        $cv->user_id = Auth::id(); // Asignar el ID del usuario autenticado
        $cv->archivo = $cvPath;
        $cv->save();
    
        return redirect()->back()->with('success', 'CV subido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

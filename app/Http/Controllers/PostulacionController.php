<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Postulacion;

class PostulacionController extends Controller
{
    public function store(Request $request, Oferta $oferta)
    {
        $user = Auth::user();

        $request->validate([
            'dni' => 'required|string|max:8',
            'telefono' => 'required|string|max:9',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
        ]);

        $yaPostulo = Postulacion::where('user_id', $user->id)
                                ->where('oferta_id', $oferta->id)
                                ->exists();

        if (!$yaPostulo) {
            Postulacion::create([
                'user_id' => $user->id,
                'oferta_id' => $oferta->id,
                'dni' => $request->dni,
                'telefono' => $request->telefono,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
            ]);

            return redirect()->back()->with('success', '¡Postulación realizada correctamente! 📨');
        }

        return redirect()->back()->with('info', 'Ya te has postulado a esta oferta ✨');
    }

    public function cancelar($id)
    {
        $postulacion = Postulacion::findOrFail($id);

        // Verifica si pertenece al usuario autenticado
        if ($postulacion->user_id != Auth::id()) {
            abort(403); // No autorizado
        }

        // Simplemente se elimina la postulación
        $postulacion->delete();

        return redirect()->back()->with('mensaje', 'Tu postulación fue cancelada con éxito 💔');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;

class PostulacionController extends Controller
{
    public function store(Request $request, Oferta $oferta)
    {
        $user = Auth::user(); // Obtienes el usuario autenticado
        $user = User::with('postulaciones')->find($user->id);

        // Evita duplicadas
        if (!$user->postulaciones->contains($oferta->id)) {
            $user->postulaciones()->attach($oferta->id);
        }

        return redirect()->back()->with('success', '¡Postulación realizada correctamente! 📨');
    }

}

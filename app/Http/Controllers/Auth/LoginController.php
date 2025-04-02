<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // Verificamos el rol del usuario y redirigimos
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard'); // Redirigir al dashboard del admin
        }

        if ($user->role == 'profesor') {
            return redirect()->route('professor.dashboard'); // Redirigir al dashboard del profesor
        }

        if ($user->role == 'estudiante') {
            return redirect()->route('student.dashboard'); // Redirigir al dashboard del estudiante
        }

        // Si no tiene un rol válido, redirigir al home
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login'); // Redirige al login después de cerrar sesión
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}

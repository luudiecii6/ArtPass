<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function muestraForm(){
        return view('login');
    }

    public function checkLogin(Request $request) {
        $parametros = $request->validate([
            'username' => ['required'],
            'contraseña' => ['required', 'min:6']
        ]);
    
        // Intenta encontrar al usuario por nombre de usuario
        $user = User::where('username', $parametros['username'])->first();
    
        // Si se encuentra el usuario y la contraseña es correcta
        if ($user && Hash::check($parametros['contraseña'], $user->contraseña)) {
            // Inicia sesión manualmente
            session()->put($user->getAttributes());
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/index');
        } else {
            // En caso de fallo, devuelve al usuario a la página de login con un mensaje de error
            return view('errorLogin');
        }
    }
    
    
    public function checkLoginLaravel(){
        $credenciales = request()->validate([
            'username' => ['required'],
            'contraseña' => ['required','min:6']
        ]);
        if (Auth::attempt(
            ["username"=>$credenciales['username'],
                "contraseña"=>$credenciales['contraseña']]
        )) {
            request()->session()->regenerate();

            return redirect('/index');
        }
        return back()->withErrors([
            'username' => 'Credenciales incorrectas.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario

        request()->session()->invalidate(); // Invalida la sesión
        request()->session()->regenerateToken(); // Regenera el token de la sesión para evitar ataques CSRF

        return redirect('/'); // Redirige al usuario a la página principal
    }

    public function showLoginForm()
    {
        return view('login');
    }

}


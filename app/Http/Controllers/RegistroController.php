<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function vistarRegistro(){
        return view('formularioRegistro');
    }

    public function crearUsuario(){
        $parametros=request()->validate([
            'nombre'=>['required', 'max:50'],
            'apellidos'=>['required', 'max:50'],
            'email'=>['required','email:rfc,dns'],
            'fecha_nacimiento'=>['required', 'date'],
            'contraseña'=>['required','min:8'],
            'username'=>['required', 'regex:/^[A-Za-z0-9]{8,}$/'],
            'comunidad'=>['required', 'max:50'],
            'ciudad'=>['required', 'max:50'],
            'codigo_postal'=>['required', 'max:5']
        ]);
        $usuario=User::create($parametros);
        session()->put($usuario->getAttributes());
        return redirect('/')->with('success', 'Usuario creado correctamente.');
    }
}


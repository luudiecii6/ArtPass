<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Método para listar usuarios
    public function listarUsers()
    {
        $usuarios = User::all();
        return view('verUsers', compact('usuarios'));
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }

    // Método para quitar el rol de administrador
    public function quitarAdmin($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->esAdmin = false;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Rol de administrador quitado correctamente');
    }

    // Método para asignar el rol de administrador
    public function hacerAdmin($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->esAdmin = true;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Rol de administrador asignado correctamente');
    }
}

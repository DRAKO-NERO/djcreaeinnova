<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Necesario para encriptar contraseñas

class UsuarioController extends Controller
{
    // Mostrará la vista con el formulario HTML para registrar
    public function create()
    {
        return view('admin.usuarios.create'); 
    }

    // Recibe los datos del formulario y los guarda en la base de datos
    public function store(Request $request)
    {
        // 1. Validar que no falten datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // 2. Crear el usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
        ]);

        // 3. Redirigir de vuelta al panel principal sin cerrar la sesión del admin
        return redirect('/admin')->with('success', 'Usuario registrado correctamente.');
    }
}
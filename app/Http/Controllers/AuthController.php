<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        // Validar que los datos lleguen correctos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar
        if (Auth::attempt($credentials)) {
            // Login exitoso - crear sesión
            $request->session()->regenerate();
            return redirect()->route('tasks.index')->with('success', '¡Bienvenido!');
        }

        // Login falló
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Credenciales invàlidas');
    }

    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        // Login automático
        Auth::login($user);

        return redirect()->route('tasks.index')->with('success', '¡Cuenta creada exitosamente!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada');
    }
}

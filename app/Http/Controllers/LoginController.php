<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller

{
    public function login()
    {
        return view('login');
    }

    /**
     * Lidar com autenticação de usuário
     */
    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Campo e-mail é obrigatório',
            'password.required' => 'Campo senha é obrigatório',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'danger' => 'E-mail ou senha inválida.',
        ])->onlyInput('email');
    }


    /**
     * Destroy session de Usuário.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // Desloga o usuário

        $request->session()->invalidate(); // Invalida a sessão

        $request->session()->regenerateToken(); // Regenera o token da sessão

        return redirect('/')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate', // Desativa o cache
            'Pragma' => 'no-cache', // Desativa o cache
            'Expires' => 'Fri, 01 Jan 1990 00:00:00 GMT' // Data de expiração passada
        ]);
    }
}

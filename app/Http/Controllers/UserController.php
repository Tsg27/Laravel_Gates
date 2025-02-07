<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('profile.users', compact('users'));
    }



    public function view_Profile()
    {
        return view('profile.Profile');
        
    }



    public function update(Request $request, User $user): RedirectResponse
    {
        // Verifique se o usuário pode atualizar os dados
        if (Gate::allows('update-user', $user)) {

            // Valida os dados
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            ]);

            // Atualiza os dados do usuário
            $user->update($validated);

            // Redireciona para a página desejada após a atualização
            return redirect()->route('profile.view')->with('status', 'Perfil atualizado com sucesso!');

        } else {
            abort(403, 'Você não tem permissão para atualizar este usuário.');
        }
    }


    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Status de administrador alterado com sucesso.');
    }
}

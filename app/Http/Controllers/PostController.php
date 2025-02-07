<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{


    public function index()
    {
        // Busca todos os posts
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('/index', compact('posts'));
    }


    public function view_create()
    {
        return view('/create');
    }



    public function edit(Post $post)
    {
        // Verifica se o usuário pode editar o post
        // allows - permite
        if (Gate::allows('update-post', $post)) {
            return view('edit', compact('post'));
        } else {
            abort(403, 'Você não tem permissão para editar este post.');
        }
    }


    public function store(Request $request): RedirectResponse
    {
        // Verifica se o usuário tem permissão para criar um post
        if (Gate::allows('post-store')) {

            // Valida os dados
            $validated = $request->validate([
                'title' => 'required|string|max:70',
                'content' => 'required|string',
            ]);

            // Cria o post com o ID do usuário autenticado
            Post::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'user_id' => auth()->id(), // Associa o post ao usuário autenticado
            ]);

            return redirect('/index');
        } else {
            abort(403, 'Você não tem permissão para criar um post.');
        }
    }



    public function update(Request $request, Post $post): RedirectResponse
    {
        // Verifique se o usuário pode atualizar o post
        if (Gate::allows('update-post', $post)) {

            // Valida os dados
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            // Atualiza o post
            $post->update($validated);

            return redirect('/index');
        } else {
            abort(403, 'Você não tem permissão para atualizar este post.');
        }
    }


    public function destroy(Post $post)
    {
        // Verifica se o usuário pode deletar o post
        if (Gate::allows('delete-post', $post)) {

            // O usuário pode deletar o post
            $post->delete();
            return redirect('/index');
        } else {
            // O usuário não tem permissão para deletar o post
            abort(403, 'Você não tem permissão para excluir este post.');
        }
    }
}

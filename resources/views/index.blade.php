@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-10">
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Posts</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <div class="container">
                                    {{-- Botão create---}}
                                    <a href="{{ route('create.view') }}" class="btn btn-success">Adicionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Conteúdo</th>
                                <th>Autor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td class="d-flex">

                                    {{-- Botão Editar---}}
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-primary me-2">Editar</a>

                                    {{-- Botão de exclusão---}}
                                    <form action="{{ route('post.delete', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (Auth::user()->can('view-users'))
                    <a href="{{ url('/users') }}">Lista de usuários</a>
                    @endif
                </div>
                @endsection
@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Usuários</h2>

    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Administrador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">
                                {{ $user->is_admin ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('users.toggleAdmin', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-danger' : 'btn-success' }}">
                                    {{ $user->is_admin ? 'Remover Admin' : 'Tornar Admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        <a href="{{ url('/index') }}" class="btn btn-primary">Ver Postagens</a>
    </div>
</div>
@endsection

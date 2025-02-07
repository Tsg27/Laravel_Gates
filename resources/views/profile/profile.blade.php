@extends('layouts.main')

@section('content')
<div class="container" style="position: relative; top: 53px;">
    <h2 class="text-center">Editar Perfil</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', Auth::user()->email) }}" required readonly>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                <a href="{{ route('index') }}" class="btn btn-secondary btn-sm mt-8">Voltar</a>
            </form>
            <br>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('content')
<div class="container"  style="position: relative; top: 53px;">
    <h2>Criar Post</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Voltar</a>

    </form>
</div>
@endsection

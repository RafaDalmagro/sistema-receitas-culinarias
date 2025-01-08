@extends('layouts.main')

@section('title', $receita->nome)

@section('content')
<div class="container my-5">

    <h1>{{ $receita->nome }}</h1>
    <p><strong>Ingredientes:</strong></p>
    <p>{{ $receita->ingredientes }}</p>
    <p><strong>Modo de Preparo:</strong></p>
    <p>{{ $receita->modo_preparo }}</p>

    <hr>

    <h2>Deixe seu Comentário</h2>
    <form action="{{ route('comentarios.store', $receita->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="autor" class="form-label">Seu Nome</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentário</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Comentário</button>
    </form>

    <hr>

    <h2>Comentários</h2>
    @if($receita->comentarios->isEmpty())
        <p class="text-muted">Ainda não há comentários para esta receita. Seja o primeiro a comentar!</p>
    @else
        <ul class="list-group">
            @foreach($receita->comentarios as $comentario)
                <li class="list-group-item">
                    <strong>{{ $comentario->autor }}</strong> diz:
                    <p>{{ $comentario->comentario }}</p>
                    <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

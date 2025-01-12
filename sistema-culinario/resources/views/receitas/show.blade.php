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
    @if(session('success'))
    <div id="alert-success" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h2>Comentários</h2>
    @if($receita->comentarios->isEmpty())
    <p class="text-muted">Ainda não há comentários para esta receita, seja o primeiro ;)!</p>
    @else
    <ul class="list-group">
        @foreach($receita->comentarios as $comentario)
        <li class="list-group-item">
            <strong>{{ $comentario->autor }}</strong> diz:
            <p id="comentario-texto-{{ $comentario->id }}">{{ $comentario->comentario }}</p>

            <button class="btn btn-sm btn-warning" onclick="document.getElementById('edit-form-{{ $comentario->id }}').style.display = 'block';">
                Editar
            </button>

            <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </form>

            <form id="edit-form-{{ $comentario->id }}" action="{{ route('comentarios.update', $comentario->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea class="form-control" name="comentario" rows="2" required>{{ $comentario->comentario }}</textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="document.getElementById('edit-form-{{ $comentario->id }}').style.display = 'none';">
                    Cancelar
                </button>
            </form>
        </li>
        @endforeach

    </ul>
    @endif
</div>
<script>
    setTimeout(function() {
        const alert = document.getElementById('alert-success');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>
@endsection
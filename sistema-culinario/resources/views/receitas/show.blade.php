@extends('layouts.main')

@section('title', $receita->nome)

@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-end align-items-end">
        <a href="/" type="button" class="btn btn-secondary me-2">
            <i class="bi bi-arrow-left"></i>
            <span>Voltar para o Início</span>
        </a>
        <a class="btn btn-primary me-2" href="/receitas/edit/{{$receita->id}}">
            <i class="bi bi-pencil-square"></i> Editar Receita
        </a>
        <form action="/receitas/{{$receita->id}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa receita?')">
                <i class="bi bi-trash"></i> Excluir
            </button>
        </form>
    </div>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center text-primary mb-4">{{ $receita->nome }}</h1>

                <h4 class="text-secondary">Ingredientes</h4>
                <p class="mb-4">
                    {{ $receita->ingredientes }}
                </p>

                <h4 class="text-secondary">Modo de Preparo</h4>
                <p class="card-text text-justify">
                    {{ $receita->modo_preparo }}
                </p>
            </div>
        </div>
    </div>

    <hr>

    <h2>Deixe seu Comentário</h2>
    <form action="{{ route('comentarios.store', $receita->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor"
                value="{{ auth()->check() ? auth()->user()->name : '' }}" readonly required>
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
            <strong>{{ $comentario->user->name }}</strong> diz:
            <p>{{ $comentario->comentario }}</p>

            @if(auth()->check() && auth()->id() === $comentario->user_id)
            <button class="btn btn-sm btn-warning" onclick="document.getElementById('edit-form-{{ $comentario->id }}').style.display = 'block';">
                Editar
            </button>

            <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este comentário?')">Excluir</button>
            </form>

            <form id="edit-form-{{ $comentario->id }}" action="{{ route('comentarios.update', $comentario->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea class="form-control" name="comentario" rows="2" required>{{ $comentario->comentario }}</textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="document.getElementById('edit-form-{{ $comentario->id }}').style.display = 'none';">Cancelar</button>
            </form>
            @endif
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
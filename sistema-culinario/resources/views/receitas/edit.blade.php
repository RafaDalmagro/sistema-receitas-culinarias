@extends('layouts.main')
@section('title', 'Editar Receita')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Editar Receita</h1>
    <a href="/receitas" type="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        <span>Voltar para Receitas</span>
    </a>
</div>

<div class="mt-4">
    <form action="/receitas/update/{{$receita->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Receita:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$receita->nome}}" required>
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes:</label>
            <input type="text" class="form-control" id="ingredientes" name="ingredientes" value="{{$receita->ingredientes}}" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Modo de preparo:</label>
            <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" value="{{$receita->modo_preparo}}" required>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select id="categoria_id" name="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($categoria->id == $receita->categoria_id) selected @endif>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i>
                <span>Salvar</span>
            </button>
            <a href="/categorias" class="btn btn-secondary mx-2">
                <i class="bi bi-x-circle"></i>
                <span>Cancelar</span>
            </a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.main')
@section('title', 'Criar Categoria')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Cadastrar Categoria</h1>
    <a href="/categorias" type="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        <span>Voltar para Receitas</span>
    </a>
</div>

<div class="mt-4">
    <form action="/receitas" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Receita:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="{{$receita->nome}}" required>
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes:</label>
            <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="{{$receita->ingrediente}}" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Modo de preparo:</label>
            <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" placeholder="{{$receita->modo_preparo}}" required>
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

@extends('layouts.main')
@section('title', 'Cadastrar Receita')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Cadastrar Receita</h1>
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
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da receita" required>
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes:</label>
            <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Digite os ingredientes da receita" required>
        </div>
        <div class="mb-3">
            <label for="modo_preparo" class="form-label">Modo de Preparo:</label>
            <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" placeholder="Descreva o modo de preparo" required>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select id="categoria_id" name="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i>
                <span>Salvar</span>
            </button>
            <a href="/receitas" class="btn btn-secondary me-2">
                <i class="bi bi-x-circle"></i>
                <span>Cancelar</span>
            </a>
        </div>
    </form>
</div>
@endsection
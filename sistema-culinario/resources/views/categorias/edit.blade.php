@extends('layouts.main')
@section('title', 'Criar Categoria')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Cadastrar Categoria</h1>
    <a href="/categorias" type="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        <span>Voltar para Categorias</span>
    </a>
</div>

<div class="mt-4">
    <form action="/categorias/update/{{$categoria->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$categoria->nome}}" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Descrição da Categoria:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{$categoria->descricao}}" required>
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

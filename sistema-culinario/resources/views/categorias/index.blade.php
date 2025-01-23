@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Categorias</h1>
    <a href="/categorias/create" class="btn btn-primary">
        <i class="bi bi-pencil-square"></i>
        <span>Cadastrar Categoria</span>
    </a>
</div>

<div class="row mt-4">
    @foreach ($categorias as $categoria)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{$categoria->nome}}</h5>
                <p class="card-text text-muted">{{$categoria->descricao}}</p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary" href="/categorias/edit/{{$categoria->id}}">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <form action="/categorias/{{$categoria->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa Categoria?')">
                            <i class="bi bi-trash"></i> Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
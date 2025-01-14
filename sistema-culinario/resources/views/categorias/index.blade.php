@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Lista de Categorias</h1>
    <a href="/categorias/create" class="btn btn-primary">
        <i class="bi bi-pencil-square"></i>
        <span>Cadastrar Categoria</span>
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nome}}</td>
            <td>{{$categoria->descricao}}</td>
            <td>
                <a class="btn btn-primary" href="/categorias/edit/{{$categoria->id}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            <td>
                <form action="/categorias/{{$categoria->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa Categoria?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.main')
@section('title', 'Receitas')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Lista de Receitas</h1>
    <a href="/receitas/create" class="btn btn-primary">
        <i class="bi bi-plus-square"></i>
        <span>Cadastrar Receita</span>
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>INGREDIENTES</th>
            <th>CATEGORIA</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receitas as $receita)
        <tr>
            <td>{{$receita->id}}</td>
            <td>{{$receita->nome}}</td>
            <td>{{$receita->ingredientes}}</td>
            <td>{{$receita->categoria->nome}}</td>
            <td>
                <a class="btn btn-primary" href="/receitas/edit/{{$receita->id}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            <td>
                <form action="/receitas/{{$receita->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa receita?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
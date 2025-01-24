@extends('layouts.main')
@section('title', 'Receitas')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Receitas</h1>
        <a href="/receitas/create" class="btn btn-primary">
            <i class="bi bi-plus-square"></i>
            <span>Cadastrar Receita</span>
        </a>
    </div>

    <div class="row mt-4">
        @foreach ($receitas as $receita)
            <div class="col-md-4 mb-3 mt-3">
                <div class="card shadow-sm h-100 glass" data-text="{{ $receita->categoria->nome }}">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $receita->nome }}</h5>
                        <p class="card-text">
                            <strong>Ingredientes:</strong> {{ $receita->ingredientes }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary" href="/receitas/{{ $receita->id }}">
                                <i class="bi bi-eye"></i> Ver Receita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    

@endsection

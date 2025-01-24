@extends('layouts.home')
@section('title', 'Receitas Rápidas')
@section('content')
    <div class="container">
        <h1 style="text-align: center; font-size: 56px" class="mb-5 p-3 bg-white rounded">As mais acessadas.</h1>
        <div class="row justify-content-center m-2">
            @foreach ($receitas as $key => $receita)
                <div class="glass col-lg-4 m-4 p-4 rounded position-relative" style="--r: {{ $key * 20 - 20 }}deg;"
                    data-text="Top - {{ $key + 1 }}">
                    <h2 style="text-align: center; color:cornflowerblue" class="fw-normal">{{ $receita->nome }}</h2>
                    <p style="text-align: justify;"><strong>Ingredientes:</strong> {{ $receita->ingredientes }}.</p>
                    <p style="text-align: justify;"><strong>Categoria:</strong> {{ $receita->categoria->nome }}.</p>
                    @if ($receita->ultimoComentario)
                        <p style="text-align: justify;"><strong>Comentário:</strong>
                            {{ $receita->ultimoComentario->comentario }}</p>
                    @else
                        <p style="text-align: justify;"><strong>Comentário:</strong> Nenhum comentário ainda.</p>
                    @endif
                    <p>
                        <a class="w-100 btn btn-lg btn-outline-primary" href="/receitas/{{ $receita->id }}">Conferir</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>


@endsection

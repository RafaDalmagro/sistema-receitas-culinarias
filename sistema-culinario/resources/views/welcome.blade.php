@php
    $contador = 1;
@endphp
@extends('layouts.home')
@section('title', 'Receitas Rápidas')
@section('content')
    <div class="container">
        <h1 style="text-align: center; font-size: 56px" class="mb-5 p-3 bg-white rounded">As mais acessadas.</h1>
        <div class="row m-2">
            @foreach ($receitas as $receita)
                <div class="col-lg-4 bg-white transparente m-3 p-4 rounded">
                    <h2 style="text-align: center; color:cornflowerblue" class="fw-normal">{{ $receita->nome }}</h2>
                    <p style="text-align: justfy;"><strong>Ingredientes:</strong> {{ $receita->ingredientes }}.</p>
                    <p style="text-align: justfy;"><strong>Categoria:</strong> {{ $receita->categoria->nome }}.</p>
                    @if ($receita->ultimoComentario)
                        <p style="text-align: justfy;"><strong>Comentário:</strong>
                            {{ $receita->ultimoComentario->comentario }}</p>
                    @else
                        <p style="text-align: justfy;"><strong>Comentário:</strong> Nenhum comentário ainda.</p>
                    @endif
                    <p><a class="w-100 btn btn-lg btn-outline-primary" href="/receitas/{{ $receita->id }}">Conferir</a></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

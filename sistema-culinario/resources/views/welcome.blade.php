@php
    $contador = 1;
@endphp
@extends('layouts.home')
@section('title', 'Receitas Rápidas')
@section('content')
<div class="container">
    <h1>As mais comentadas!</h1>
    <div class="row m-2">
        @foreach($receitas as $receita)
        <div class="col-lg-4">
            <h2 style="text-align: center; color:cornflowerblue" class="fw-normal">{{$receita->nome}}</h2>
            <p style="text-align: justfy;"><strong>Ingredientes:</strong> {{$receita->ingredientes}}</p>
            <p style="text-align: justfy;"><strong>Modo de Preparo:</strong> {{$receita->modo_preparo}}</p>
            <p style="text-align: justfy;"><strong>Categoria:</strong> {{$receita->categoria->nome}}</p>
            <p><a class="w-100 btn btn-lg btn-outline-primary" href="/receitas/{{$receita->id}}">Conferir</a></p>
        </div>
        @endforeach
    </div>
</div>
@endsection
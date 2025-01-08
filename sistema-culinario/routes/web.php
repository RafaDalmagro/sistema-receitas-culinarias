<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReceitaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get( '/categorias', [ CategoriaController::class, 'index'] );
Route::get('/receitas', [ ReceitaController::class, 'index']);

Route::get('/', [CategoriaController::class, 'index']);
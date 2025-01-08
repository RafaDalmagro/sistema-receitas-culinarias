<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ComentarioController;

// Rotas para Comentarios
Route::post('/receitas/{receita_id}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/comentarios/{id}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');

// Rotas para Categorias
Route::get( '/categorias', [ CategoriaController::class, 'index'] );
Route::get('/categorias/create', [CategoriaController::class, 'create']);

// Rotas para Receitas
Route::get('/', [ReceitaController::class, 'index']);
Route::get('/receitas', [ ReceitaController::class, 'index']);

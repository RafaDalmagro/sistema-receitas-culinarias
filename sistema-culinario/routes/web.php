<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ComentarioController;

Route::post('/receitas/{receita_id}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::put('/comentarios/{id}', [ComentarioController::class, 'update'])->name('comentarios.update');
Route::delete('/comentarios/{id}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');

Route::get('/categorias', [ CategoriaController::class, 'index'] );
Route::get('/categorias/create', [CategoriaController::class, 'create']);
Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/update/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

Route::get('/', [ReceitaController::class, 'home'])->name('welcome');
Route::get('/receitas', [ ReceitaController::class, 'index']);
Route::get('/receitas/{id}', [ReceitaController::class, 'show'])->name('receitas.show');
Route::get('/receitas/create', [ ReceitaController::class, 'create']);
Route::get('/receitas/edit/{id}', [ReceitaController::class, 'edit'])->name('receita.edit');
Route::post('/receitas', [ReceitaController::class, 'store'])->name('receitas.store');
Route::put('/receitas/update/{id}', [ReceitaController::class, 'update']);
Route::delete('/receitas/{id}', [ReceitaController::class, 'destroy']);
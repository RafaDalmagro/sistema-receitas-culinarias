<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get( '/categorias', [ CategoryController::class, 'index'] );
Route::get('/recipes', [ RecipesController::class, 'index']);

Route::get('/', [CategoryController::class, 'index']);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $user = "Rafael";
        return view('categorias.index', ['user' => $user]);
    }
}

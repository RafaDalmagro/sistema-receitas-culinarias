<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index() {
        $user = "";
        return view('receitas.index', ['user' => $user] );
    }
}

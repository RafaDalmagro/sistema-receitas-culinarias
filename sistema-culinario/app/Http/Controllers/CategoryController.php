<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $user = "Rafael";
        return view('categorias.index', ['user' => $user]);
    }
}

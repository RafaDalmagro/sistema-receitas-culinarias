<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index() {
        $user = "";
        return view('recipes.index', ['user' => $user] );
    }
}

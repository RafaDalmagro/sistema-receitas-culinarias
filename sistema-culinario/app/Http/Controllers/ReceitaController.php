<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index() {
        $user = "Rafael";
        return view('receitas.index', ['user' => $user] );
    }

    public function create(){
        return view('receitas.create');
    }

    public function store(Request $request){
        $categoria = new Categoria();
        $categoria->id = $request->id;
        $categoria->save();

        return redirect('/categoria')->with( 'msg', 'Categoria
        criada com sucesso!' );
    }
}

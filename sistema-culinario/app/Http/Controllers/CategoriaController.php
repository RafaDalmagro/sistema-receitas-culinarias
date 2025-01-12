<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Receita;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create(){
        $categorias = Categoria::all();
        
        return view('categorias.create', compact('categorias'));
    }
    
    public function store(Request $request){
        $categoria = new Categoria();

        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;

        $categoria->save();

        return redirect('/categorias')->with( 'msg', 'Receita
        criada com sucesso!' );
    }

    public function destroy($id){
        Categoria::findOrFail( $id )->delete() ;
        return redirect( '/categories' )->with( 'msg', 'Categoria excluída com sucesso!' );
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);

        return view('/categoria.edit', ['categoria' => $categoria]);
    }

    public function update(Request $request){
        Categoria::findOrFail( $request->id )->update( $request-> all() );

        return redirect('/categorias') -> with('msg', 'Categoria editada com sucesso.');
    }

    
}

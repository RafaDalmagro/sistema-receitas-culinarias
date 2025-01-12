<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use App\Models\Categoria;

class ReceitaController extends Controller
{
    public function index() {
        $receitas = Receita::with('categoria')->get();
        
        return view('receitas.index', compact('receitas'));
    }

    public function create(){
        $receitas = Receita::all();

        return view('receitas.create', compact('receitas'));
    }

    public function store(Request $request){
        $receita = new Receita();

        $receita->nome = $request->nome;
        $receita->ingredientes = $request->ingredientes;
        $receita->modo_preparo = $request->modo_preparo;
        $receita->categoria_id = $request->categoria_id;

        $receita->save();

        return redirect('/receitas')->with( 'msg', 'Receita
        criada com sucesso!' );
    }

    public function show($id){
        $receita = Receita::with('comentarios')->findOrFail($id);

        return view('receitas.show', compact('receita'));
    }

    public function destroy($id){
        Receita::findOrFail( $id )->delete() ;
        return redirect( '/receitas' )->with( 'msg', 'Categoria excluída com sucesso!' );
    }

    public function edit($id){
        $categorias = Categoria::all();
        $receita = Receita::findOrFail($id);

        return view('/receita.edit', ['receita' => $receita, 'categorias' => $categorias]);
    }

    public function update(Request $request){
        Receita::findOrFail( $request->id )->update( $request-> all() );

        return redirect('/receita') -> with('msg', 'Receita editada com sucesso.');
    }
}

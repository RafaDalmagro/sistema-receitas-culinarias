<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    public function index(){
        $receitas = Receita::with('categoria')->get();
        return view('receitas.index', compact('receitas'));
    }

    public function create(){
        $categorias = Categoria::all();
        return view('receitas.create', ['categorias' => $categorias]);
    }

    public function store(Request $request){
        $receita = new Receita();

        $receita->nome = $request->nome;
        $receita->ingredientes = $request->ingredientes;
        $receita->modo_preparo = $request->modo_preparo;
        $receita->categoria_id = $request->categoria_id;
        $receita->user_id = Auth::id();
        $receita->save();

        return redirect('/receitas')->with('msg', 'Receita criada com sucesso!');
    }

    public function show($id){
        $receita = Receita::with('comentarios')->findOrFail($id);
        return view('receitas.show', compact('receita'));
    }

    public function destroy($id){
        $receita = Receita::findOrFail($id);

        if ($receita->user_id != Auth::id()) {
            return redirect('/receitas')->with('error', 'Você não tem permissão para excluir essa receita!');
        }

        $receita->delete();
        return redirect('/receitas')->with('msg', 'Receita excluída com sucesso!');
    }

    public function edit($id){
        $categorias = Categoria::all();
        $receita = Receita::findOrFail($id);

        if ($receita->user_id != Auth::id()) {
            return redirect('/receitas')->with('error', 'Você não tem permissão para editar essa receita!');
        }

        return view('receitas.edit', ['receita' => $receita, 'categorias' => $categorias]);
    }

    public function update(Request $request){
        $receita = Receita::findOrFail($request->id);

        if ($receita->user_id != Auth::id()) {
            return redirect('/receitas')->with('error', 'Você não tem permissão para editar essa receita!');
        }

        $receita->update($request->all());
        return redirect('/receitas')->with('msg', 'Receita editada com sucesso.');
    }

    public function home(){
        $receitas = Receita::withCount('comentarios')
            ->orderBy('comentarios_count', 'desc')
            ->take(5)
            ->get();

        return view('welcome', compact('receitas'));
    }
}

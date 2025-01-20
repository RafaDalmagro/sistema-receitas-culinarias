<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{

    public function store(Request $request, $receita_id)
    {
        $request->validate([
            'comentario' => 'required|string|max:1000',
        ]);

        Comentario::create([
            'comentario' => $request->comentario,
            'receita_id' => $receita_id,
            'user_id' => auth()->id(),
        ]);
        

        return redirect()->route('receitas.show', $receita_id)->with('success', 'Comentário adicionado com sucesso!');
    }

    // Excluir um comentário
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->back()->with('success', 'Comentário excluído com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string',
        ]);

        $comentario = Comentario::findOrFail($id);

        $comentario->update([
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('Success', 'Comentário atualizado com sucesso!');
    }
}

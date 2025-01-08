<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Receita;

class ComentarioController extends Controller
{
    public function store(Request $request, $receita_id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'autor' => 'required|string|max:255',
            'comentario' => 'required|string',
        ]);

        // Criar o comentário
        Comentario::create([
            'receita_id' => $receita_id, // Relaciona com a receita
            'autor' => $request->autor,
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }

    // Excluir um comentário
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->back()->with('success', 'Comentário excluído com sucesso!');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    protected $fillable = ['receita_id', 'autor', 'comentario'];

    public function receita()
    {
        return $this->belongsTo(Receita::class);
    }
}

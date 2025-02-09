<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ingredientes', 'modo_preparo', 'categoria_id', 'user_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function ultimoComentario()
    {
        return $this->hasOne(Comentario::class)->latestOfMany();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

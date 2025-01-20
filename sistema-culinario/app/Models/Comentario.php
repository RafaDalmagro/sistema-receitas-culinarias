<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    protected $fillable = ['receita_id', 'user_id', 'comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receita()
    {
        return $this->belongsTo(Receita::class);
    }
}

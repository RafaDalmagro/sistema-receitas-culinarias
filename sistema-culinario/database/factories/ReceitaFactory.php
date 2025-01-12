<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Categoria;
class ReceitaFactory extends Factory
{
    protected $model = \App\Models\Receita::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'ingredientes' => $this->faker->paragraph(),
            'modo_preparo' => $this->faker->paragraph(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}


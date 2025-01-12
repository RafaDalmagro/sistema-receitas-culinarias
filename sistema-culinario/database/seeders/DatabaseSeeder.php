<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Receita;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategoriaSeeder::class);

        Receita::factory()->count(50)->create();
    }
}

<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    protected $model = Evento::class;

    public function definition()
    {
        $tipos = ['concierto', 'feria', 'teatro', 'cine', 'deportivo'];

        return [
            'nombre' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'tipo' => $this->faker->randomElement($tipos),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

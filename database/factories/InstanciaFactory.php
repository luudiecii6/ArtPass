<?php

namespace Database\Factories;

use App\Models\Instancia;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Eloquent\Factories\EventoFactory;

class InstanciaFactory extends Factory
{
    protected $model = Instancia::class;

    public function definition()
    {
        return [
            'horario' => $this->faker->time,
            'fecha' => $this->faker->dateTimeBetween('now', '+1 year'),
            'nombre_sala' => $this->faker->company,
            'ciudad' => $this->faker->city,
            'calle' => $this->faker->streetAddress,
            'comunidad' => $this->faker->state,
            'created_at' => now(),
            'updated_at' => now(),
            'evento_id' => Evento::factory(), // Genera un evento si es necesario
        ];
    }
}

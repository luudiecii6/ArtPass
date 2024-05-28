<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entrada;

class EntradaFactory extends Factory
{
    protected $model = Entrada::class;

    public function definition()
    {
        return [
            'nombre_evento' => $this->faker->name, // Nombre del evento generado aleatoriamente
            'fecha_evento' => $this->faker->dateTimeBetween('+1 week', '+1 month'), // Fecha aleatoria entre una semana y un mes desde ahora
            'direccion_evento' => $this->faker->address, // Dirección aleatoria
            'horario_evento' => $this->faker->time('H:i'), // Horario aleatorio
            'nombre_usuario' => $this->faker->name, // Nombre del usuario generado aleatoriamente
            'apellidos_usuario' => $this->faker->lastName, // Apellidos del usuario generado aleatoriamente
            'codigo_qr' => $this->faker->imageUrl(200, 200, 'qrcode'), // Genera una URL de imagen de un código QR
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'fecha_nacimiento' => $this->faker->date,
            'contraseña' => Hash::make('password'), // Default password
            'username' => $this->faker->unique()->userName,
            'comunidad' => $this->faker->state,
            'ciudad' => $this->faker->city,
            'codigo_postal' => $this->faker->postcode,
            'esAdmin' => 0,
            'username_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

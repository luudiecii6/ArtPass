<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\Instancia;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $eventos = Evento::factory()
            ->count(100)
            ->create()
            ->each(function ($evento) {
                Instancia::factory()
                    ->count(20)
                    ->for($evento, 'evento')
                    ->create();
            });
    }
}

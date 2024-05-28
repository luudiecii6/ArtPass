<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class ArtpassController extends Controller
{
    public function index()
    {
        // Recupera los eventos de la base de datos
        $eventsFromDB = Evento::all();

        // Divide los eventos en grupos de 15
        $chunkedEvents = $eventsFromDB->chunk(15);

        // Define las secciones con los eventos divididos
        $sections = [
            ['title' => 'Más Destacados', 'events' => $chunkedEvents[0] ?? collect()],
            ['title' => 'Nuevos Eventos', 'events' => $chunkedEvents[1] ?? collect()],
            ['title' => 'En unos días', 'events' => $chunkedEvents[2] ?? collect()],
            ['title' => 'Recomendado para ti', 'events' => $chunkedEvents[3] ?? collect()],
        ];

        return view('index', compact('sections'));
    }

    public function show($id)
    {
        // Recupera el evento por su ID
        $evento = Evento::findOrFail($id);

        // Recupera las instancias asociadas a este evento
        $instancias = $evento->instancias;

        // Retorna la vista mostrando el evento y sus instancias
        return view('mostrarEvento', compact('evento', 'instancias'));
    }
}

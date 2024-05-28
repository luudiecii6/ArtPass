<?php
// app/Http/Controllers/EventController.php
namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Instancia;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function crearEvento()
    {
        return view('formularioEvento');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:255',
            'instancia' => 'array',
            'instancia.*.horario' => 'required|date_format:H:i',
            'instancia.*.fecha' => 'required|date',
            'instancia.*.nombre_sala' => 'required|string|max:255',
            'instancia.*.ciudad' => 'required|string|max:255',
            'instancia.*.calle' => 'required|string|max:255',
            'instancia.*.comunidad' => 'required|string|max:255',
        ]);

        $evento = Evento::create([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'tipo' => $validatedData['tipo']
        ]);

        if (!empty($validatedData['instancia'])) {
            foreach ($validatedData['instancia'] as $instanceData) {
                $evento->instancias()->create($instanceData);
            }
        }

        // Obtener la ID del evento creado
        $eventoId = $evento->id;

        // Obtener todas las instancias del evento recién creado
        $instancias = Instancia::where('evento_id', $eventoId)->get();

        // Pasar los datos a la vista y mostrarla
        return view('mostrarEvento', compact('evento', 'instancias'));
    }

    public function mostrarPorTipo($tipo)
    {
        $eventos = Evento::where('tipo', $tipo)->get();
        return view('mostrarEventosTipos', compact('eventos', 'tipo'));
    }
}

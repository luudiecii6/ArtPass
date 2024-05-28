<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\User;
use App\Models\Instancia;
use App\Models\Evento;
use App\Models\Entrada;
use Illuminate\Support\Facades\Auth;

class ComprarEntradaController extends Controller
{
    public function comprar(Instancia $instancia, $entradaId)
    {
        $entrada = Entrada::findOrFail($entradaId);
        return view('entradaComprada', compact('instancia', 'entrada'));
    }

    public function guardar(Request $request)
    {
        $user = Auth::user();
        $instanciaId = $request->input('instancia_id');
        $instancia = Instancia::findOrFail($instanciaId);

        $qrContent = 'Usuario ID: ' . $user->id . ' Instancia ID: ' . $instancia->id . ' Timestamp: ' . now()->timestamp . ' Random: ' . bin2hex(random_bytes(4));
        // Generar el código QR
        $qrCode = new QrCode($qrContent);
        $writer = new PngWriter();
        $dataUri = $writer->write($qrCode)->getDataUri();

        // Crear una nueva entrada
        $entrada = Entrada::create([
            'nombre_evento' => $instancia->evento->nombre,
            'fecha_evento' => $instancia->fecha,
            'direccion_evento' => $instancia->calle . ', ' . $instancia->ciudad . ', ' . $instancia->comunidad,
            'horario_evento' => $instancia->horario,
            'nombre_usuario' => $user->nombre,
            'apellidos_usuario' => $user->apellidos,
            'codigo_qr' => $dataUri,
            'user_id' => $user->id,
            'instancia_id' => $instancia->id,
        ]);

        // Redireccionar a una página de éxito o cualquier otra página deseada
        return view('mensajeEntrada', [
            'instanciaId' => $instanciaId,
            'entradaId' => $entrada->id,
        ]);        
    }

    public function verEntradas()
    {
            // Obtener las entradas del usuario en sesión
            $userId = auth()->id();
            $entradas = Entrada::where('user_id', $userId)->get();
        
            // Retornar la vista con las entradas del usuario
            return view('mostrarEntrada', ['entradas' => $entradas]);
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\Entrada;
use App\Models\User;
use App\Models\Instancia;

class EntradasTableSeeder extends Seeder
{
    public function run()
    {
        $this->generateAndSaveQrCodes();
    }

    public function generateAndSaveQrCodes()
    {
        // Recuperar todas las instancias
        $instancias = Instancia::all();

        // Recuperar todos los usuarios
        $usuarios = User::all();

        foreach ($instancias as $instancia) {
            for ($i = 0; $i < 10; $i++) {
                // Seleccionar un usuario aleatorio
                $usuario = $usuarios->random();

                // Crear la información para el código QR
                $qrContent = 'Usuario ID: ' . $usuario->id . ' Instancia ID: ' . $instancia->id . ' Timestamp: ' . now()->timestamp . ' Random: ' . bin2hex(random_bytes(4));

                // Generar el código QR
                $qrCode = new QrCode($qrContent);
                $writer = new PngWriter();
                $dataUri = $writer->write($qrCode)->getDataUri();

                // Crear una nueva entrada
                Entrada::create([
                    'nombre_evento' => $instancia->evento->nombre,
                    'fecha_evento' => $instancia->fecha,
                    'direccion_evento' => $instancia->calle . ', ' . $instancia->ciudad . ', ' . $instancia->comunidad,
                    'horario_evento' => $instancia->horario,
                    'nombre_usuario' => $usuario->nombre,
                    'apellidos_usuario' => $usuario->apellidos,
                    'codigo_qr' => $dataUri,
                    'user_id' => $usuario->id,
                    'instancia_id' => $instancia->id,
                ]);
            }
        }
    }
}

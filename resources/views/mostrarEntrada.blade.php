<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS||Mostrar Entradas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0e582; /* Amarillo dorado */
            color: #5d4037; /* Marrón oscuro */
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .entrada {
            background-color: #ffd54f; /* Amarillo */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .entrada h2 {
            margin-top: 0;
            color: #5d4037; /* Marrón oscuro */
        }
        .entrada p {
            color: #6d4c41; /* Marrón */
        }
        .entrada img {
            width: 250px;
            height: 250px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        a {
            color: #bcaaa4; /* Marrón claro */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #8d6e63; /* Marrón más oscuro */
        }

        .inicio-button {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #D4AF37; /* Gold background */
            color: #FFF; /* White text */
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <div class="container">
        <div class="inicio-button">
            <a class="back-button" href="/index">Volver al Inicio</a>
        </div>
        @foreach($entradas as $entrada)
        <div class="entrada">
            <h2>Entrada</h2>
            <img src="{{ $entrada->codigo_qr }}" alt="Código QR">
            <p><strong>Evento:</strong> {{ $entrada->nombre_evento }}</p>
            <p><strong>Fecha:</strong> {{ $entrada->fecha_evento }}</p>
            <p><strong>Lugar:</strong> {{ $entrada->direccion_evento }}</p>
            <p><strong>Horario:</strong> {{ $entrada->horario_evento }}</p>
            <p><strong>Nombre Usuario:</strong> {{ $entrada->nombre_usuario }}</p>
            <p><strong>Apellidos Usuario:</strong> {{ $entrada->apellidos_usuario }}</p>
        </div>
        @endforeach
    </div>
    @else
    <div style="text-align: center; margin-top: 50px;">
        <h2>Necesitas iniciar sesión para ver esta página</h2>
        <a href="{{ route('login.formu') }}" style="text-decoration: none;">
            <button style="padding: 10px 20px; background-color: #b38600; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Iniciar Sesión</button>
        </a>
    </div>
    @endif
</body>
</html>

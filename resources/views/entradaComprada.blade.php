<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ART PASS||Entrada</title>
    <link rel="stylesheet" type="text/css" href="/css/entradaComprada.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e582; /* Amarillo dorado */
            color: #5d4037; /* Marrón oscuro */
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #ffd54f; /* Amarillo */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #5d4037; /* Marrón oscuro */
        }
        .evento-info, .qr-code, .user-info {
            background-color: #fff8e1; /* Amarillo claro */
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        .center-button {
            text-align: center;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #bcaaa4; /* Marrón claro */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #8d6e63; /* Marrón más oscuro */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Entrada Comprada!</h1>
        <div class="evento-info">
            <h2>Detalles del Evento</h2>
            <p><strong>Nombre del Evento:</strong> {{ $instancia->evento->nombre }}</p>
            <p><strong>Fecha del Evento:</strong> {{ $instancia->fecha }}</p>
            <p><strong>Dirección:</strong> {{ $instancia->calle }}, {{ $instancia->ciudad }}, {{ $instancia->comunidad }}</p>
            <p><strong>Horario:</strong> {{ $instancia->horario }}</p>
        </div>
        <div class="qr-code">
            <h2>Tu Código QR</h2>
            <img src="{{ $entrada->codigo_qr }}" alt="Código QR">
        </div>
        <div class="user-info">
            <h2>Detalles del Usuario</h2>
            <p><strong>Nombre del Usuario:</strong> {{ Auth::user()->nombre }}</p>
            <p><strong>Apellidos del Usuario:</strong> {{ Auth::user()->apellidos }}</p>
        </div>
        <div class="center-button">
            <a class="back-button" href="/index">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>

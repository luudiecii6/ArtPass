<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS || Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e582; /* Amarillo dorado */
            color: #5d4037; /* Marrón oscuro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #ffd54f; /* Amarillo */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            margin-top: 0;
            color: #5d4037; /* Marrón oscuro */
        }
        .container p {
            color: #6d4c41; /* Marrón */
        }
        .container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #bcaaa4; /* Marrón claro */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .container a:hover {
            background-color: #8d6e63; /* Marrón más oscuro */
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <div class="container">
        <h1>¡Listo, entrada comprada!</h1>
        <p>Gracias por tu compra. Tu entrada ha sido creada exitosamente.</p>
        <a href="{{ route('entradas.comprar', ['instancia' => $instanciaId, 'entradaId' => $entradaId]) }}">Ver Entrada</a>
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

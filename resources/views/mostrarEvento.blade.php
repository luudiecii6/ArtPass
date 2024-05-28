<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS||Mostrar Evento</title>
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
        .evento {
            background-color: #ffd54f; /* Amarillo */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .evento h2 {
            margin-top: 0;
            color: #5d4037; /* Marrón oscuro */
        }
        .evento p {
            color: #6d4c41; /* Marrón */
        }
        .evento img {
            max-width: 100%;
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
        .instancias {
            margin-top: 20px;
        }
        .instancia {
            background-color: #fff8e1; /* Amarillo claro */
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
        <div class="evento">
            <h2>{{ $evento->nombre }}</h2>
            <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
            <p><strong>Tipo de evento:</strong> {{ $evento->tipo }}</p>
        </div>
        
        <div class="instancias">
            <h3>Lugares del Evento</h3>
            @foreach($instancias as $instancia)
                <div class="instancia">
                    <p><strong>Horario:</strong> {{ $instancia->horario }}</p>
                    <p><strong>Fecha:</strong> {{ $instancia->fecha }}</p>
                    <p><strong>Nombre de la Sala:</strong> {{ $instancia->nombre_sala }}</p>
                    <p><strong>Ciudad:</strong> {{ $instancia->ciudad }}</p>
                    <p><strong>Calle:</strong> {{ $instancia->calle }}</p>
                    <p><strong>Comunidad:</strong> {{ $instancia->comunidad }}</p>
                    
                    <!-- Formulario para comprar entrada -->
                    <form method="POST" action="{{ route('entradas.guardar') }}">
                        @csrf
                        <input type="hidden" name="instancia_id" value="{{$instancia->id}}">
                        <button type="submit">Comprar Entrada</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="inicio-button">
            <a class="back-button" href="/index">Volver al Inicio</a>
        </div>
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

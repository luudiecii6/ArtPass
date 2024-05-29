<!DOCTYPE html>
<html>
<head>
    <title>Eventos {{ ucfirst($tipo) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5dc; /* Beige */
            color: #4b3e2d; /* Marrón oscuro */
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #d4af37; /* Dorado */
            color: #fff;
            text-align: center;
            padding: 20px;
            margin: 0;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background-color: #fff3cd; /* Amarillo claro */
            border: 1px solid #d4af37; /* Dorado */
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
        }
        h3 {
            margin: 0 0 10px 0;
            color: #d4af37; /* Dorado */
        }
        p {
            margin: 5px 0;
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
    <h1>Eventos de tipo: {{ ucfirst($tipo) }}</h1>
    <div class="inicio-button">
        <a class="back-button" href="/index">Volver al Inicio</a>
    </div>
    @if($eventos->isEmpty())
        <p>No hay eventos de este tipo.</p>
    @else
        <ul>
            @foreach($eventos as $evento)
                <li>
                    <h3>{{ $evento->nombre }}</h3>
                    <p>{{ $evento->descripcion }}</p>
                    <p>{{ $evento->tipo }}</p>
                    <a href="{{ route('evento.show', ['id' => $evento->id]) }}">Más info</a>
                </li>
            @endforeach
        </ul>
    @endif
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
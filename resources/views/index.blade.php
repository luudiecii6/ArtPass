<!-- resources/views/artpass.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff8e1; /* Fondo claro */
        }

        header {
            background-color: #b38600; /* Marrón dorado */
            color: #fff;
            padding: 10px 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        #branding {
            float: left;
        }

        #branding h1 {
            margin: 0;
            color: #ffeb3b; /* Amarillo */
        }

        .cerrarSesion {
            color: #fff;
            border: none;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
            display: block;
            background-color: #b38600;
            font-size: 17px;
        }

        nav {
            float: right;
            margin-top: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
            display: inline-block;
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
            display: block;
        }

        nav ul li:hover > a {
            background-color: #ffeb3b;
            color: #000;
        }

        nav ul li select {
            background-color: #b38600; /* Marrón dorado */
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        nav ul li select option {
            background-color: #fff;
            color: #000;
        }

        nav ul li select:focus {
            outline: none;
        }

        nav ul li select option:hover {
            background-color: #ffeb3b;
            color: #000;
        }

        nav ul li select option a {
            color: #000;
            text-decoration: none;
        }

        .bienvenido {
            margin-left: 600px;
        }

        .portada {
            width: 100%;
            height: auto;
            max-height: 400px; /* Limita la altura de la imagen */
            object-fit: cover;
        }
        .content {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .section {
            width: 100%;
            margin: 10px 0;
            padding: 20px;
            background-color: #fff8e1;
            border: 1px solid #b38600; /* Borde marrón dorado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            color: #b38600; /* Marrón dorado */
            border-bottom: 2px solid #ffeb3b; /* Amarillo */
            padding-bottom: 10px;
        }
        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
        }
        .carousel::-webkit-scrollbar {
            display: none; /* Ocultar scrollbar */
        }
        .carousel-item {
            width: 150px; /* Ancho de cada evento */
            height: 150px; /* Altura de cada evento */
            margin: 10px;
            background-color: #fff;
            border: 1px solid #b38600;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            text-align: center;
            padding: 10px;
        }
        .carousel-btn {
            background-color: #b38600;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin: 10px;
        }
        footer {
            background-color: #b38600; /* Marrón dorado */
            color: #fff;
            padding: 20px 0;
        }
        footer .container {
            text-align: center;
        }
        footer p {
            margin: 0;
        }
        footer ul li {
            padding: 0;
            list-style: none;
        }
        footer ul li {
            display: flex;
            margin: 0 10px;
        }
        .icon {
            width: 50px;
            height: 50px;
            padding: 20px;
            align-content: center;
        }
        .icono {
            display: inline-block;
        }
        
    </style>
    <script>
        function redirectToTipo(tipo) {
            if (tipo) {
                window.location.href = `/eventos/${tipo}`;
            }
        }
    </script>
</head>
<body>
    @if(auth()->check())
    <header>
        <div class="container">
            <div id="branding">
                <h1>ArtPass</h1>
            </div>
            @auth
            <div>
                <span class="bienvenido">Bienvenido, {{ auth()->user()->nombre }}</span>
            </div>
            @endauth
            <nav>
                <ul>
                    <li>
                        <label for="tipos" style="color: #fff; font-weight: bold;">Tipos de eventos:</label>
                        <select name="tipos" id="tipos" onchange="redirectToTipo(this.value);">
                            <option value=".">Seleccionar</option>
                            <option value="Teatro">Teatro</option>
                            <option value="Concierto">Concierto</option>
                            <option value="Deportivo">Deportivo</option>
                            <option value="Cine">Cine</option>
                            <option value="Feria">Feria</option>
                        </select>
                    </li>
                    <li><a href="{{ route('entradas.usuario') }}">Tus Entradas</a></li>
                    @auth
                        @if(auth()->user()->esAdmin == 1)
                            <li><a href="{{ route('events.create') }}">Crear Evento</a></li>
                            <li><a href="{{ route('usuarios.index') }}">Ver Usuarios</a></li>
                        @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="form-logout">
                            @csrf
                            <button type="submit" class="cerrarSesion">Cerrar Sesión</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <img src="{{ asset('imagenes/portada.jpg') }}" alt="Portada" class="portada">
    <div class="content">
        @foreach ($sections as $index => $section)
        <div class="section">
            <h2>{{ $section['title'] }}</h2>
            <div class="events">
                @php
                    $chunkedEvents = array_chunk($section['events']->all(), 15);
                @endphp
    
                @foreach ($chunkedEvents as $eventsChunk)
                    <div class="events-container">
                        @foreach ($eventsChunk as $event)
                            <div class="event">
                                <h3>{{ $event->nombre }}</h3>
                                <!-- Otros detalles del evento si es necesario -->
                                <a href="{{ route('evento.show', ['id' => $event->id]) }}">Más info</a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    
    <footer>
        <div class="container">
            <p>¿Por qué ArtPass?</p>
            <ul>
                <div class="icono">
                    <img src="{{ asset('imagenes/entrada.png') }}" class="icon">
                    <li>Entradas oficiales garantizadas</li>
                </div>
                <div class="icono">
                    <img src="{{ asset('imagenes/smartphone.png') }}" class="icon">
                    <li>Seguridad y protección de datos</li>
                </div>
                <div class="icono">
                    <img src="{{ asset('imagenes/ilusionista.png') }}" class="icon">
                    <li>Más de 3000 eventos</li>
                </div>
                <div class="icono">
                    <img src="{{ asset('imagenes/exclusivo.png') }}" class="icon">
                    <li>Ventajas exclusivas</li>
                </div>
                <div class="icono">
                    <img src="{{ asset('imagenes/metodo_pago.png') }}" class="icon">
                    <li>Múltiples métodos de pago</li>
                </div>
            </ul>
        </div>
    </footer>
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

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
            background-color: #fff8e1;
        }

        header {
            background-color: #b38600;
            color: #fff;
            padding: 10px 0;
            position: relative;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #branding h1 {
            margin: 0;
            color: #ffeb3b;
        }

        nav {
            position: relative;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a, nav ul li select {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
            display: block;
            background-color: #b38600;
            border: none;
            cursor: pointer;
        }

        nav ul li a:hover, nav ul li select:hover, .cerrarSesion:hover {
            background-color: #ffeb3b;
            color: #000;
        }

        .cerrarSesion {
            color: #fff;
            background-color: #b38600;
            border: none;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
            cursor: pointer;
            font-size: 17px;
        }

        .bienvenido {
            color: #ffeb3b;
        }

        .portada {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
        }

        .content {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .section {
            margin: 10px 0;
            padding: 20px;
            background-color: #fff8e1;
            border: 1px solid #b38600;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #b38600;
            border-bottom: 2px solid #ffeb3b;
            padding-bottom: 10px;
        }

        .events-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .event {
            background-color: #fff;
            border: 1px solid #b38600;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            flex: 1 1 30%;
            min-width: 200px;
            text-align: center;
        }

        footer {
            background-color: #b38600;
            color: #fff;
            padding: 20px 0;
        }

        footer .container {
            text-align: center;
        }

        footer ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        footer ul li {
            margin: 10px;
            display: flex;
            align-items: center;
        }

        footer ul li .icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        /* Menu hamburguesa */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-toggle div {
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin: 4px;
        }

        @media (max-width: 768px) {
            header, nav ul {
                text-align: center;
            }

            .menu-toggle {
                display: flex;
            }

            .container {
                flex-direction: column;
            }

            nav {
                width: 100%;
            }

            nav ul {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px; /* Asegura que el menú se despliegue debajo del encabezado */
                left: 0;
                width: 100%;
                background-color: #b38600; /* Fondo para el menú desplegable */
                padding: 0;
                z-index: 1000;
            }

            nav ul li {
                margin: 0;
            }

            nav ul.show {
                display: flex;
            }

            .bienvenido {
                display: block;
                margin: 10px 0;
            }

            .event {
                flex: 1 1 100%;
            }

            footer ul li {
                flex-direction: column;
                text-align: center;
            }

            footer ul li .icon {
                margin: 0 0 10px 0;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 0 10px;
            }

            .section {
                padding: 10px;
            }
        }
    </style>
    <script>
        function redirectToTipo(tipo) {
            if (tipo) {
                window.location.href = `/eventos/${tipo}`;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navUl = document.querySelector('nav ul');

            menuToggle.addEventListener('click', function() {
                navUl.classList.toggle('show');
            });
        });
    </script>
</head>
<body>
    @if(auth()->check())
    <header>
        <div class="container">
            <div id="branding">
                <h1>ArtPass</h1>
            </div>
            <div class="bienvenido">
                Bienvenido, {{ auth()->user()->nombre }}
            </div>
            <nav>
                <div class="menu-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
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
                </ul>
            </nav>
        </div>
    </header>
    <img src="{{ asset('imagenes/portada.jpg') }}" alt="Portada" class="portada">
    <div class="content container">
        @foreach ($sections as $index => $section)
        <div class="section">
            <h2>{{ $section['title'] }}</h2>
            <div class="events-container">
                @foreach ($section['events']->chunk(15) as $eventsChunk)
                    @foreach ($eventsChunk as $event)
                        <div class="event">
                            <h3>{{ $event->nombre }}</h3>
                            <!-- Otros detalles del evento si es necesario -->
                            <a href="{{ route('evento.show', ['id' => $event->id]) }}">Más info</a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <footer>
        <div class="container">
            <p>¿Por qué ArtPass?</p>
            <ul>
                <li>
                    <img src="{{ asset('imagenes/entrada.png') }}" class="icon">
                    <span>Entradas oficiales garantizadas</span>
                </li>
                <li>
                    <img src="{{ asset('imagenes/smartphone.png') }}" class="icon">
                    <span>Seguridad y protección de datos</span>
                </li>
                <li>
                    <img src="{{ asset('imagenes/ilusionista.png') }}" class="icon">
                    <span>Más de 3000 eventos</span>
                </li>
                <li>
                    <img src="{{ asset('imagenes/exclusivo.png') }}" class="icon">
                    <span>Ventajas exclusivas</span>
                </li>
                <li>
                    <img src="{{ asset('imagenes/metodo_pago.png') }}" class="icon">
                    <span>Múltiples métodos de pago</span>
                </li>
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

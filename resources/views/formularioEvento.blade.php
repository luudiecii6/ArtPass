<!-- resources/views/events/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS||Crear Eventos</title>
    <style>
         body {
            background-color: #f0e68c; /* amarillo claro */
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffd700; /* dorado */
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        h1 {
            color: #8b4513; /* marrón */
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            color: #8b4513; /* marrón */
            font-weight: bold;
        }
        input[type="text"],
        input[type="time"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #8b4513; /* marrón */
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #8b4513; /* marrón */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #a0522d; /* marrón más oscuro */
        }
        .inicio-button {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #8b4513; /* Gold background */
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
    @if(auth()->user()->esAdmin == 1)
    <div class="container">
        <h1>Crear Evento</h1>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="feria">Feria</option>
                    <option value="concierto">Concierto</option>
                    <option value="teatro">Teatro</option>
                    <option value="cine">Cine</option>
                    <option value="deportivo">Deportivo</option>
                </select>
            </div>
            <h2>Instancias del Evento</h2>
            <div id="instances">
                <div class="instance">
                    <div class="form-group">
                        <label for="horario">Horario</label>
                        <input type="time" name="instancia[0][horario]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="instancia[0][fecha]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_sala">Nombre de la Sala</label>
                        <input type="text" name="instancia[0][nombre_sala]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="instancia[0][ciudad]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" name="instancia[0][calle]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comunidad">Comunidad</label>
                        <input type="text" name="instancia[0][comunidad]" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="button" id="addInstance" class="btn btn-secondary">Añadir Instancia</button>
            <button type="submit" class="btn btn-primary">Crear Evento</button>
        </form>
        @endif
        <div class="inicio-button">
            <a class="back-button" href="/index">Volver al Inicio</a>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('addInstance').addEventListener('click', function() {
            var instancesDiv = document.getElementById('instances');
            var instanceCount = instancesDiv.getElementsByClassName('instance').length;
            var newInstance = document.createElement('div');
            newInstance.classList.add('instance');
            newInstance.innerHTML = `
                <div class="form-group">
                    <label for="horario">Horario</label>
                    <input type="time" name="instancia[${instanceCount}][horario]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="instancia[${instanceCount}][fecha]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre_sala">Nombre de la Sala</label>
                    <input type="text" name="instancia[${instanceCount}][nombre_sala]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="instancia[${instanceCount}][ciudad]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="calle">Calle</label>
                    <input type="text" name="instancia[${instanceCount}][calle]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comunidad">Comunidad</label>
                    <input type="text" name="instancia[${instanceCount}][comunidad]" class="form-control" required>
                </div>
            `;
            instancesDiv.appendChild(newInstance);
        });
    </script>
    @else
    <div style="text-align: center; margin-top: 50px;">
        <h2>Necesitas iniciar sesión para ver esta página y ser administrador</h2>
        <a href="{{ route('login.formu') }}" style="text-decoration: none;">
            <button style="padding: 10px 20px; background-color: #b38600; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Iniciar Sesión</button>
        </a>
    </div>
    @endif
</body>
</html>

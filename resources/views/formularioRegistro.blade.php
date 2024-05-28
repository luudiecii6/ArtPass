<!DOCTYPE html>
<html>
<head>
    <title>ART PASS||Registro</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f0e582; /* Color de fondo similar al del login */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1000px;
        }

        .formulario {
            width: 500px;
            background-color: #daac7e; /* Color de fondo similar al del login */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .formulario h2 {
            text-align: center;
            color: white; /* Color del texto similar al del login */
            margin-bottom: 20px;
        }

        .formulario label {
            color: white; /* Color del texto similar al del login */
            display: block;
            margin-bottom: 5px;
        }

        .formulario input[type="text"],
        .formulario input[type="email"],
        .formulario input[type="password"],
        .formulario input[type="date"],
        .formulario input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box; /* Ajustar el tamaño incluyendo el padding */
        }

        .formulario input[type="submit"] {
            background-color: #cca052; /* Dorado similar al del login */
            color: white;
            cursor: pointer;
        }

        .formulario input[type="submit"]:hover {
            background-color: #b58f41; /* Dorado más oscuro al pasar el ratón similar al del login */
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <h2>Formulario de Registro</h2>
            <form action="{{ route('crearUsuario') }}" method="post">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                @if ($errors->has('nombre'))
                    <div class="error">{{ $errors->first('nombre') }}</div>
                @endif

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
                @if ($errors->has('apellidos'))
                    <div class="error">{{ $errors->first('apellidos') }}</div>
                @endif

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                @if ($errors->has('fecha_nacimiento'))
                    <div class="error">{{ $errors->first('fecha_nacimiento') }}</div>
                @endif

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña">
                @if ($errors->has('contraseña'))
                    <div class="error">{{ $errors->first('contraseña') }}</div>
                @endif

                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}">
                @if ($errors->has('username'))
                    <div class="error">{{ $errors->first('username') }}</div>
                @endif

                <label for="comunidad">Comunidad:</label>
                <input type="text" id="comunidad" name="comunidad" value="{{ old('comunidad') }}">
                @if ($errors->has('comunidad'))
                    <div class="error">{{ $errors->first('comunidad') }}</div>
                @endif

                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" value="{{ old('ciudad') }}">
                @if ($errors->has('ciudad'))
                    <div class="error">{{ $errors->first('ciudad') }}</div>
                @endif

                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}">
                @if ($errors->has('codigo_postal'))
                    <div class="error">{{ $errors->first('codigo_postal') }}</div>
                @endif

                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>
</body>
</html>

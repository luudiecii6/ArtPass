<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART PASS||Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: flex;
            height: 100%;
        }
        
        .left-half {
            flex: 1;
            background-color: #daac7e; /* Marrón clarito */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .right-half {
            flex: 1;
            background-color: #f0e582; /* Marrón */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .form-container {
            width: 80%;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            background-color: #daac7e; /* Marrón */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 380px;
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 4px;
        }
        
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            background-color: #cca052; /* Dorado */
            color: #fff;
            cursor: pointer;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #b58f41; /* Dorado más oscuro al pasar el ratón */
        }
        
        .register-button {
            margin-top: 20px;
            text-align: center;
        }
        
        .register-button .btn {
            display: inline-block;
            padding: 10px 20px;
            width: 360px;
            background-color: #cca052; /* Dorado */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s ease;
            font-size: 13px;
        }

        .register-button .btn:hover {
            background-color: #b58f41; /* Dorado más oscuro al pasar el ratón */
        }
        
        .logo-img {
            max-width: 450px; /* Ajusta el tamaño máximo de la imagen */
            max-height: 80%; /* Ajusta la altura máxima de la imagen */
        }
        
        h2 {
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }
    </style>    
    </head>
    <body>
        <div class="container">
            @if(session('error'))
                <div id="error-message" class="alert alert-danger">
                    {{ session('error') }}
                </div>
                <script>
                    setTimeout(() => {
                        window.location.href = "{{ url('/') }}";
                    }, 4000);
                </script>
            @endif
            <div class="left-half">
                <img src="{{ asset('imagenes/Logo.PNG') }}" alt="Logo" class="logo-img">
            </div>
            <div class="right-half">
                <div class="form-container">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <h2>LOGIN</h2>
                        <input type="text" name="username" placeholder="Usuario">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="contraseña" placeholder="Contraseña">
                        @error('contraseña')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Iniciar Sesión">
                    </form>
                    <div class="register-button">
                        <a href="{{ url('/formularioRegistro') }}" class="btn">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>


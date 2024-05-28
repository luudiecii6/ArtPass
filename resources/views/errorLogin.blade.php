<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #daac7e;
            color: #721c24;
            font-family: Arial, sans-serif;
        }
        .message-box {
            text-align: center;
            border: 1px solid #f5c6cb;
            padding: 20px;
            border-radius: 5px;
            background-color: #daac7e;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h1>Los datos introducidos no se han encontrado en la base de datos</h1>
        <p>Serás redirigido en 5 segundos...</p>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "{{ url('/') }}";
        }, 5000);
    </script>
</body>
</html>

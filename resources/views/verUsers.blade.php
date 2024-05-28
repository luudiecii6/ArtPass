<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/miCarpeta/listaUsuarios.css">
    <title>ART PASS||Lista Usuarios</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #FFF8E7; /* Light yellow background */
    color: #4D3A27; /* Dark brown text */
    margin: 0;
    padding: 0;
}

.container {
    width: 93.5%;
    background-color: #FAEBD7; /* Antique white background */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Table styles */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th,
.table td {
    border: 1px solid #D4AF37; /* Gold border */
    padding: 10px;
    text-align: left;
}

.table th {
    background-color: #D4AF37; /* Gold background for header */
    color: #FFF; /* White text */
}

.table tr:nth-child(even) {
    background-color: #FFF8E7; /* Light yellow for even rows */
}

.table tr:hover {
    background-color: #F5DEB3; /* Wheat color on hover */
}

/* Button styles */
button {
    background-color: #D4AF37; /* Gold background */
    color: #FFF; /* White text */
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #B8860B; /* Dark goldenrod background on hover */
}

/* Center button styles */
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

.back-button:hover {
    background-color: #B8860B; /* Dark goldenrod background on hover */
}
    </style>
</head>
<body>
  @auth
  <?php
if (session()->has('nombre_usuario') || session()->has('id')) {
 ?>
<div class="container">
  <div class="inicio-button">
    <a class="back-button" href="/index">Volver al Inicio</a>
  </div>
    <table class="table table-striped">
    <tr>
      <th>id</th>  
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Fecha de Nacimiento</th>
      <th>Username</th>
      <th>Comunidad</th>
      <th>Ciudad</th>
      <th>Código Postal</th>
      <th>Es Admin?</th>
      @if(auth()->user()->esAdmin)
      <th>Eliminar</th>
      <th>Hacer/Quitar Admin</th>
      @endif
    </tr>
    <tbody>
     @foreach($usuarios as $usuario)
     @if($usuario->id != Auth::id())
    <tr>
      <td>{{ $usuario->id }}</td>
      <td>{{ $usuario->nombre }}</td>
      <td>{{ $usuario->apellidos }}</td>
      <td>{{ $usuario->email }}</td>
      <td>{{ $usuario->fecha_nacimiento }}</td>
      <td>{{ $usuario->username }}</td>
      <td>{{ $usuario->comunidad }}</td>
      <td>{{ $usuario->ciudad }}</td>
      <td>{{ $usuario->codigo_postal }}</td>
      <td>{{ $usuario->esAdmin ? 'Sí' : 'No' }}</td>
      @if($usuario->username != 'pepe' && auth()->user()->esAdmin)
      <td>
        <form action="{{ route('usuarios.eliminar', ['id' => $usuario->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario?')">
          @csrf
          @method('DELETE')
          <button type="submit">Eliminar</button>
        </form>
      </td>
      <td>
        <form action="{{ route('usuarios.quitarAdmin', ['id' => $usuario->id]) }}" method="POST">
          @csrf
          <button type="submit">Quitar Admin</button>
        </form>
        <form action="{{ route('usuarios.hacerAdmin', ['id' => $usuario->id]) }}" method="POST">
          @csrf
          <button type="submit">Hacer Admin</button>
        </form>
      </td>
      @endif
    </tr>
    @endif
    @endforeach
    </tbody>
    </table>
</div>
<?php } ?>
@endauth
</body>
</html>

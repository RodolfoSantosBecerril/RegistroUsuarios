<!-- resources/views/usuarios/index.blade.php -->
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <form method="GET" action="{{ route('usuarios.index') }}">
        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Buscar por nombre, apellido o teléfono">
        <button type="submit">Buscar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                        <form method="POST" action="{{ route('usuarios.destroy', $usuario) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('usuarios.create') }}">Crear Usuario</a>
</body>
</html>

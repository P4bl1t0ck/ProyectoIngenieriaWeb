<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Tareas</title>
</head>
<body>
    <h1>Mis Tareas</h1>
    
    <p>Bienvenido, {{ auth()->user()->name }}</p>
    
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <br><br>

    <a href="{{ route('tasks.create') }}"><button>Nueva Tarea</button></a>

    <br><br>

    @if ($tasks->isEmpty())
        <p>No hay tareas. Crea una nueva.</p>
    @else
        <table border="1" cellpadding="10">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description ?? '-' }}</td>
                    <td>{{ $task->is_completed ? 'Completada' : 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}"><button>Editar</button></a>
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>

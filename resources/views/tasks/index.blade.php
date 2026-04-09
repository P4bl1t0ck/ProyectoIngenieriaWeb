<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas del Hogar</title>
</head>
<body>
    <h1>🏠 Mis Tareas del Hogar</h1>
    
    <p>Bienvenido, <strong>{{ auth()->user()->name }}</strong></p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

    @if (session('success'))
        <div>
            <strong>✓ {{ session('success') }}</strong>
        </div>
    @endif

    <br>
    <a href="{{ route('tasks.create') }}">➕ Nueva Tarea</a>
    <br><br>

    @if ($tasks->isEmpty())
        <h2>Sin tareas aún</h2>
        <p>¡Crea tu primera tarea para comenzar!</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <strong>{{ $task->title }}</strong>
                        </td>
                        <td>
                            {{ $task->description ?? 'Sin descripción' }}
                        </td>
                        <td>
                            {{ $task->is_completed ? '✓ Completada' : 'Pendiente' }}
                        </td>
                        <td>
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit">
                                    {{ $task->is_completed ? '🔄 Reabrir' : '✓ Completar' }}
                                </button>
                            </form>
                            
                            <a href="{{ route('tasks.edit', $task) }}"><button type="button">✏️ Editar</button></a>
                            
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Título:</label><br>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="description" rows="4">{{ old('description', $task->description) }}</textarea><br><br>

        <label>
            <input type="checkbox" name="is_completed" value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
            Completada
        </label><br><br>

        <button type="submit">Guardar Cambios</button>
        <a href="{{ route('tasks.index') }}"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>

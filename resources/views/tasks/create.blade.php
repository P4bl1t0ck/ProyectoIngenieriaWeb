<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>Nueva Tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label>Título:</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="description" rows="4">{{ old('description') }}</textarea><br><br>

        <button type="submit">Guardar Tarea</button>
        <a href="{{ route('tasks.index') }}"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>

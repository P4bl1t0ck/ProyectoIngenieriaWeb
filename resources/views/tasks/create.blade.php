<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>✨ Nueva Tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Título de la Tarea *</label><br>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title') }}"
                placeholder="Ej: Limpiar la cocina"
                required
            >
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="description">Descripción (Opcional)</label><br>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Detalles adicionales sobre la tarea..."
                rows="5"
            >{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Crear Tarea</button>
        <a href="{{ route('tasks.index') }}"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>

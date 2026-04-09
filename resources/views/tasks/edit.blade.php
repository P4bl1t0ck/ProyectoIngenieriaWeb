<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>✏️ Editar Tarea</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Título de la Tarea *</label><br>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title', $task->title) }}"
                required
            >
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="description">Descripción</label><br>
            <textarea 
                id="description" 
                name="description"
                rows="5"
            >{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <input 
                type="checkbox" 
                id="is_completed" 
                name="is_completed" 
                value="1"
                {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}
            >
            <label for="is_completed">Marcar como completada</label>
        </div>

        <br>

        <button type="submit">Guardar Cambios</button>
        <a href="{{ route('tasks.index') }}"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>

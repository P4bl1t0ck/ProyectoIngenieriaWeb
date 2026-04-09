<?php

namespace App\Http\Controllers;

use App\Models\HomeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeTaskController extends Controller
{
    // Listar todas las tareas del usuario - READ (R del CRUD)
    public function index()
    {
        // Solo mostrar tareas del usuario autenticado
        $tasks = Auth::user()->tasks;
        
        return view('tasks.index', compact('tasks'));
    }

    // Mostrar formulario para CREAR nueva tarea - CREATE (C del CRUD)
    public function create()
    {
        return view('tasks.create');
    }

    // Guardar nueva tarea en BD - CREATE (C del CRUD)
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Crear la tarea asociada al usuario actual
        Auth::user()->tasks()->create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente');
    }

    // Mostrar una tarea específica - READ (R del CRUD)
    public function show(HomeTask $task)
    {
        // Verificar que la tarea pertenezca al usuario
        $this->authorize('update', $task);

        return view('tasks.show', compact('task'));
    }

    // Mostrar formulario de EDITAR - UPDATE (U del CRUD)
    public function edit(HomeTask $task)
    {
        // Verificar permisos
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    // Guardar cambios de tarea - UPDATE (U del CRUD)
    public function update(Request $request, HomeTask $task)
    {
        // Verificar permisos
        $this->authorize('update', $task);

        // Validar datos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        // Actualizar tarea
        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada');
    }

    // Eliminar tarea - DELETE (D del CRUD)
    public function destroy(HomeTask $task)
    {
        // Verificar permisos
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada');
    }

    // Marcar tarea como completada (ruta adicional útil)
    public function toggleComplete(HomeTask $task)
    {
        $this->authorize('update', $task);

        $task->update(['is_completed' => !$task->is_completed]);

        return redirect()->route('tasks.index')->with('success', 'Estado actualizado');
    }
}

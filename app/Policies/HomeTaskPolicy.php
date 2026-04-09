<?php

namespace App\Policies;

use App\Models\HomeTask;
use App\Models\User;

class HomeTaskPolicy
{
    /**
     * Determinar si el usuario puede ver la tarea
     */
    public function view(User $user, HomeTask $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determinar si el usuario puede actualizar la tarea
     */
    public function update(User $user, HomeTask $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determinar si el usuario puede eliminar la tarea
     */
    public function delete(User $user, HomeTask $task): bool
    {
        return $user->id === $task->user_id;
    }
}

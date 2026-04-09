<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'description', 'is_completed', 'user_id'])]
class HomeTask extends Model
{
    use HasFactory;

    // Relación: Una tarea pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

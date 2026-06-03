<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dojo extends Model
{
    protected $fillable = ['name','location','description']; //Is "admin" 
    /** @use HasFactory<\Database\Factories\DojoFactory> */
    use HasFactory;
    /* Ahora que ya definimos esas relaciones en nuestras aplicaciones*/
    public function ninjas(){
        return $this->hasMany(Ninja::class);
    }
}

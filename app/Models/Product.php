<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // I hope it works for make the ORM stuff for the Product model
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock'
        ];

    use HasFactory;

    public function categorie(){
        return $this -> belongsTo(categories::class);
        //Conexion de Producto con categories
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'estado',
    ];
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    //Relaciones
    public function items(){
        //Esta tabla tiene muchos items del carrito o este carrito puede llegar a tener muchos item de carrito
        return $this -> hasMany(CartItem::class);
    }
}

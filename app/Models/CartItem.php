<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'cantidad',
        ];
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    //Relaciones
    /*Este es un poco mas complicado su relacion, por lo que es una tabla de referencia
    que llama o contiene a varios o mas de un id, siendo este el que tendra la conexion 
    al Carrito, que puede tener varios ids relacionados a un CartItem y este CartItem 
    puede tener varios Productos. */
    public function cart(){
        //Esta tabla pertenece a Productos
        return $this -> belongsTo(Cart::class);
    }
    public function product(){
        //Esta tabla pertenece a Productos
        return $this -> belongsTo(Product::class);
        //Recordar que es asi como llamamos y conectamos clases en POO, y que a nivel de ORM
        //POdmemos utilziar herramientas y funciones en tablas de SQL como si fueran objetos de POO
        
    }
}

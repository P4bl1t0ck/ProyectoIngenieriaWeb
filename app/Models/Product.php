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
        'stock',
        'categorie_id', //i forgot.

        ];

    use HasFactory;

    public function categorie(){
        return $this -> belongsTo(categories::class, 'categorie_id'); 
        //las vinetas finales eran nesecarias para hacer referencia que se hace la conexion
        //con categorie_idd de la otra tabla
        //Conexion de Producto con categories
    }


    //Relacion de Producto con CartItems->>Cart-
    public function cartItems(){
        //Es la conexion de clases de Prodcut con CaertItems, sinedo    que esta que Cartitem puede llegar a temer muchos producotws
        return $this -> hasMany(CartItem::class);
    }
}

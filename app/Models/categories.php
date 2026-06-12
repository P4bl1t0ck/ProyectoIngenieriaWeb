<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $fillable = [
        //'id', For some fucking ressason this fucking thing breaks the code.
        'nombre',
        'descripcion'
        ];

        /*THe models and the factory has to be exact on 
        his attributts, the id, on the migrations, can be modified and it will
        automatically increase and plus by the time. */
    use HasFactory;

    public function products(){
        //Y definimos bien la copnexion de la categiriua de muchos a la tabla de Product
        return $this->hasMany(Product::class, 'categorie_id');
        //Aqui la bineta nos ayuda a decir aqui, hey. si aqui es categorie_id es la referencia
    }

}

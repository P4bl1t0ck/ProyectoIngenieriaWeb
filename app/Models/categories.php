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

    public function product(){
        //Y definimos bien la copnexion de la categiriua de muchos a la tabla de Product
        return $this->hasMany(Product::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Now ew can create tables, based on this class, for Ninjas, for ORM
and be capable of use OOP on each method that we made on this class
also*/ 

class Ninja extends Model
{
    protected $fillable = [
        'name',
        'skill',
        'bio', 
        'dojo_id']; //Ok i forgot the dojo_id
    //Array of column names
    
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;

    /*Ahora que ya tenemos la reclaion de PK y FK, al momento de generaree con los datoss de factories y seeders
pero no es formalmente completamente cierto, siguiendo el flujo, nosotros creamos los modelos, controlares y vistas,
para las base de datos, hiciemos, los modelos, migraciones, factories y Seeders e hicimos sus relaciones dentro de 
las migraciones correspoendites a su jerarquia y si denpendencia,  pero ahi, no hay formalmente una conexion o una 
relacion como un constraint hecho en nuestros modelos enloquents ORM por lo que para eso, vamos a gaer lo sigueinte. El primer punto es el dentro de la 
tabla que va  tomar la reclaion, oea NINJA creamos una clase de constructor que nos permititra el usar ORM a nivel de OOP para nuestras tablas a nivel de modelos.
Ahora, vamos a en realidad a modificar y crear las relaciones. */

    public function dojo(){
        return $this ->belongsTo(Dojo::class);
        /*Objeto tabla de Model, osea este objeto-tabla, pertenece a el objeto Dojo.*/    
    }
}


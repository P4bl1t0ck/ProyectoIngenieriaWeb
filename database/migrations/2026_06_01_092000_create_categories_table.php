<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table -> text('descripcion');    
            $table->timestamps();
            //For good programming practices
            /*  My dOJO ists alradu made */
        });
        /*Es importante el detallar que dentro de el modelo, y factory,
        deben de ser iguales en sus atributos de tabla, dentro de la migacion 
        se puede agregar el id autoincrementable y no afectarasin que eswte dentro de os
        atributos dentro de el modelo, tambien hay que tener cuidado con las relaciones
        claves foraneas y pk, donde la tabla que se hace referencia, en este caso categorie
        debia de existir antes su  tabla productos para relacionarle con la clave foranea
        para que al momento de ejecutar la migracion de productos, este se conecte a la tabla ya existente
        importan las horas de las migraciones y a que hora se realizaron, para que no afecte 
        cuando se creen las tablas y luego se relacionen conel constraint. */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

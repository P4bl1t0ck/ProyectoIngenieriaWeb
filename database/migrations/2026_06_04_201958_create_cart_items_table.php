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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table-> foreignId('cart_id') -> constrained() -> onDelete('cascade');
            //hacemos la conexion por medio de un constraint llamado card_id, ese se conetara al carrito el carrito es una tabla de tablas de referencia.
            $table -> foreignId('product_id') -> constrained() -> onDelete('cascade');
            //hacemos la conexion por medio de un constraint llamado product_id este se conectara a los productos
            $table->integer('cantidad');
            $table->timestamps();
            /* Forma visual 
            Cart
            ----
            id
            CartItem
            ---------
            id
            cart_id
            product_id
            cantidad
            
            -------
            Product
            -------
            id
            categorie_id
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            //$table -> string('descripcion'); 
            //A really short attribute for a description
            $table -> text('descripcion');
            $table -> float('precio');
            $table -> integer('stock');            
            $table->timestamps();
            //Now we really make the foreing key.....fucking shit.
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');

            //Good programming practices, for see when, who and what made the product
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

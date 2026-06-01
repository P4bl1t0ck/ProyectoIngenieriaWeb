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
            $table->timestamps();
            $table ->string('id');
            $table -> string('nombre');
            $table -> string('descripcion');
            $table -> integer()

            'id' => fake() -> numberBetween(1,1000),
            'nombre' =>fake()->name(), 
            'descripcion' => fake()->realText(500),
            'precio' => fake()->numberBetween(0,100), 
            'stock' => fake()->numberBetween(0,40)
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

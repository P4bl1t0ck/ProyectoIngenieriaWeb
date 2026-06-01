<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*Un factorie para llenar las tablas con datos, aprovechando 
        las herramientas de artisan*/ 
        return [
            'id' => fake() -> numberBetween(1,1000),
            'nombre' =>fake()->name(), 
            'descripcion' => fake()->realText(500),
            'precio' => fake()->numberBetween(0,100), 
            'stock' => fake()->numberBetween(0,40)
        ];
    }
}

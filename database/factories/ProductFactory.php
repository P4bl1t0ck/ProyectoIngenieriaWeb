<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\categories;
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
            //'id' => fake() -> numberBetween(1,1000),
            'nombre' =>fake()->name(), 
            'descripcion' => fake()->realText(500),
            'precio' => fake()->numberBetween(0,100), 
            'stock' => fake()->numberBetween(0,40),
            /*To make the relaitionship during the factory of the data, inside the database
            So, for this execsice we do the foreing connection by the factory, for make the 
            coneection between th Productss and the categories.*/
            'categorie_id' => categories::inRandomOrder()->first()->id,
        ];
    }
}

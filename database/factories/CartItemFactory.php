<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Busca un carrito aleatorio o crea uno si no existe
            'cart_id' => Cart::inRandomOrder()->first()->id ?? Cart::factory(),
            
            // Busca uno de tus productos reales de tecnología/música
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            
            // Una cantidad lógica para compras en línea
            'cantidad' => fake()->numberBetween(1, 5),
        ];
    }
}

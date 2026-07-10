<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;

interface RecommendationStrategyInterface
{
    /* Nuestro codigo de recomendacion debe recibier 
    un carrito y retonar una coleccion de productos recomendados.*/
    public function recommend(Cart $cart);

    
}
<?php

namespace App\Repositories;

use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    //Parte de Repository Pattern para hacer la correcta encapsulamiento de cada interfaz.
    public function getRecommendationsByCategory($categoryId, $excludeProductIds, $limit = 5)
    {
        return Product::where('categorie_id', $categoryId)
            ->whereNotIn('id', $excludeProductIds)
            ->take($limit)
            ->get();
    }
}

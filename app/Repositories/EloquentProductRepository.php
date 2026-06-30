<?php

namespace App\Repositories;

use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function getRecommendationsByCategory($categoryId, $excludeProductIds, $limit = 5)
    {
        return Product::where('categorie_id', $categoryId)
            ->whereNotIn('id', $excludeProductIds)
            ->take($limit)
            ->get(); 
    }
}

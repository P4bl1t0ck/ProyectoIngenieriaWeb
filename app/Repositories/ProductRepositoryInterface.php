<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    /*Obtiene los productos recomendados de una categoría excluyendo los que ya están en el carrito*/
    /**
     * Este sera la interfaz de nuestro repositorio, donde esta actuara como nuestro CRUD. 
     * Y a la vez cumplimos con el patron de diseño de OCP
     */
    public function getRecommendationsByCategory($categoryId, $excludeProductIds, $limit = 5);
    
    //Repository Pattern
}

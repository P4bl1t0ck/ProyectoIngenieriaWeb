<?php

namespace App\Services;

// Our Models
use App\Models\Cart;
// Traemos a nuestra interfaz de nuestro Repositorio
use App\Repositories\ProductRepositoryInterface;

class RecommendationService implements RecommendationStrategyInterface
{
    protected ProductRepositoryInterface $productRepository;

    // Inyectamos el repositorio a traves del contrustor dentro de la clase
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function recommend(Cart $cart)
    {
        $cart->loadMissing('items.product.categorie');

        if ($cart->items->isEmpty()) {
            return collect();
        }

        $contador = [];

        foreach ($cart->items as $item) {
            $categoria = $item->product->categorie;
            // Relacion o un fetch
            // dd($categoria);

            $idCategoria = $categoria->id;
            // dd($idCategoria);
            if ((isset($contador[$idCategoria]))) {
                $contador[$idCategoria]++;
            } else {
                $contador[$idCategoria] = 1;
            }
        }
        // Contador
        // dd($contador);

        arsort($contador);
        $categoriaRecomendada = array_key_first($contador);
        // dd($categoriaRecomendada);
        $productosEnCarrito =
            $cart->items->pluck('product_id');
        // dd($productosEnCarrito);
        $recomendados =
            $this->productRepository->getRecommendationsByCategory($categoriaRecomendada, $productosEnCarrito, 5);

        // dd($recomendados);
        return $recomendados;
    }
}

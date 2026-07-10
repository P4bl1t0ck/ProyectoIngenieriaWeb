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
        //DIP principi de dependencia inversa
    }
    //Singleton
    //ServicePattern
    public function recommend(Cart $cart)
    {
        $cart->loadMissing('items.product.categorie');
        //Conseguimos y cargamos las categiariasss de los productos 
        if ($cart->items->isEmpty()) {
            return collect();
            //Si dentro del carro sus items estan vacios, devolvera la funcion collert
        }

        $contador = [];
        //UN contador

        foreach ($cart->items as $item) { //Por cada iten dentro de carro. 
            $categoria = $item->product->categorie;
            //guardaremos la relacion de las tablas, de cada item, pasando por producto a categoria
            
            $idCategoria = $categoria->id;
            // dd($idCategoria);
            if ((isset($contador[$idCategoria]))) {
                $contador[$idCategoria]++;
            } else {
                $contador[$idCategoria] = 1;
            }
            //Aqui es la decisión matematica, donde dependiendo de el contador,
            // aumentamos 1 segun la categoria agregada
        }
        // Contador
        // dd($contador);

        arsort($contador);
        $categoriaRecomendada = array_key_first($contador);
        //Finalmente dentor de contador lo ordenamos y seguido mostramos por el id dentro de categoria recomendada
        // dd($categoriaRecomendada);
        $productosEnCarrito =
            $cart->items->pluck('product_id');
            //La relacion de cada carrito e time por el product_id
        // dd($productosEnCarrito);
        $recomendados =
            $this->productRepository->getRecommendationsByCategory($categoriaRecomendada, $productosEnCarrito, 5);
            //Y finalmente dentro de recomendados, guardamos los valores de la relacion de producRepository y llamando a la funcopn

        // dd($recomendados);
        return $recomendados;
        //Retornamos recomendadoss
    }
}

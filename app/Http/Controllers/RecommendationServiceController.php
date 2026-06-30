<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecommendationService;
use App\Models\Cart;

class RecommendationServiceController extends Controller
{
    public function index(RecommendationService $recommendationService)
    {
        // 1. Obtenemos un carrito de prueba (asegúrate de tener un ID válido en tu DB)
        $cart = Cart::find(1); 

        // Si no encuentra el carrito 10, toma el primero que pille para que no rompa la pantalla
        if (!$cart) {
            $cart = Cart::first();
        }

        // 2. Invocamos el Core (SRP: El controlador no sabe CÓMO se calcula, solo pide el resultado)
        $recomendados = $recommendationService->recommend($cart);
        
        // 3. Enviamos los datos limpios a tu vista
        return view('Recomendation.index', compact('recomendados'));
    }
    //Modificamos nuestra funcion de index para mostrar las recomendaciones por medio de un metodo post
    //Pues Vista -> Controladore -> DB y de vuelta, y nesecitaremos metodos de post para esto


}

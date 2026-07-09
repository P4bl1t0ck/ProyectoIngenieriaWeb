<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    //We only ´´ll need this two functions for get the .json file 
    public function index(Request $request){ //Fñltra y consulta 
        $consulta = Product::with('categorie');
        //Consultamos dentro de la base de datos categorie de la tabla Products
        if($request->filled('search')){
            //Comprobamos si la consulta tiene search
            $consulta->where('nombre','like','%'.$request->search . '%');
            //Y si dentro de la consulta este tiene una estructura asi
            ///api/products?search=asus
            //Y devolvera el producto buscado. Pero ojo, este es basado en string.
        }
        return response()->json($consulta->get());
        //Al final devuelve la respues ede la consulta en json.
    }x
    public function show(Product $product){ //Especifica el buscador.
        return response()->json($product->load('categorie'));
        //Esta funcion retorna el producto seleccionado a json y lo carga
        //solo por categoria
    }
}


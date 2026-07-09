<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\categories;

class CategoryApiController extends Controller
{
    public function index(){
        return response()->json(categories::all());
        //Esta funcion lo que hace es acceder a todos los valores
        //dentro de la tabal de Categories, Por el momento, mostrara todo
    }
}

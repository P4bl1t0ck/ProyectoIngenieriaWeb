<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\ProductController;

/*
All the part from routes  */
// Rutas públicas
//For products and core routes
/*Esta es una forma de como acceder del objeto o mejor dicho. clase que esta conectada comn
de como usamos todos los atributos y funciones de el ProductController y accedemos
a cada uno de sus vistas.*/

Route::get('/products',[ProductController::class, 'index']);
Route::get('/products/create',[ProductController::class, 'create']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', [ NinjaController::class, 'index']);


Route::get('/ninjas/create', [NinjaController::class, 'create']);

//Round parameters
Route::get('/ninjas/{id}', [NinjaController::class, 'show']);


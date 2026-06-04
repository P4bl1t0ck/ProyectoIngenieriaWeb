<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;

/*Product routes */
// Rutas públicas

//Index, show 
Route::get('/products',[ProductController::class, 'index']) -> name('Products.index');
Route::get('/products/create',[ProductController::class, 'create']) -> name('Products.create');
Route::get('/products/{Product}',[ProductController::class,'show']) -> name('Products.show');

//Metodos de Leer, borrar, actualiza y guardar
Route::post('/products', [ProductController::class,'store'])-> name('Products.store');
Route::get('/products/{Product}/edit', [ProductController::class, 'edit'])->name('Products.edit');
Route::put('/products/{Product}', [ProductController::class, 'update'])->name('Products.update');
Route::delete('/products/{Product}', [ProductController::class, 'destroy'])->name('Products.destroy');


/*Cteagorie Routes */

//Lista de categorias
Route::get('/Categories', [CategoriesController::class, 'index'])->name('Categories.index');
//Crear Categorias
Route::get('/Categories/create', [CategoriesController::class, 'create'])->name('Categories.create');
//Detalle de una categoria, el Show
Route::get('/Categories/{categorie}', [CategoriesController::class, 'show'])->name('Categories.show');

//Post store
Route::post('/Categories', [CategoriesController::class, 'store'])->name('Categories.store');

//Editar Categoria 
Route::get('/Categories/{categorie}/edit', [CategoriesController::class, 'edit'])->name('Categories.edit');
//Actualizar Categoria
Route::put('/Categories/{categorie}', [CategoriesController::class, 'update'])->name('Categories.update');

//Eliminiar categoria
Route::delete('/Categories/{categorie}', [CategoriesController::class, 'destroy'])->name('Categories.destroy');


Route::get('/', function () {
    return view('welcome');
});


/*Ninja Course*/
/*
Route::get('/ninjas', [ NinjaController::class, 'index'])->name('ninjas.index');


Route::get('/ninjas/create', [NinjaController::class, 'create'])-> name('ninjas.create');

//Round parameters
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show']) -> name('ninja.show');

/*Post method, usamos los principios RACI haciendo que dentro
/ninja, asi que modificaremos la funcion de store dentro del controlador
ddel NinjaController

Route::post('/ninjas',[NinjaController::class, 'store'])->name('ninjas.store'); //Nmae of the routes

//Delete Metho
Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');
*/
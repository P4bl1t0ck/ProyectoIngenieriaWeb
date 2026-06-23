<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Models\Cart;
use App\Services\RecommendationService;


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

//Servicio forma de prueba


Route::get('/test-recommendation', function(){
    $cart = Cart::find(1);
    $service = new RecommendationService();
    $recomendados = $service->recommend($cart);
    return $recomendados;});

Route::get('/core',[RecommendationService::class, 'index'])->name('core.index');

//Lista de categorias
Route::get('/categories', [CategoriesController::class, 'index'])->name('Categories.index');
//Crear Categorias
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('Categories.create');
//Detalle de una categoria, el Show
Route::get('/categories/{categorie}', [CategoriesController::class, 'show'])->name('Categories.show');

//Post store
Route::post('/categories', [CategoriesController::class, 'store'])->name('Categories.store');

//Editar Categoria 
Route::get('/categories/{categorie}/edit', [CategoriesController::class, 'edit'])->name('Categories.edit');
//Actualizar Categoria
Route::put('/categories/{categorie}', [CategoriesController::class, 'update'])->name('Categories.update');

//Eliminiar categoria
Route::delete('/categories/{categorie}', [CategoriesController::class, 'destroy'])->name('Categories.destroy');


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
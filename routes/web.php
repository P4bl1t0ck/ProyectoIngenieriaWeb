<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendationServiceController;
use App\Models\Cart;
use App\Models\Product;
use App\Services\RecommendationService;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* Product routes */
Route::get('/login-test', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-react', function () {
    return Inertia::render('PruebaFiltro', [

    ]);
});
require __DIR__.'/auth.php';
//React isntalacion
// Rutas públicas

// Index, show para Products
Route::get('/products', [ProductController::class, 'index'])->name('Products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('Products.create');
Route::get('/products/{Product}', [ProductController::class, 'show'])->name('Products.show');

// Metodos de Leer, borrar, actualiza y guardar para Products
Route::post('/products', [ProductController::class, 'store'])->name('Products.store');
Route::get('/products/{Product}/edit', [ProductController::class, 'edit'])->name('Products.edit');
Route::put('/products/{Product}', [ProductController::class, 'update'])->name('Products.update');

//Metodos para el carrito
Route::post('/products/{Product}/cart', [ProductController::class, 'addToCart'])->name('Products.cart.add');
Route::post('/cart/clear', [ProductController::class, 'clearCart'])->name('cart.clear');
// Servicio forma de prueba

Route::get('/test-recommendation', function () {
    $cart = Cart::first();
    $service = app(RecommendationService::class);

    if (! $cart) {
        return collect();
    }

    $recomendados = $service->recommend($cart);

    return $recomendados;
});

Route::get('/core', [RecommendationServiceController::class, 'index'])->name('core.index');
// Ahi cumplimos con la parte de SRP, al llamar al controlador para que se encarge de el mostrar los resulados dentro de la aplicacion

// Lista de categorias
Route::get('/categories', [CategoriesController::class, 'index'])->name('Categories.index');
// Crear Categorias
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('Categories.create');
// Detalle de una categoria, el Show
Route::get('/categories/{categorie}', [CategoriesController::class, 'show'])->name('Categories.show');

// Post store
Route::post('/categories', [CategoriesController::class, 'store'])->name('Categories.store');

// Editar Categoria
Route::get('/categories/{categorie}/edit', [CategoriesController::class, 'edit'])->name('Categories.edit');
// Actualizar Categoria
Route::put('/categories/{categorie}', [CategoriesController::class, 'update'])->name('Categories.update');

// Eliminiar categoria
Route::delete('/categories/{categorie}', [CategoriesController::class, 'destroy'])->name('Categories.destroy');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/* Ninja Course */
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

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

Route::get('/ninjas', [ NinjaController::class, 'index'])->name('ninjas.index');


Route::get('/ninjas/create', [NinjaController::class, 'create'])-> name('ninjas.create');

//Round parameters
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show']) -> name('ninja.show');

/*Post method, usamos los principios RACI haciendo que dentro
/ninja, asi que modificaremos la funcion de store dentro del controlador
ddel NinjaController
*/
Route::post('/ninjas',[NinjaController::class, 'store'])->name('ninjas.store'); //Nmae of the routes

//Delete Metho
Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');
/*

  new resource -> Dojo(s)
    - name, description, location

  each ninja belongs to a single dojo

  Ninja table
  ---------------------------------
  id | name | bio | skill | dojo_id
  ---------------------------------
  01 | jack | ... | 59    | 03
  02 | jill | ... | 85    | 01
  03 | sian | ... | 40    | 03
  04 | brad | ... | 70    | 02
  05 | lars | ... | 99    | 01
  06 | anne | ... | 55    | 01
  ---------------------------------

  Dojo table
  ----------------------------------
  id | name | description | location
  ----------------------------------
  01 | gold | ...         | uk
  02 | abc  | ...         | germany
  03 | hwah | ...         | india

*/
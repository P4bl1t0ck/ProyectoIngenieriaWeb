<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NinjaController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', [ NinjaController::class, 'index']);


Route::get('/ninjas/create', function (){
    return view('ninjas.create');
});

//Round parameters
Route::get('/ninjas/{id}', function($id){
    //Fetch record with id
    //Es una forma para hacer redirects dinamicos
    return view('ninjas.show', ["id"=>$id]);
});

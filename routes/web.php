<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NinjaController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', [ NinjaController::class, 'index']);


Route::get('/ninjas/create', [NinjaController::class, 'create']);

//Round parameters
Route::get('/ninjas/{id}', [NinjaController::class, 'show']);

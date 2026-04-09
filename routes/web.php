<?php
//This our route file
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Really Simple but yet works
Route::get('/ninjas', function(){
    return view('ninjas.index');
});

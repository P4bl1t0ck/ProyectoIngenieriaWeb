<?php
use Illuminate\Support\Facades\Route;


// Rutas públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/ninjas', function(){
    $ninjas = [
        ["name" => "mario","skill"=>75,"id" => "1"],
        ["name" => "luigi","skill" =>45, "id"=>"2"],
    ];

    return view('ninjas.index', ["greeting" => "hello","ninjas"=> $ninjas]);
});


//Round parameters
Route::get('/ninjas/{id}', function($id){
    //Fetch record with id
    //Es una forma para hacer redirects dinamicos
    return view('ninjas.show', ["id"=>$id]);
});

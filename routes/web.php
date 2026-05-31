<?php
use Illuminate\Support\Facades\Route;


// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', function(){
    //This is a hardcore for some values inside the web.php
    /*Its an example, its only an array of arrays that its gonna work
    as a 'dataset'*/
    $ninjas = [
        ["name" => "mario","skill"=>75,"id" => "1"],
        ["name" => "luigi","skill" =>45, "id"=>"2"],
        ["name" => "Wario","skill" =>89, "id"=>"3"],
        ["name" => "Waluigi","skill" =>490, "id"=>"4"],

    ];

    return view('ninjas.index', ["greeting" => "hello","ninjas"=> $ninjas]);
});


Route::get('/ninjas/create', function (){
    return view('ninjas.create');
});

//Round parameters
Route::get('/ninjas/{id}', function($id){
    //Fetch record with id
    //Es una forma para hacer redirects dinamicos
    return view('ninjas.show', ["id"=>$id]);
});

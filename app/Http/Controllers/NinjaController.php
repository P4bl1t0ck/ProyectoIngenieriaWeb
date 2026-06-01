<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    /*php artisan make:controller name_controller*/ 
    //
    /*This is are some functions controllers that are 
    desing for */ 
    public function index(){
        //route --> /ninjas/
        $ninjas = Ninja::orderBy('created_at', 'desc')->get();

        return view('ninjas.index', ["ninjas" => $ninjas]);
    }   
    public function show($id){
        //route --> /ninjas/{$id}
        $ninja = Ninja::findOrFail($id);
        return view('ninjas.show', ["ninja"=>$ninja]);
    }   
    public function create(){
        //rout --> /ninjas/create
        //render a create view (with web form) to users
        return view('ninjas.create');
    }   
}

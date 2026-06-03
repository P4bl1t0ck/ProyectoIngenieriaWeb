<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class CategoriesController extends Controller
{
    /*Now we do the same? i guess */
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

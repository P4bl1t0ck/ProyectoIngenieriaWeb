<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product

class ProductController extends Controller
{
    public function index(){
        //route --> /ninjas/
        /*Now i will try to make my own fucntions for index
        Fuck my view is kinda blury, and sometimes foggy
        I learned my fucking lesson, dont do again lonely nights*/
        $Product = ProductController::orderBy('created_at','desc')->get();
        return view('Products.index', ["Products"=>$Product]);
    }   
    public function show($id){
        //route --> /ninjas/{$id}
        //fetch a single record & pass into show view
        
    }   
    public function create(){
        //rout --> /ninjas/create
        //render a create view (with web form) to users
    }   
}

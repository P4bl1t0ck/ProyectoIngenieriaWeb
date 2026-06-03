<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /*I have also to endo thhe CRUD on here but today, */
    public function index(){
        //route --> /ninjas/
        /*Now i will try to make my own fucntions for index
        Fuck my view is kinda blury, and sometimes foggy
        I learned my fucking lesson, dont do again lonely nights*/
        //$Product = ProductController::orderBy('created_at','desc')->get();
        //  I get confused about how to conecte the Product ORM with the method
        $Product = Product::orderBy('created_at','desc') -> get();

        return view('Products.index', ["Products"=>$Product]);
        //The true conection
        //I hope it works
    }   
    public function show($id){
        //route --> /ninjas/{$id}
        //fetch a single record & pass into show view
        $Product = Product::findOrFail($id);
        /*I finally see it, im using OOP on the product-model=table, from here and i send it to the view */
        return view('Products.show', ['Product'=>$Product]);
    }   
    public function create(){
        //rout --> /ninjas/create
        //render a create view (with web form) to users
        /*Who said that it will work */
        $Products = \App\Models\Product::all();
        return view('Products.create', compact('Products'));
    }   
}

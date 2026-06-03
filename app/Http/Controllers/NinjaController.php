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
        $ninjas = Ninja::orderBy('created_at', 'desc')->paginate(10);
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
    //The rest of the CRUD functions for our controller class for ninjas, i noticed, that 
    //maybe we are going to se more of thse functios more forward on the course, but until that it will rest here
    public function store() {
      // --> /ninjas/ (POST)
      // hanlde POST request to store a new ninja record in table
    }

    public function destroy($id) {
      // --> /ninjas/{id} (DELETE)
      // handle delete request to delete a ninja record from table
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}

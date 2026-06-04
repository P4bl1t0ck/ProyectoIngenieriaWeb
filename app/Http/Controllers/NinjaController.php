<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use App\Models\Dojo;
use Illuminate\Http\Request;

class NinjaController extends Controller
{

    public function index(){
        //route --> /ninjas/
        //$ninjas = Ninja::orderBy('created_at', 'desc')->paginate(10);
        //Con with, nosotros hacemos un fetch a Dojo y la incluimos al momento de hacer el llamos dengtro del orderBy
        //Esto es llamado Eagleload, donde se hace ya la consulta de una vez desde el controlador
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

        return view('ninjas.index', ["ninjas" => $ninjas]);
    }   

    public function show(Ninja $ninja){
        //route --> /ninjas/{$id}
        //$ninja = Ninja::findOrFail($id);
        //$ninja = Ninja::with('dojo')-> findOrFail($id);
        $ninja->load('dojo');

        return view('ninjas.show', ["ninja"=>$ninja]);
    }   

    public function create(){
        //rout --> /ninjas/create
        //render a create view (with web form) to users
        $dojos = Dojo::all();
        return view('ninjas.create', compact('dojos'));
    }   


    //The rest of the CRUD functions for our controller class for ninjas, i noticed, that 
    //maybe we are going to se more of thse functios more forward on the course, but until that it will rest here
    public function store(Request $request) { //El request, es la variable conseguida de create.blade.p la
      // --> /ninjas/ (POST)
      // hanlde POST request to store a new ninja record in table
      $validated = $request->validate([
        //Validamos de request, si cumple con los criterios
        'name' => 'required|string|max:255',
        'skill' => 'required|integer|min:0|max:100',
        'bio' => 'required|string|min:20|max:1000',
        'dojo_id' => 'required|exists:dojos,id',
      ]);
        //Si todo esta bien, pasamos la viable validated, dentro de la clase de NInjas
        Ninja::create($validated);
        return redirect()->route('ninjas.index')->with('success', 'Ninja Created!');
    }

    public function destroy(Ninja $ninja) {
      // --> /ninjas/{id} (DELETE)
        //$ninja=Ninja::findOrFail($id); 
        $ninja->delete();
        return redirect()->route('ninjas.index')->with('success', 'Ninja Delted!');
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}

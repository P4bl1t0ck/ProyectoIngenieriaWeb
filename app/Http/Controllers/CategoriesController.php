<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Product;

class CategoriesController extends Controller
{
    /*Now we do the same? i guess */
    /*I have to complete the CRUD on this controller */
     public function index(){
        //route --> /ninjas/
        //$ninjas = Ninja::orderBy('created_at', 'desc')->get();
        $Categories = categories::orderBy('created_at', 'desc')->paginate(20);
        return view('Categories.index',["Categories"=>$Categories]);
    }   
    public function show(categories $categorie){
        //For something really cool
        //route --> /ninjas/{$id}
        //$ninja = Ninja::findOrFail($id);
        //$ninja = Ninja::findOrFail($id);
        //$Products->load('categories');  
        $categorie->load('products');
        return view('Categories.show', ["categories"=>$categorie]);
    }   
    public function create(){
        //rout --> /ninjas/create
        //render a create view (with web form) to users
        return view('Categories.create');
    }   

    /*Nuestras funcion que almacenera los products */
    public function store(Request $request) { //El request, es la variable conseguida de create.blade.p la
      // --> /ninjas/ (POST)
      // hanlde POST request to store a new ninja record in table
      $validado = $request->validate([
        //Validamos de request, si cumple con lo
        'nombre'=> 'required|string|max:255',
        'descripcion'=> 'required|string|min:20|max:1000',
      ]);
        //Si todo esta bien, pasamos la viable validated, dentro de la clase de NInjas
        categories::create($validado);
        return redirect()->route('Categories.index')->with('success', 'Categorie Created!');
    }

    //Upddate and edit functions
    public function edit(categories $categorie)
    {
        // Ruta --> /Categories/{id}/edit (GET)
        // Recibe la categoría que el usuario quiere editar mediante Route Model Binding
        
        return view('Categories.edit', compact('categorie'));
    }

    public function update(Request $request, categories $categorie)
    {
        // Ruta --> /Categories/{id} (PUT/PATCH)
        
        // 1. Validamos los datos modificados
        $validado = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|min:20|max:1000',
        ]);

        // 2. Actualizamos la categoría en la base de datos
        $categorie->update($validado);

        // 3. Redireccionamos a la lista con mensaje de éxito
        return redirect()->route('Categories.index')->with('success', 'Category Updated!');
    }

    public function destroy(categories $categorie)
    {
        // Ruta --> /Categories/{id} (DELETE)
        $categorie->delete();
        return redirect()->route('Categories.index')->with('success', 'Category Deleted!');
    }

    

}

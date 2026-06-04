<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /*These are the functions for Rutes and view guides, also as a REad method*/
    public function index(){
        //Ruta --> /Products/
        /*El index es como el todo el catolgoo de todos los profudctos dispobibles dentro
        es como un showAll en java */
        $Product = Product::with('categorie')->orderBy('created_at','desc') -> paginate(10);
        //De toda la clase de Productos, con respecto a categorie, ordenar segun creacion, descendiente y en paginacion de 10
        return view('Products.index', ["Products"=>$Product]);
        //Retornar la vista, productss.index, donde Products, tomara el valor de $Product
    }   
    public function show(Product $Product){
        //Ruta --> /Products/{id}
        //$Product = Product::with('categories')->findOrFail($id);
        $Product->load('categorie');
        //De productos, cargar las categorias
        return view('Products.show', ['Product'=>$Product]);
    }   
    public function create(){
        //rout --> /Products/create
        //render a create view (with web form) to users
        /*Who said that it will work */
        $categories = \App\Models\categories::all();
        //Geny correcion
        return view('Products.create', compact('categories'));
    }   

    //Funciones de Post y Delete
    //Algo que no hay que confundir ambos son metodos POST a nivel de respuesta desde arriba la vista.
    public function store(Request $request){
        // Request --> /Products/ (POST)
        $validated= $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string|min:20|max:1000',
        'precio' => 'required|integer|min:0|max:100',
        'stock' => 'required|integer|min:0|max:100',
        'categorie_id' => 'required|exists:categories,id'
        ]);

        Product::create($validated);
        return redirect()->route('Products.index')->with('success','Prodcuto Creado!');
    }

    public function edit (Product $Product){
        $categories = \App\Models\categories::all();
        return view('Products.edit',compact('Product','categories'));
    }
    public function update(Request $request, Product $product){
        $validando = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|min:20|max:1000',
            'precio' => 'required|integer|min:0|max:100',
            'stock' => 'required|integer|min:0|max:50',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        $product->update($validando);

        return redirect()->route('Products.index')->with('success','Product Alterado exitosamente!');
    }

    public function destroy(Product $Product){
        $Product -> delete();
        return redirect()->route('Products.index')->with('success','Se eliminio correctamente');
    }

    
}

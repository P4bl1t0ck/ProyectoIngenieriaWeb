<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\categories;
use App\Models\Product;
use App\Services\RecommendationService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* These are the functions for Rutes and view guides, also as a REad method */
    public function index(RecommendationService $recommendationService)
    {
        // Ruta --> /Products/
        /*El index es como el todo el catolgoo de todos los profudctos dispobibles dentro
        es como un showAll en java */
        $Product = Product::with('categorie')->orderBy('created_at', 'desc')->paginate(10);
        //Pagina 10 productos
        $cart = Cart::firstOrCreate(['estado' => 'abierto']);
        $cart->load('items.product.categorie');
        $recomendados = $recommendationService->recommend($cart);

        // De toda la clase de Productos, con respecto a categorie, ordenar segun creacion, descendiente y en paginacion de 10
        return view('Products.index', [
            'Products' => $Product,
            'cart' => $cart,
            'recomendados' => $recomendados,
        ]);
        // Retornar la vista, productss.index, donde Products, tomara el valor de $Product
    }

    public function show(Product $Product)
    {
        // Ruta --> /Products/{id}
        // $Product = Product::with('categories')->findOrFail($id);
        $Product->load('categorie');

        // De productos, cargar las categorias
        return view('Products.show', ['Product' => $Product]);
    }

    public function create()
    {
        // rout --> /Products/create
        // render a create view (with web form) to users
        /* Who said that it will work */
        $categories = categories::all();

        // Geny correcion
        return view('Products.create', compact('categories'));
    }

    // Funciones de Post y Delete
    // Algo que no hay que confundir ambos son metodos POST a nivel de respuesta desde arriba la vista.
    public function store(Request $request)
    {
        // Request --> /Products/ (POST)
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|min:20|max:1000',
            'precio' => 'required|integer|min:0|max:100',
            'stock' => 'required|integer|min:0|max:100',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('Products.index')->with('success', 'Prodcuto Creado!');
    }

    public function edit(Product $Product)
    {
        $categories = categories::all();

        return view('Products.edit', compact('Product', 'categories'));
    }

    public function update(Request $request, Product $Product)
    {
        $validando = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|min:20|max:1000',
            'precio' => 'required|integer|min:0|max:100',
            'stock' => 'required|integer|min:0|max:50',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        $Product->update($validando);

        return redirect()->route('Products.index')->with('success', 'Product Alterado exitosamente!');
    }

    public function addToCart(Product $Product)
    {
        $cart = Cart::firstOrCreate(['estado' => 'abierto']);

        $item = CartItem::firstOrCreate([
            'cart_id' => $cart->id,
            'product_id' => $Product->id,
        ], [
            'cantidad' => 0,
        ]);

        $item->update([
            'cantidad' => $item->cantidad + 1,
        ]);

        return redirect()->route('Products.index')->with('success', 'Producto agregado al carrito.');
    }

    public function clearCart()
    {
        $cart = Cart::where('estado', 'abierto')->first();

        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->route('Products.index')->with('success', 'Carrito vaciado.');
    }

    public function destroy(Product $Product)
    {
        $Product->delete();

        return redirect()->route('Products.index')->with('success', 'Se eliminio correctamente');
    }
}

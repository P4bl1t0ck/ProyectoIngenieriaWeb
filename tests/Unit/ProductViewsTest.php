<?php

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

uses(TestCase::class);

test('la vista de lista muestra productos carrito y recomendaciones', function () {
    $this->withoutVite();

    $categorie = new categories([
        'nombre' => 'Tecnologia',
        'descripcion' => 'Productos de tecnologia.',
    ]);
    $categorie->id = 1;

    $product = new Product([
        'nombre' => 'Teclado basico',
        'descripcion' => 'Un teclado sencillo para practicar Laravel y Blade.',
        'precio' => 25,
        'stock' => 10,
        'categorie_id' => $categorie->id,
    ]);
    $product->id = 1;
    $product->setRelation('categorie', $categorie);

    $cartItem = new CartItem([
        'product_id' => $product->id,
        'cantidad' => 1,
    ]);
    $cartItem->setRelation('product', $product);

    $cart = new Cart([
        'estado' => 'abierto',
    ]);
    $cart->id = 1;
    $cart->setRelation('items', collect([$cartItem]));

    $recomendado = new Product([
        'nombre' => 'Mouse basico',
        'descripcion' => 'Un mouse recomendado para probar el carrito.',
        'precio' => 12,
        'stock' => 7,
        'categorie_id' => $categorie->id,
    ]);
    $recomendado->id = 2;
    $recomendado->setRelation('categorie', $categorie);

    $products = new LengthAwarePaginator(collect([$product]), 1, 10, 1, [
        'path' => '/products',
    ]);

    $html = view('Products.index', [
        'Products' => $products,
        'cart' => $cart,
        'recomendados' => collect([$recomendado]),
    ])->render();

    expect($html)
        ->toContain('Lista de productos')
        ->toContain('Teclado basico')
        ->toContain('Ver producto')
        ->toContain('Agregar al carrito')
        ->toContain('Carrito de prueba')
        ->toContain('Recomendaciones según el carrito')
        ->toContain('Mouse basico');
});

test('la vista de detalle muestra la informacion del producto', function () {
    $this->withoutVite();

    $categorie = new categories([
        'nombre' => 'Hogar',
        'descripcion' => 'Productos para el hogar.',
    ]);
    $categorie->id = 1;

    $product = new Product([
        'nombre' => 'Silla simple',
        'descripcion' => 'Una silla sencilla para probar la vista de detalle.',
        'precio' => 40,
        'stock' => 5,
        'categorie_id' => $categorie->id,
    ]);
    $product->id = 1;
    $product->setRelation('categorie', $categorie);

    $html = view('Products.show', [
        'Product' => $product,
    ])->render();

    expect($html)
        ->toContain('Silla simple')
        ->toContain('Una silla sencilla')
        ->toContain('Precio')
        ->toContain('Stock');
});

test('las vistas de crear y editar muestran formularios simples', function () {
    $this->withoutVite();
    $this->withViewErrors([]);

    $categorie = new categories([
        'nombre' => 'Oficina',
        'descripcion' => 'Productos para oficina.',
    ]);
    $categorie->id = 1;

    $product = new Product([
        'nombre' => 'Cuaderno',
        'descripcion' => 'Un cuaderno sencillo para probar el formulario.',
        'precio' => 5,
        'stock' => 20,
        'categorie_id' => $categorie->id,
    ]);
    $product->id = 1;

    $createHtml = view('Products.create', [
        'categories' => collect([$categorie]),
    ])->render();

    $editHtml = view('Products.edit', [
        'Product' => $product,
        'categories' => collect([$categorie]),
    ])->render();

    expect($createHtml)
        ->toContain('Crear producto')
        ->toContain('Guardar');

    expect($editHtml)
        ->toContain('Editar producto')
        ->toContain('Actualizar');
});

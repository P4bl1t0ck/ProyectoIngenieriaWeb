<x-layout_p>
    <section>
        <div>
            <h2>Lista de productos</h2>
            <p>Estos son los productos disponibles en la tienda.</p>
        </div>

        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif

        @if ($Products->count())
            <div>
                @foreach ($Products as $Product)
                    <article>
                        <h3>{{ $Product->nombre }}</h3>

                        <p>
                            {{ $Product->descripcion }}
                        </p>

                        <p>
                            <strong>Precio:</strong> ${{ number_format($Product->precio, 2) }}
                        </p>

                        <p>
                            <strong>Stock:</strong> {{ $Product->stock }}
                        </p>

                        @if ($Product->categorie)
                            <p>
                                <strong>Categoría:</strong> {{ $Product->categorie->nombre }}
                            </p>
                        @endif

                        <div>
                            <a href="{{ route('Products.show', $Product) }}">
                                Ver producto
                            </a>

                            <a href="{{ route('Products.edit', $Product) }}">
                                Editar
                            </a>

                            <form method="POST" action="{{ route('Products.cart.add', $Product) }}">
                                @csrf

                                <button type="submit">
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>

            <div>
                {{ $Products->links() }}
            </div>
        @else
            <p>Todavía no hay productos registrados.</p>
        @endif

        <hr>

        <section>
            <h2>Carrito de prueba</h2>
            <p>Este carrito ayuda a probar el recomendador del proyecto.</p>

            @if ($cart->items->count())
                <ul>
                    @foreach ($cart->items as $item)
                        <li>
                            {{ $item->product->nombre }}
                            -
                            Cantidad: {{ $item->cantidad }}
                            -
                            Categoría: {{ $item->product->categorie->nombre }}
                        </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf

                    <button type="submit">
                        Vaciar carrito
                    </button>
                </form>
            @else
                <p>El carrito está vacío. Agrega un producto para ver recomendaciones.</p>
            @endif
        </section>

        <section>
            <h2>Recomendaciones según el carrito</h2>

            @if ($recomendados->count())
                <p>
                    El algoritmo revisa la categoría que más se repite en el carrito y recomienda productos parecidos.
                </p>

                <ul>
                    @foreach ($recomendados as $recomendado)
                        <li>
                            {{ $recomendado->nombre }}
                            -
                            ${{ number_format($recomendado->precio, 2) }}
                            -
                            {{ $recomendado->categorie->nombre }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>
                    Todavía no hay recomendaciones. Agrega productos al carrito para que el algoritmo tenga datos.
                </p>
            @endif
        </section>
    </section>
</x-layout_p>

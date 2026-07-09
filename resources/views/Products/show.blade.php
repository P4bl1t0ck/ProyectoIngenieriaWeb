<x-layout_p>
    <section>
        <a href="{{ route('Products.index') }}">
            Volver a productos
        </a>

        <div>
            <h2>{{ $Product->nombre }}</h2>

            <p>{{ $Product->descripcion }}</p>

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
                <a href="{{ route('Products.edit', $Product) }}">
                    Editar
                </a>
            </div>
        </div>
    </section>
</x-layout_p>

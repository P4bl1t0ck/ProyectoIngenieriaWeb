<x-layout_p>
    <section>
        <h2>Editar producto</h2>

        <form method="POST" action="{{ route('Products.update', $Product) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $Product->nombre) }}">
                @error('nombre')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $Product->descripcion) }}</textarea>
                @error('descripcion')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio">Precio</label>
                <input id="precio" name="precio" type="number" min="0" value="{{ old('precio', $Product->precio) }}">
                @error('precio')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock">Stock</label>
                <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', $Product->stock) }}">
                @error('stock')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="categorie_id">Categoría</label>
                <select id="categorie_id" name="categorie_id">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" @selected(old('categorie_id', $Product->categorie_id) == $categorie->id)>
                            {{ $categorie->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit">
                    Actualizar
                </button>

                <a href="{{ route('Products.show', $Product) }}">
                    Cancelar
                </a>
            </div>
        </form>
    </section>
</x-layout_p>

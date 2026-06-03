<x-layout_p>
    <strong>CREATE DE PRODUCTOS</strong>

    <div>Estos son todos los productos actuales</div>
    <ul>
        @foreach ($Products as $Products)
            <li>
                <x-card href="/products/{{ $Products -> id }}" :highligth="$Products['name']">
                    <h3>{{$Products -> name}}</h3>
                    <h3>{{$Products -> descripcion}}</h3>
                    <h3>{{$Products -> percio}}</h3>
                    <h3>{{$Products -> stock}}</h3>
                    <!--Un query un poco simplon, pero podemos mejor realizar el query natural, y
                    mas dinamico desde dentro de el controlador de product -->
                    <p>{{ $Products -> categorie -> name }}</p>
                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout_p>


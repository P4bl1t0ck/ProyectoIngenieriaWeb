<x-layout> 
    <!--This is crazy, you can actually delete a lot of code, and call
    an view from the component folder, and we can used a custom component
    of any type we wanted. -->
            
    <strong>Los actuales Categorias</strong>
    <ul>
        <!--This a blade directory, that permit us to make a dinamic 
        views, or render al ninja routh paths-->
        @foreach($Categories as $Categories)
            <li>
                <x-card href="/categories/{{ $Categories -> id }}" :highligth="$Categories['nombre']">
                     <div>
                        <h3>{{$Categories -> name}}</h3>
                        <!--This is how we get access to the ninja then dojo and name, by the relationship
                        cool, but not dinamic, but when you want to work  with alot of dojos and nijas
                    instead, in -->
                       
                        <!--Esta es la relacion para mostrar datos de item a nombre -->
                    </div>

                </x-card>
            </li>
        @endforeach     
    </ul>
    {{ $Categories->links()}}

</x-layout>

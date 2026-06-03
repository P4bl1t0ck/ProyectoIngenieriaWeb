<x-layout> 
    <!--This is crazy, you can actually delete a lot of code, and call
    an view from the component folder, and we can used a custom component
    of any type we wanted. -->
    
    <strong>Currently Available Ninjas</strong>
    <ul>
        <!--This a blade directory, that permit us to make a dinamic 
        views, or render al ninja routh paths-->
        @foreach($ninjas as $ninja)
            <li>
                <x-card href="/ninjas/{{ $ninja -> id }}" :highligth="$ninja['skill'] > 70">
                     <div>
                        <h3>{{$ninja -> name}}</h3>
                        <!--This is how we get access to the ninja then dojo and name, by the relationship
                        cool, but not dinamic, but when you want to work  with alot of dojos and nijas
                    instead, in -->
                        <p>{{$ninja->dojo->name}}</p>
                    </div>

                </x-card>
            </li>
        @endforeach
    </ul>
    {{ $ninjas->links()}}

</x-layout>

<x-layout> 
    <!--This is crazy, you can actually delete a lot of code, and call
    an view from the component folder, and we can used a custom component
    of any type we wanted. -->
    <h2>Currently Available Ninjas</h2>
    <ul>
        <!--This a blade directory, that permit us to make a dinamic 
        views, or render al ninja routh paths-->
        @foreach($ninjas as $ninja)
            <li>
                <x-card href="/ninjas/{{ $ninja -> id }}" :highligth="$ninja['skill'] > 70">
                     <h3>{{$ninja -> name}}</h3>
                </x-card>
            </li>
        @endforeach

    </ul>
</x-layout>

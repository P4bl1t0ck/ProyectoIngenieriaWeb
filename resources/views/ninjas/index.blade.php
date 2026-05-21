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
                <p>
                    {{ $ninja['name'] }}
                    <a href="/ninjas/{{ $ninja['id'] }}">View Details</a>
                </p>
            </li>
        @endforeach
    </ul>
</x-layout>

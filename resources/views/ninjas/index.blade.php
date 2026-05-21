<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network | Home |</title>
</head>
<body>
    <h2>Currentl Available Ninjas</h2>

    @if ($gretting == "hello")
        <p>Hi asshole</p>
    @endif
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
</body>
</html>
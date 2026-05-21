<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network | Home |</title>
</head>
<body>
    <h2>Currentl Available Ninjas</h2>

    <p>{{ $greeting }}</p>
    <ul>
        <li>
            <!--This should have to be the dinamic raw path for ninjas.-->
            <a href="/ninjas/{{$ninjas[0]["id"] }}">
                <!--This is a way of how to make that the route calls the id from the web.php-->
                {{ $ninjas[0]["name"] }}
            </a>
        </li>
        <li>
            <a href="/ninjas/{{$ninjas[1]["id"] }}">
                {{ $ninjas[1]["name"] }}
            </a>
        </li>
    </ul>
</body>
</html>
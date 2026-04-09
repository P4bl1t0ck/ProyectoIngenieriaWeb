<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nija Network | Home</title>
</head>
<body>
    <h2>Currentl Available Ninjas</h2>
    <p>{{$Greeting}}</p>
    <ul>
        <li>
            <a href = "">
                {{ $ninjas[0]["name"] }}
            </a>
        </li>
        <li>
            <a href = "">
                {{ $ninjas[1]["name"] }}
            </a>
        </li>
        <li>
            <a href = "">
                {{ $ninjas[2]["name"] }}
            </a>
        </li>

    </ul>
</body>
</html>
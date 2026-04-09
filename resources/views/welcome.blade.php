<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas del Hogar</title>
</head>
<body>
    <h1>Gestor de Tareas del Hogar</h1>
    <p>Organiza y controla todas tus tareas del hogar de forma simple y eficiente</p>

    <div>
        <a href="{{ route('login') }}">Iniciar Sesión</a>
        <a href="{{ route('register') }}">Crear Cuenta</a>
    </div>

    <div>
        <div>
            <h3> Crear Tareas</h3>
            <p>Define todas tus tareas del hogar</p>
        </div>
        <div>
            <h3> Gestionar</h3>
            <p>Edita, completa o elimina fácilmente</p>
        </div>
        <div>
            <h3> Privado</h3>
            <p>Solo tú ves tus tareas</p>
        </div>
        <div>
            <h3> Rápido</h3>
            <p>Interfaz simple y eficiente</p>
        </div>
    </div>
</body>
</html>

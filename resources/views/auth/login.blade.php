<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    @if ($errors->any())
        <div>
            <strong>Error:</strong> Las credenciales no son válidas.
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div>
            <label for="email">Correo Electrónico</label><br>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="password">Contraseña</label><br>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
            >
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <p>
        ¿No tienes cuenta?
        <a href="{{ route('register') }}">Regístrate</a>
    </p>

</body>
</html>
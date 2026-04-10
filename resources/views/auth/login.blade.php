<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    @if ($errors->any())
        <p style="color: red;">Las credenciales no son válidas</p>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <p><a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a></p>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
</head>
<body>
    <h1>Crear Cuenta</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmar Contraseña:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Crear Cuenta</button>
    </form>

    <p><a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a></p>
</body>
</html>
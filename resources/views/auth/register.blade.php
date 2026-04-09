<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

    <h1>Registro</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre Completo</label><br>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

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

        <div>
            <label for="password_confirmation">Confirmar Contraseña</label><br>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                required
            >
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Crear Cuenta</button>
    </form>

    <p>
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}">Inicia sesión</a>
    </p>

</body>
</html>
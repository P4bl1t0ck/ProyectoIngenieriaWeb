<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Recomendations</title>
    @vite('resources/css/app.css')
    <!--Esta es la forma en como se carga los recursos o paquetes de app.css-->
</head>
<body>
    <header>
        <nav>
            <h1>Todos nuestros productos</h1>
            <a href="/products">All Products</a><br>
            <a href="/products/create"> Crear un nuevo Producto</a><br>
            <!--Product Controller::class, 'create'-->
        </nav>
    </header>
    <main class="container">        
        {{$slot}}    
    </main>

</body>
</html>


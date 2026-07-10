<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
    </head>
    <body>
        <h1>Menu Welcome</h1>

        <h2>Productos</h2>
        <ul>
            <li><a href="/products">GET /products - Lista de productos</a></li>
            <li><a href="/products/create">GET /products/create - Crear producto</a></li>
            <li><a href="/products/1">GET /products/1 - Ver producto 1</a></li>
            <li><a href="/products/1/edit">GET /products/1/edit - Editar producto 1</a></li>
            <li><a href="/products">POST /products - Guardar producto</a></li>
            <li><a href="/products/1">PUT /products/1 - Actualizar producto 1</a></li>
            <li><a href="/products/1/cart">POST /products/1/cart - Agregar producto 1 al carrito</a></li>
            <li><a href="/cart/clear">POST /cart/clear - Vaciar carrito</a></li>
        </ul>

        <h2>APIs</h2>
        <ul>
            <li><a href="/api/user">GET /api/user - Usuario autenticado</a></li>
            <li><a href="/api/products">GET /api/products - Productos</a></li>
            <li><a href="/api/products/1">GET /api/products/1 - Producto 1</a></li>
            <li><a href="/api/categories">GET /api/categories - Categorias</a></li>
        </ul>

        <!-- <h2>Otros</h2>
        <ul>
            <li><a href="/test-recommendation">GET /test-recommendation - Recomendacion de prueba</a></li>
            <li><a href="/core">GET /core - Core recomendaciones</a></li>
            <li><a href="/categories">GET /categories - Lista de categorias</a></li>
            <li><a href="/categories/create">GET /categories/create - Crear categoria</a></li>
            <li><a href="/categories/1">GET /categories/1 - Ver categoria 1</a></li>
            <li><a href="/categories/1/edit">GET /categories/1/edit - Editar categoria 1</a></li>
        </ul>-->
       

        <h2>Cuenta</h2>
        <ul>
            <li><a href="/login">GET /login - Login</a></li>
            <li><a href="/register">GET /register - Registro</a></li>
            <li><a href="/dashboard">GET /dashboard - Dashboard</a></li>
        </ul>
    </body>
</html>

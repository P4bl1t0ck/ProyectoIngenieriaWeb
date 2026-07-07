<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OptiPan - Portal de Productos</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">OptiPan E-Commerce</h1>
        <div class="space-x-4">
            <a href="/core" class="text-blue-600 hover:underline">Ver Recomendaciones (Core)</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Nuestro Catálogo</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{{ asset('images/products/producto1.jpg') }}" alt="Producto" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="font-bold text-lg mt-2 text-gray-800">Producto de Prueba</h3>
                <p class="text-gray-600 text-sm">Categoría: Figuras</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-blue-600 font-bold">$25.00</span>
                    <div class="space-x-2">
                        <button class="text-red-500 hover:text-red-700">❤️</button>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">+ Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
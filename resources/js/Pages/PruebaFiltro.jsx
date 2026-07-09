import React, { useState } from 'react';

// Ahora la función recibe "products" en lugar de "mensaje"
export default function PruebaFiltro({ products }) {
    // Creamos un estado para guardar lo que el usuario escribe en el buscador
    const [busqueda, setBusqueda] = useState('');

    // Aplicamos el filtro en JavaScript (Igual que con los Ricks)
    const productosFiltrados = products.filter(producto => 
        producto.name.toLowerCase().includes(busqueda.toLowerCase())
    );

    return (
        <div className="p-8 bg-gray-100 min-h-screen">
            <div className="max-w-4xl mx-auto">
                <h1 className="text-3xl font-bold text-gray-800 text-center mb-6">
                    Buscador Dinámico de Productos
                </h1>

                {/* Input del Buscador */}
                <div className="mb-6">
                    <input 
                        type="text"
                        placeholder="Buscar producto por nombre..."
                        className="w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value={busqueda}
                        onChange={(e) => setBusqueda(e.target.value)}
                    />
                </div>

                {/* Grid de Productos */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {productosFiltrados.length > 0 ? (
                        productosFiltrados.map(producto => (
                            <div key={producto.id} className="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                                <div>
                                    <h3 className="font-bold text-lg text-gray-800">{producto.name}</h3>
                                    <p className="text-sm text-gray-500">
                                        Categoría: {producto.categorie?.name || 'Sin categoría'}
                                    </p>
                                </div>
                                <span className="text-blue-600 font-bold mt-4">${producto.price}</span>
                            </div>
                        ))
                    ) : (
                        <p className="text-gray-500 col-span-3 text-center py-4">
                            No se encontraron productos que coincidan.
                        </p>
                    )}
                </div>
            </div>
        </div>
    );
}
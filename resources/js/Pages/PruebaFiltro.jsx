import { useEffect, useState } from "react";

export default function PruebaFiltro() {

    const [productos, setProductos] = useState([]);
    const [buscar, setBuscar] = useState("");

    useEffect(() => {

        fetch("/api/products")
            .then(res => res.json())
            .then(data => setProductos(data));

    }, []);

    const productosFiltrados = productos.filter(producto =>
        producto.nombre.toLowerCase().includes(buscar.toLowerCase())
    );

    return (
        <div style={{ padding: "20px" }}>

            <h2>Filtro de Productos</h2>

            <input
                type="text"
                placeholder="Buscar producto..."
                value={buscar}
                onChange={(e) => setBuscar(e.target.value)}
            />

            <hr />

            {
                productosFiltrados.map(producto => (

                    <div key={producto.id}>
                        <h4>{producto.nombre}</h4>
                        <p>${producto.precio}</p>
                    </div>

                ))
            }

        </div>
    );
}
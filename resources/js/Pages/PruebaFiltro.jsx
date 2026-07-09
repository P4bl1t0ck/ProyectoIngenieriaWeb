import { useState } from "react";

export default function PruebaFiltro() {
    const [numero, setNumero] = useState("");
    const [producto, setProducto] = useState(null);
    const [mensaje, setMensaje] = useState("");

    function buscarProducto(evento) {
        evento.preventDefault();

        setProducto(null);
        setMensaje("Buscando producto...");

        fetch(`/api/products/${numero}`)
            .then((respuesta) => {
                if (!respuesta.ok) {
                    throw new Error("No se encontro el producto.");
                }

                return respuesta.json();
            })
            .then((data) => {
                setProducto(data);
                setMensaje("");
            })
            .catch(() => {
                setMensaje("No se encontro un producto con ese numero.");
            });
    }

    return (
        <div>
            <h2>Buscar producto por numero</h2>

            <form onSubmit={buscarProducto}>
                <label htmlFor="numero">Numero del producto</label>
                <input
                    id="numero"
                    type="number"
                    value={numero}
                    onChange={(evento) => setNumero(evento.target.value)}
                    placeholder="Ejemplo: 1"
                />

                <button type="submit">
                    Buscar en la API
                </button>
            </form>

            {mensaje && (
                <p>{mensaje}</p>
            )}

            {producto && (
                <div>
                    <h3>{producto.nombre}</h3>
                    <p>{producto.descripcion}</p>
                    <p>Precio: ${producto.precio}</p>
                    <p>Stock: {producto.stock}</p>

                    {producto.categorie && (
                        <p>Categoria: {producto.categorie.nombre}</p>
                    )}
                </div>
            )}
        </div>
    );
}

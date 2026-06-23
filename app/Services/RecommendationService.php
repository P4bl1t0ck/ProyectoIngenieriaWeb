<?php

//Segun lo que recuerdo una forma de como llamar o conectar las clases
//de packages de Models entre eel recomendador y sus Tablas.
namespace App\Services;

//Our Models
use App\Models\Cart;
use App\Models\Product;

/*
use App\Models\CartItem;
use App\Models\Product;
use App\Models\categories;
*/
//Aunque deberiamos trabjar mas con sus controladdores


/*Un core informatico: Es la logica principal que convierte 
Las entradas despues de procesarlas en salidas
como una fucncion matematica esta busca ser la f(x) = y 
x, son datos reales, f nuestro proceso y la salida.*/

/*Para que el sistema sea inteligente osea cumplamos con f
primero debemos de hacer que pase, ocmo nuestro sistema se 
basa del patron de diseño de MVC Model-Vista-Controlador, 
crearemos un componente mas, que sera nuestra funcion. 
el flujo original dentro de MVC es que el usuaroio interactura
con el controlador cualquiera, este se comunicara con el modelo
basandose de el para pasar tomarlos, pasarlos a la vista y despues reponder
finalmente a  la vista.*/

//Controller -> Model -> View

// f, estara despues de Controller, cuando nuestro usuario interactue con el controlador, que funciona en este caso
//como la entrada de nuestro sistema, osea x, f sera nuestro recomendador el modelo le dara forma, y la vista lo mostrara
//Controller -> (f ) -> Model -> View
//En matematicas podria funcionar como un transformador, o una operacion de inersa en matrices o tensores
//Pero en este sera nuestra funcion que segun basado de x, f, procesara los datos y y los expulsara por la vista.

/*foreach($cart->items as $item)
{
    ...
} 
 = 
$item1 = $cart->items[0];
$item2 = $cart->items[1];
$item3 = $cart->items[2];

*/
/*
Chat me ayudo con la sustenciaon teorica
 Controller
      ↓
Service (Core)
      ↓
Models
      ↓
Database
      ↓
Service
      ↓
Controller
      ↓
View 
 */
class RecommendationService
{
    public function recommend(Cart $cart)
    {
        $contador = [];

        foreach ($cart->items as $item)
        {
            $categoria = $item->product->categorie;
            //Relacion o un fetch
            //dd($categoria);

            $idCategoria = $categoria->id;
            //dd($idCategoria);
            if((isset($contador[$idCategoria])))
            {
                $contador[$idCategoria]++;
            }
            else
            {
                $contador[$idCategoria] = 1;
            }
        }
        //Contador
        //dd($contador);
        
        arsort($contador);
        $categoriaRecomendada = array_key_first($contador);
        //dd($categoriaRecomendada);
        $productosEnCarrito =
            $cart->items->pluck('product_id');
        //dd($productosEnCarrito);
        $recomendados =
            Product::where('categorie_id',$categoriaRecomendada)->whereNotIn('id',$productosEnCarrito)->take(5)->get();

        //dd($recomendados);
        return $recomendados;
    }
    
    public function index(){
        $valor = Cart::find(10);
        $servicio = new RecommendationService();
        $recomendados  = $servicio -> recommend($valor);

        return view('Recomendation.index',compact('recomendados'));
    }
}

/*
    1. Obtener un carrito.
    2. Recorrer todos sus productos.
    3. Obtener la categoría de cada producto.
    4. Contar cuántas veces aparece cada categoría.
    5. Encontrar la categoría más frecuente.
    6. Buscar productos de esa categoría.
    7. Excluir los productos ya presentes en el carrito.
    8. Mostrar los productos restantes como recomendaciones.
    */
<x-layout>
    <!--<h2> Ninja id - $id</h2>-->
    <!--Hay un error durante la consulta de la parte de la funcion de show
    por el id, por lo que ya no  tenemos el id hardcodeado, la plantilla ya no
    accede dentro de los valores, por lo que le pasamos la clase dentro de el 
    controlador de rutas en weh.php, debemos de llamar al objeto que hace este referencia -->

    <h2 class="titulo">{{$ninja -> name }}</h2>

    <!--Ahora dentro de la vista de show, vamos a copiar una un plantilla
    de una vista, donde nos permitira el visua<lizar los datos de Ninja -->

    <div class="bo-gray-200-p-4-rouded">
    <p>
        <strong>Skill Level</strong> 
       {{  $ninja->skill }}</p>    
    </div>   
    <p><strong>About me:</strong></p>
    <p>{{ $ninja->bio }}</p>

    <!--La forma de <p><strong> en el html semantico, es como 
        un tipo de texto, subtitulo y descripcion en la vista.-->
</x-layout>
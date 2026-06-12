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
        {{-- Dojo  info, si otra forma de comentar mas facil en php FUCK YES --}}
    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
    <h3>Dojo Information</h3>
    <p><strong>Dojo name:</strong> {{ $ninja->dojo->name }}</p>
    <p><strong>Location:</strong> {{ $ninja->dojo->location }}</p>
    <p><strong>About the Dojo:</strong></p>
    <p>{{ $ninja->dojo->description }}</p>
  </div>

  <form action="{{route('ninjas.destroy',$ninja->id)  }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn my-4">
        Delete Ninja
    </button>
  </form>

</x-layout>
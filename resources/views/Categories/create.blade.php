<x-layout_p>
    <form action="{{ route('Categories.store') }}" method="POST">
      <!--Action, al ser un formulario, este toma los datos obtenidos
        y es pasado dentro de la funcion de ninjas.store. como un metodod POST, -->
    <!-- CSRF token for security -->
    @csrf
    <!--Its a way how to protect, the JWT and key 
    or credentials inside the project, for not affecting
    how the form can be damaged or being damaged, usgin some
    Fuse, JWT.crack, SQL Injection or pathinjection. OR elevated permisions-->

    <h2>Crear nueva categoria</h2>

    <!-- ninja Name -->
    <label for="nombre">Categoria Nombre:</label>
    <input 
      type="text" 
      id="nombre" 
      name="nombre" 
      value="{{ old('nombre') }}"
      required
    >

    <!-- ninja Bio -->
    <label for="descripcion">Descripcion:</label>
    <textarea
      rows="5"
      id="descripcion" 
      name="descripcion" 
      required
    >{{old('descripcion')}}</textarea>

    <button type="submit" class="btn mt-4">Creaar Categoria</button>

    <!-- validation errors -->
    @if($errors->any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach($errors->all() as $error )
          <li class="my-2 tedxt-red-500">{{$error}}</li>
        @endforeach
      </ul>
    @endif
    
  </form>
    
</x-layout_p>

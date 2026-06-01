<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>
    @vite('resources/css/app.css')
    <!--Esta es la forma en como se carga los recursos o paquetes de app.css-->
</head>
<!--This is a kinda of template that can help us to make some agile code for our aplications
this layout works like this vista (x) and on the other side os  vista(index.blade.pp) de esta
manera evitamo la repeticion de codigo innesacrio, dentro delas rutas y carpetas dentro
del proyecto, y podemos crear distintas vistas segun lo que nesecitemos.-->
<body>
    <header>
        <nav>
            <!--THIs is just a hook up to the routes made for Ninjas practice, we can Change ´em
            for anotther type of routes, but just in case i will check the video first, before damaged stm-->
            <h1>Ninja Network</h1>
            <a href="/ninjas">All Ninjas</a>
            <a href="/ninjas/create">Create New Ninja</a>
        </nav>
    </header>
    <main class="container">        
        {{$slot}}    
    </main>

</body>
</html>


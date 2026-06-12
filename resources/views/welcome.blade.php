<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>
    @vite('resources/css/app.css')
      
</head>
<body>
    <h1>Welcome TO ninja.com</h1>
    <p>Click the button below to view the list of ninjas and Products.</p>
    
        
    <!--<a href="/ninjas" class="btn">
        Find All Ninjas!
    </a>-->
    <a href="/Categories"></a>
    <a href="/products" class="btn">
        Nuestros productos
    </a>
    
</body>
</html>
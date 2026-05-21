@props(['highligth' => false])

<div @class(['highligth' => $highligth,'card'])>  
    {{ $slot }}
    <!--Aqui conectamos a los atributos que pasamos de el index a la atrejta-->
    <a href="{{ $attributes->get('href') }}" class="btn">
        View Details
    </a>
</div>   
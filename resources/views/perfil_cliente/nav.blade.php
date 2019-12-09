@php
    function activar($url){
        return request()->is($url) ? 'active' : '';
    }
@endphp
<ul class="nav">
    <li class="nav-item {{ activar('cliente-home') }}">
        <a href="/cliente-home">
            <i class="fa fa-home"></i>
            <p>Inicio</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    <li class="nav-item {{ activar('reservar-hora*') }}">
        <a href="{{ route('reservar-hora.index') }}">
            <i class="far fa-calendar-check"></i>
            <p>Solitud de hora</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    <li class="nav-item {{ activar('cliente-historial') }}">
        <a href="{{ route('cliente.historial') }}">
            <i class="fas fa-calendar"></i>
            <p>Historial</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    
    <li class="nav-item bg-warning ">
        <a href="{{ route('homePerfil') }}">
            <i class="fas fa-cog text-white"></i>
            <p class="text-white">Configuración</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>    
    </li>
    <li class="nav-item bg-danger ">
        <a href="{{ route('salirCliente') }}">
            <i class="fas fa-sign-out-alt text-white"></i>
            <p class="text-white">Salir</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
  
   
</ul>
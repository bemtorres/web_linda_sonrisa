<ul class="nav">
    <li class="nav-item active">
        <a href="/cliente-home">
            <i class="fa fa-home"></i>
            <p>Inicio</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    <li class="nav-item ">
        <a href="{{ route('reservar-hora.index') }}">
            <i class="far fa-calendar-check"></i>
            <p>Solitud de hora</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('cliente.historial') }}">
            <i class="fas fa-calendar"></i>
            <p>Historial</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    
    <li class="nav-item bg-warning ">
        <a href="{{ route('cliente.historial') }}">
            <i class="fas fa-cog text-white"></i>
            <p class="text-white">Configuración</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>    
    </li>
    <li class="nav-item bg-danger ">
        <a href="{{ route('cliente.historial') }}">
            <i class="fas fa-sign-out-alt text-white"></i>
            <p class="text-white">Salir</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
  
   
</ul>
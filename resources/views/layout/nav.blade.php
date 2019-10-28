@php
    function activar($url){
        return request()->is($url) ? 'active' : '';
    }
    function show($url){
        return request()->is($url) ? 'show' : '';
    }
@endphp
<ul class="nav">
    <li class="nav-item {{ activar('home') }}">
        <a href="/home">
            <i class="fas fa-home"></i>
            <p>home</p>
            {{-- <span class="badge badge-count">5</span> --}}
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Sistema</h4>
    </li>
    <li class="nav-item  {{ activar('cliente*') }}">
        <a data-toggle="collapse" href="#base1"  >
            <i class="fas fa-user"></i>
            <p>Cliente</p>
            <span class="caret"></span>
        </a>
        <div class="collapse {{ show('cliente*') }}" id="base1">
            <ul class="nav nav-collapse">								
                <li class=" {{ activar('cliente*') }}">
                    <a href="{{ route('cliente.index') }}">
                        <span class="sub-item">Clientes</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="">
                        <span class="sub-item">Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="sub-item">Historial</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </li>
    <li class="nav-item {{ activar('odontologo*') }}{{ activar('empleado*') }}{{ activar('proveedor*') }}{{ activar('administrador*') }}">
        <a data-toggle="collapse" href="#base">
            <i class="fas fa-users"></i>
            <p>Usuarios</p>
            <span class="caret"></span>
        </a>
        <div class="collapse {{ show('odontologo*') }}{{ show('empleado*') }}{{ show('proveedor*') }}{{ show('administrador*') }}" id="base">
            <ul class="nav nav-collapse">								
                <li class="{{ activar('odontologo*')}}">
                    <a href="{{ route('odontologo.index') }}">
                        <span class="sub-item">Odontólogos</span>
                    </a>
                </li>
                <li class="{{ activar('empleado*')}}">
                    <a href="{{ route('empleado.index') }}">
                        <span class="sub-item">Empleados</span>
                    </a>
                </li>
              
                <li class="{{ activar('proveedor*')}}">
                    <a href="{{ route('proveedor.index') }}">
                        <span class="sub-item">Proveedores</span>
                    </a>
                </li>
                <li class="{{ activar('administrador*')}}">
                    <a href="{{ route('administrador.index') }}">
                        <span class="sub-item">Administradores</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
            <a data-toggle="collapse" href="#soli">
                <i class="fa fa-file"></i>
                <p>Solicitudes</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="soli">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="{{ route('ordenempleado.index')}}">
                            <span class="sub-item">Solicitudes</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="sub-item">Recepción de Productos</span>
                        </a>
                    </li>                  
                </ul>
            </div>
        </li>
    <li class="nav-item {{ activar('servicio*') }}{{ activar('producto*') }}{{ activar('tipoproducto*') }}{{ activar('familia*') }}">
        <a data-toggle="collapse" href="#charts1">
            <i class="fa fa-barcode"></i>
            <p>Servicios</p>
            <span class="caret"></span>
        </a>
        <div class="collapse {{ show('servicio*') }}{{ show('producto*') }}{{ show('tipoproducto*') }}{{ show('familia*') }}" id="charts1">
            <ul class="nav nav-collapse">
                <li class=" {{ activar('servicio*') }}">
                    <a href="{{ route('servicio.index') }}">
                        <span class="sub-item">Servicios</span>
                    </a>
                </li>
                <li class=" {{ activar('producto*') }}">
                    <a href="{{ route('producto.index') }}">
                        <span class="sub-item">Productos</span>
                    </a>
                </li>
                <li class=" {{ activar('tipoproducto*') }}">
                    <a href="{{ route('tipoproducto.index') }}">
                        <span class="sub-item">Tipos de productos</span>
                    </a>
                </li>
                <li  class=" {{ activar('familia*') }}">
                    <a href="{{ route('familia.index') }}">
                        <span class="sub-item">Familias de productos</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a data-toggle="collapse" href="#charts">
            <i class="far fa-chart-bar"></i>
            <p>Estadísticas</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
                <li>
                    <a href="">
                        <span class="sub-item">Boleta de servicios</span>
                    </a>
                </li>
                <li>
                    <a href="charts/sparkline.html">
                        <span class="sub-item">Estados</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#config">
            <i class="fa fa-cog"></i>
            <p>Configuración</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="config">
            <ul class="nav nav-collapse">
                <li>
                    <a href="">
                        <span class="sub-item">Control Correo</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="sub-item">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="sub-item">Cambiar Contraseña</span>
                    </a>
                </li>
            </ul>
        </div>
    </li> --}}
    {{-- <li class="nav-item">
        <a href="widgets.html">
            <i class="fas fa-desktop"></i>
            <p>Widgets</p>
            <span class="badge badge-count badge-success">4</span>
        </a>
    </li> --}}
</ul>
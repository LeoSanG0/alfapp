<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        {{-- Iconos en https://fontawesome.com/ --}}
        <i class=" fas fa-home"></i><span>Inicio</span>
    </a>

    <a class="nav-link" href="{{ route('user.index') }}">
        <i class=" fas fa-user"></i><span>Usuarios</span>
    </a>

    <a class="nav-link" href="{{ route('role.index') }}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>

    <a class="nav-link" href="{{ route('customer.index') }}">
        <i class=" fas fa-users"></i><span>Clientes</span>
    </a>
    <a class="nav-link" href="{{ route('quote.index') }}">
        <i class=" fas fa-dollar-sign"></i><span>Cotizaciones</span>
    </a>
</li>



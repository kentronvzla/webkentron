<ul class="nav navbar-nav">
    <li class=""><a href="#">PRODUCTOS</a></li>
    <li class=""><a href="#">SOLUCIONES</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            SOPORTE<span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li class="dropdown-header">KERUX</li>
            <li><a href="#">Asistencia Técnica</a></li>
            <li><a href="#">Problemas</a></li>
            <li><a href="#">Requerimientos</a></li>
            <li><a href="#">Programar llamada</a></li>
        </ul>
    </li>
    <li class=""><a href="#">DISTRIBUIDORES</a></li>
    <li class=""><a href="#">CONTACTO</a></li>
    <li class=""><a href="{{ url('customer') }}">CLIENTES</a></li>
    <!--<li class="{{ set_active('userProtected') }}"><a href="{{ url('userProtected') }}">Registered Users Only</a></li>-->
</ul>

<ul class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-right search-form" role="search">
        <div class="form-group has-feedback">
            <label for="buscar" class="sr-only">Buscar</label>
            <input type="text" class="form-control" placeholder="">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </form>
    <!--    @if (!Sentry::check())
        <li class="{{ set_active('register') }}"><a href="{{ url('register') }}">Register</a></li>
        <li class="{{ set_active('login') }}"><a href="{{ url('login') }}">Login</a></li>
        @else
        <li class="{{ set_active('profiles') }}"><a href="{{ url('profiles') }}/{{Sentry::getUser()->id}}">My Profile</a></li>
        <li><a href="{{ url('logout') }}">Logout</a></li>
        @endif-->
</ul>

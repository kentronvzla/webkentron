<ul class="nav navbar-nav">
    <li class="negrita"><a href="{{ url('products') }}">PRODUCTOS</a></li>
    <li class="negrita"><a href="#">SOLUCIONES</a></li>
    
    <li class="dropdown negrita"><a href="#" data-toggle="dropdown" class="dropdown-toggle">SOPORTE<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <!-- Content container to add padding -->
                <div class="yamm-content">
                    <div class="row">
                        <ul class="col-xs-12 col-sm-6 col-md-6 list-unstyled">
                            <li>
                                <p><strong>KERUX</strong></p>
                            </li>
                            <li class="divider"></li>
                            <li>Asistencia Técnica</li>
                            <li>Problemas</li>
                            <li>Requerimientos</li>
                            <li>Programar llamada</li>
                        </ul>
                        <ul class="col-xs-12 col-sm-6 col-md-6 list-unstyled">
                            <li>
                                <p><strong>KOMAT</strong></p>
                            </li>
                            <li class="divider"></li>
                            <li>Asistencia Técnica</li>
                            <li>Problemas</li>
                            <li>Requerimientos</li>
                            <li>Programar llamada</li>
                        </ul>
                        
                    </div>
                </div>
            </li>
        </ul>
    </li>

    <li class="negrita"><a href="#">DISTRIBUIDORES</a></li>
    <li class="negrita"><a href="#">CONTACTO</a></li>
    <li class="negrita"><a href="{{ url('customer') }}">CLIENTES</a></li>
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

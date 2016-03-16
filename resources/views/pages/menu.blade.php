<ul class="nav navbar-nav">
    <li class="negrita">{!! Html::linkIcon('productos', 'Productos', 'cubes') !!}</li>
    <!--    <li class="negrita"><a href="#">SOLUCIONES</a></li>-->

    <li class="dropdown negrita">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
            <i class="fa fa-cogs"></i>
            Soporte
            <b class="caret"></b>
        </a>
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

    <li class="{{ set_active('contacto') }} negrita">{!! Html::linkIcon('contacto', 'Contacto', 'phone') !!}</li>
    <li class="{{ set_active('clientes') }} negrita">{!! Html::linkIcon('clientes', 'Clientes', 'users') !!}</li>
    <li class="{{ set_active('nosotros') }} negrita">{!! Html::linkIcon('nosotros', 'Nosotros', 'map-marker') !!}</li>
    <!--<li class="{{ set_active('userProtected') }}"><a href="{{ url('userProtected') }}">Registered Users Only</a></li>-->
</ul>

<ul class="nav navbar-nav navbar-right">
    <!--    <form class="navbar-form navbar-right search-form" role="search">
            <div class="form-group has-feedback">
                <label for="buscar" class="sr-only">Buscar</label>
                <input type="text" class="form-control" placeholder="">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </form>-->
    @if (!Sentry::check())
    <li class="{{ set_active('register') }} negrita">{!! Html::linkIcon('register', 'Registro', 'user') !!}</li>
    <li class="{{ set_active('login') }} negrita">{!! Html::linkIcon('login', 'Iniciar', 'dot-circle-o') !!}</li>
    @else
    <!--<li class="{{ set_active('profiles') }}"><a href="{{ url('profiles') }}/{{Sentry::getUser()->id}}">My Profile</a></li>-->

    <div class="btn-group" role="group" style="padding-top: 8px">
        <button type="button" class="btn btn-info">
            <i class="fa fa-user"></i>
            <span class="hidden-sm hidden-xs">{{ Sentry::getUser()->email }}</span>
        </button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li>{!! Html::linkIcon('logout', 'Cerrar Sesión', 'times') !!}</li>
            <li class="divider"></li>
            <li>{!! Html::linkIcon('admin','Administrar', 'table') !!}</li>
        </ul>
    </div>
    
    @endif
</ul>

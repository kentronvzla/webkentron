<ul class="nav navbar-nav">
    <li class="negrita">{!! Html::linkIcon('productos', 'Productos', 'cubes') !!}</li>

    <li class="dropdown negrita">{!! Html::linkIcon('soporte', 'Soporte', 'cogs') !!}</li>

    <li class="{!! set_active('contacto') !!} negrita">{!! Html::linkIcon('contacto', 'Contacto', 'phone') !!}</li>
    <li class="{!! set_active('clientes') !!} negrita">{!! Html::linkIcon('clientes', 'Clientes', 'users') !!}</li>
    <li class="{!! set_active('nosotros') !!} negrita">{!! Html::linkIcon('nosotros', 'Nosotros', 'map-marker') !!}</li>
    <li class="{!! set_active('busquedas') !!} negrita">{!! Html::linkIcon('busquedas', 'Busqueda', 'book') !!}</li>
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (!Sentry::check())
    <li class="{{ set_active('login') }} negrita">{!! Html::linkIcon('login', 'Entrar', 'sign-in') !!}</li>
    <li class="{{ set_active('register') }} negrita">{!! Html::linkIcon('register', 'Registro', 'user-plus') !!}</li>
    @else
    <li class="dropdown negrita">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            {!! Sentry::getUser()->email !!}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            @if(App\Usuario::puedeAcceder('GET.admin'))
            <li>{!! Html::linkIcon('admin','Administrar', 'table') !!}</li>
            <li class="divider"></li>
            @endif
            <li>{!! Html::linkIcon('logout', 'Cerrar Sesión', 'sign-out') !!}</li>
        </ul>
    </li>
    @endif
</ul>

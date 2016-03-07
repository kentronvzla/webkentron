@extends('master')

@section('title', 'Administrar')

@section('content')
<div class="container-fluid">
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Versiones</div>
            <ul class="list-group">
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Seguridad</div>
            <ul class="list-group">
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Tablas</div>
            <ul class="list-group">
                <a href="{{url('admin/tablas/contenidos')}}">
                    <li class="list-group-item lipanel">Contenidos</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="col-xs-12 col-sm-9 col-md-9">
        @yield('content1')
    </div>
</div>
@stop

@section('javascript')
{!! Html::script('assets/js/views/admin/administracion.js') !!}
@stop
@extends('layouts.layout')

@section('title', 'Administrar')

@section('content')
<div class="container-fluid">
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="panel panel-webkentron">
            <div class="panel-heading">Versiones</div>
            <ul class="list-group">
            </ul>
        </div>
        <div class="panel panel-webkentron">
            <div class="panel-heading">Seguridad</div>
            <ul class="list-group">
                <a id="grupos" href="{!! url('admin/seguridad/grupos') !!}">
                    <li class="list-group-item lipanel">Grupos</li>
                </a>
                <a id="usuarios" href="{!! url('admin/seguridad/usuarios') !!}">
                    <li class="list-group-item lipanel">Usuarios</li>
                </a>
            </ul>
        </div>
        <div class="panel panel-webkentron">
            <div class="panel-heading">Tablas</div>
            <ul class="list-group">
                <a id="contenidos" href="{!! url('admin/tablas/contenidos') !!}">
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
@extends('master')

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
                <a href="{!! url('admin/seguridad/grupos') !!}">
                    <li class="list-group-item lipanel">Grupos</li>
                </a>
                <a href="{!! url('admin/seguridad/usuarios') !!}">
                    <li class="list-group-item lipanel">Usuarios</li>
                </a>
            </ul>
        </div>
        <div class="panel panel-webkentron">
            <div class="panel-heading">Tablas</div>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/contenidos/') !!}">
                    <li class="list-group-item lipanel">Contenidos</li>
                </a>
            </ul>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/topicos/') !!}">
                    <li class="list-group-item lipanel">Tópicos</li>
                </a>
            </ul>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/categorias/') !!}">
                    <li class="list-group-item lipanel">Categorías</li>
                </a>
            </ul>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/sistemas/') !!}">
                    <li class="list-group-item lipanel">Sistemas</li>
                </a>
            </ul>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/tipoarchivos/') !!}">
                    <li class="list-group-item lipanel">Tipos de Archivos</li>
                </a>
            </ul>
            <ul class="list-group">
                <a href="{!! url('admin/tablas/archivotopicos/') !!}">
                    <li class="list-group-item lipanel">Archivos de Tópicos</li>
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
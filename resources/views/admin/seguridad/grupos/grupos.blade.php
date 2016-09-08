@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop

@section('content1')
@include('pages.containers.cn-modales')
<div class="panel panel-webkentron">
    <div class="panel-heading">Grupos registrados en el sistema</div>
    <div class="panel-body">
        {!! HTML::tableModel($grupos, 'App\\Grupo', true, true, true, true) !!}
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
{!! HTML::script('assets/js/views/admin/permisos.js') !!}
@stop
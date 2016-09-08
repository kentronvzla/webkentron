@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop


@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Administrar Categorías</div>
    <div class="panel-body">
        {!! Html::tableModel($categorias, 'App\\Categoria') !!}
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
@stop

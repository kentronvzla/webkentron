<!-- Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago-->
@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop


@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Registrar Elementos</div>
    <div class="panel-body">
    	{!! Html::tableModel($topicos, 'App\\Topico') !!}
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
@stop

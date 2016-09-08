@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop


@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Administrar Archivo</div>
    <div class="panel-body">
        {!! Html::tableModel($archivotopicos, 'App\\ArchivoTopico') !!}
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
@stop

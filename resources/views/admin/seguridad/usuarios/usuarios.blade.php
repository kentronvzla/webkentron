@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop

@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Usuarios registrados en el sistema</div>
    <div class="panel-body">
        {!! Html::tableModel($usuarios, 'App\\Usuario', false) !!}
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
@stop

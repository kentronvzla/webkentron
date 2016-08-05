@extends('admin.index')

@section('css')
@include('pages.css.datatables-css')
@stop


@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Administrar Conocimientos</div>
    <div class="panel-body">
    	<div class="panel-title">
    		<button class="btn-sm btn-block btn btn-primary">Conocimientos</button><br>
    	</div>
    </div>
</div>
@stop

@section('javascript')
@include('pages.javascript.datatables-js')
@stop

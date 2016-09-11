@extends('master')

@section('title', 'Clientes')

@section('content')
<!-- Content -->
<div class="container-fluid">
  <div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-webkentron">
		  <div class="panel-heading">Categorías</div>
		  <ul class="list-group">
      @foreach ($categorias as $categoria)
		    <a href="#"><li class="list-group-item lipanel">{{ $categoria->nombre }}</li></a>
      @endforeach
		    <a href="#"><li class="list-group-item lipanel">Categoría 2</li></a>
		</div>
  </div>
	@include('pages.search.buscador')

</div>

<!-- Content -->
@stop

@section('javascript')
{!! Html::script('assets/js/views/busquedas/busquedas.js') !!}
@stop
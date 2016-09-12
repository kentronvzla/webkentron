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
		    <a href="{{ url('/busquedas?category_id='.$categoria->id) }}"><li class="list-group-item lipanel">{{ $categoria->nombre }}</li></a>
      @endforeach
		</div>
  </div>
	@include('pages.search.formulario')
  @include('pages.search.resultados')
</div>

<!-- Content -->
@stop

@section('javascript')
{!! Html::script('assets/js/views/busquedas/busquedas.js') !!}
@stop
@extends('master')

@section('title', 'Productos')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2 class="titulo-header-left">
                Productos
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            {!! Html::image('assets/img/cajakerux.gif', 'cajakerux', 
            ['class' => 'img-responsive center-img ajax-request', 
            'id' => 'productos-kerux', 'data-url' => 'productos/kerux',
            'data-target' => 'resumen-producto', 'data-method' => 'GET',
            'data-type' => 'html', 'style' => 'cursor:pointer']) !!}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            {!! Html::image('assets/img/cajakomat.gif', 'cajakomat', 
            ['class' => 'img-responsive center-img ajax-request', 
            'id' => 'productos-komat', 'data-url' => 'productos/komat',
            'data-target' => 'resumen-producto', 'data-method' => 'GET',
            'data-type' => 'html', 'style' => 'cursor:pointer']) !!}
        </div>
    </div>
</div>

<div class="container" id="resumen-producto"></div><br>

@stop
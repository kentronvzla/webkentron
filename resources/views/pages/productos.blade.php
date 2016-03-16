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
            <a href="{{url('productos/kerux')}}">
                {!! Html::image('assets/img/cajakerux.gif', 'cajakerux', ['class' => 'img-responsive center-img']) !!}
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <a href="{{url('productos/komat')}}">
                {!! Html::image('assets/img/cajakomat.gif', 'cajakomat', ['class' => 'img-responsive center-img']) !!}
            </a>
        </div>
    </div>
</div>

<div class="container">
    @yield('content2')
</div>
<br>

@stop
@extends('master')

@section('title', 'Productos')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <a href="{{url('products/kerux')}}">
                {!! Html::image('assets/img/cajakerux.gif', 'cajakerux', array('class' => 'img-responsive center-img')) !!}
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <a href="{{url('products/komat')}}">
                {!! Html::image('assets/img/cajakomat.gif', 'cajakomat', array('class' => 'img-responsive center-img')) !!}
            </a>
        </div>
    </div>
</div>

<div class="container">
    @yield('content2')
</div>
<br>

@stop
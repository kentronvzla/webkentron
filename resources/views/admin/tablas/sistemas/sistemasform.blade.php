@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$sistema, 'titulo'=>'sistema'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/sistemas/nuevo', 'id'=>'categoriaNuevo']) !!}
        {!! Form::concurrencia($sistema) !!}

        <div class="row">
            {!! Form::hidden('id',$sistema->id) !!}
            {!! Form::btInput($sistema, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/sistemas/modificar', 'class' => 'form saveajax', 'id'=>'sistemas-form', 'data-callback'=>'admin/tablas/sistemas']) !!}
        {!! Form::concurrencia($sistema) !!}
        
        <div class="row">
            {!! Form::hidden('id',$sistema->id) !!}
            {!! Form::btInput($sistema, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @endif
</div>

@include('pages.containers.cn-modales')
@stop

@section('javascript')
{!! Html::script('assets/vendors/ckeditor/adapters/jquery.js') !!}
{!! Html::script('assets/js/views/admin/administracion.js') !!}
@stop
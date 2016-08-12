@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$topico, 'titulo'=>'topico'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/topicos/nuevo', 'id'=>'topicoNuevo']) !!}
        {!! Form::concurrencia($topico) !!}

        <div class="row">
            {!! Form::hidden('id',$topico->id) !!}
            {!! Form::btInput($topico, 'titulo', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'descripcion', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'acciones', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'tags', 12, 'textarea') !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/topicos/modificar', 'class' => 'form saveajax', 'id'=>'topicos-form', 'data-callback'=>'admin/tablas/topicos']) !!}
        {!! Form::concurrencia($topico) !!}
        
          <div class="row">
            {!! Form::hidden('id',$topico->id) !!}
            {!! Form::btInput($topico, 'titulo', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'descripcion', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'acciones', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($topico, 'tags', 12, 'textarea') !!}
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
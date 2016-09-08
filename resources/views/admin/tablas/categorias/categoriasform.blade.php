@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$categoria, 'titulo'=>'categoria'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/categorias/nuevo', 'id'=>'categoriaNuevo']) !!}
        {!! Form::concurrencia($categoria) !!}

        <div class="row">
            {!! Form::hidden('id',$categoria->id) !!}
            {!! Form::btInput($categoria, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/categorias/modificar', 'class' => 'form saveajax', 'id'=>'categorias-form', 'data-callback'=>'admin/tablas/categorias']) !!}
        {!! Form::concurrencia($categoria) !!}
        
        <div class="row">
            {!! Form::hidden('id',$categoria->id) !!}
            {!! Form::btInput($categoria, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
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
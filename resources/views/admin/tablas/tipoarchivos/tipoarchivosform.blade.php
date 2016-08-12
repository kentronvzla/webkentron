@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$tipoarchivo, 'titulo'=>'tipoarchivo'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/tipoarchivos/nuevo', 'id'=>'tipoarchivoNuevo']) !!}
        {!! Form::concurrencia($tipoarchivo) !!}

        <div class="row">
            {!! Form::hidden('id',$tipoarchivo->id) !!}
            {!! Form::btInput($tipoarchivo, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/tipoarchivos/modificar', 'class' => 'form saveajax', 'id'=>'tipoarchivos-form', 'data-callback'=>'admin/tablas/tipoarchivos']) !!}
        {!! Form::concurrencia($tipoarchivo) !!}
        
        <div class="row">
            {!! Form::hidden('id',$tipoarchivo->id) !!}
            {!! Form::btInput($tipoarchivo, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
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
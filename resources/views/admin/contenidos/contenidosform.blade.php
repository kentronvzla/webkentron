@extends('admin.index')

@section('content1')

<div class="panel panel-primary">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$contenido, 'titulo'=>'contenido'))
    </div>

    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'contenidos/nuevo', 'class' => 'form saveajax', 'id'=>'contenidos-form']) !!}
        {!! Form::concurrencia($contenido) !!}

        <div class="row">
            {!! Form::hidden('id',$contenido->id) !!}
            {!! Form::btInput($contenido, 'titulo', 12) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'resumen', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'detalle', 12, 'textarea', ['class'=>'ckeditor ', 'id'=>'detalle']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'tipo_publicaciones_id', 4) !!}
            {!! Form::btInput($contenido, 'modo_vistas_id', 4) !!}
            {!! Form::btInput($contenido, 'tipo_fondos_id', 4) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'fecha_vigencia', 4) !!}
            {!! Form::btInput($contenido, 'referencia_externa', 4) !!}
            {!! Form::btInput($contenido,'ind_visible', 4) !!}
            @if(empty(@$id))
            {!! Form::hidden('usuario_creacion_id', Sentry::getUser()->id) !!}
            @else
            {!! Form::hidden('usuario_creacion_id',$contenido->usuario_creacion_id) !!}
            @endif    
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>

</div>

@include('pages.containers.cn-modales')
@stop

@section('javascript')
{!! Html::script('assets/vendors/ckeditor/adapters/jquery.js') !!}
{!! Html::script('assets/js/views/admin/administracion.js') !!}
@stop
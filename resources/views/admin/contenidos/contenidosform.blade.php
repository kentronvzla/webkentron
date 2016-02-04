@extends('admin.index')

@section('content1')

<div class="panel panel-primary">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$contenido, 'titulo'=>'contenido'))
    </div>

    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['route' => 'contenidos', 'class' => 'form']) !!}
        {!! Form::concurrencia($contenido) !!}
        <div class="row">
            {!! Form::hidden('id',$contenido->id) !!}
            {!! Form::btInput($contenido, 'titulo', 12) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'resumen', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido,'detalle',12,'textarea',['class'=>'ckeditor ']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'tipo_publicaciones_id', 6) !!}
            {!! Form::btInput($contenido, 'modo_vistas_id', 6) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'tipo_fondos_id', 6) !!}

            {!! Form::btInput($contenido,'fondo', 6 ,'file') !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido,'url', 12 ,'text',['readonly'=>'readonly']) !!}
        </div>
        
        <div class="row">
            {!! Form::btInput($contenido,'ind_activo', 3) !!}
            {!! Form::btInput($contenido, 'fecha_vigencia', 3) !!}
            {!! Form::btInput($contenido, 'autor', 6, 'text',['readonly'=>'readonly']) !!}
        </div>
        
        <div class="row">
            {!! Form::btInput($contenido, 'referencia_externa', 12) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>

</div>

@stop


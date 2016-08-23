@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$contenido, 'titulo'=>'contenido'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/contenidos/nuevo', 'id'=>'contenidoNuevo']) !!}
        {!! Form::concurrencia($contenido) !!}

        <div class="row">
            {!! Form::hidden('id',$contenido->id) !!}
            {!! Form::btInput($contenido, 'titulo', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'resumen', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'detalle', 12, 'textarea', ['class'=>'ckeditor ', 'id'=>'detalle']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'tipo_publicaciones_id', 6) !!}
            {!! Form::btInput($contenido, 'modo_vistas_id', 6) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'fecha_vigencia', 4, 'text', ['autocomplete'=>'off']) !!}
            {!! Form::btInput($contenido, 'tags', 4, 'text', ['autocomplete'=>'off']) !!}
            {!! Form::btInput($contenido,'ind_visible', 4) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/contenidos/modificar', 'class' => 'form saveajax', 'id'=>'contenidos-form', 'data-callback'=>'admin/tablas/contenidos']) !!}
        {!! Form::concurrencia($contenido) !!}
        
         <div class="row">
            @if($contenido->fondo !="")
            {!! Form::btImage($contenido, 'contenidos', 'fondo', 'image', 12, 'Fondo', '', ['data-urlsubir'=>'admin/tablas/contenidos']) !!}  
            @else
            {!! Form::btImage($contenido, 'contenidos', 'fondo', 'image', 12, '', 'assets/img/fondo-icon.png', ['data-urlsubir'=>'admin/tablas/contenidos']) !!}  
            @endif
        </div>

        <div class="row">
            {!! Form::hidden('id',$contenido->id) !!}
            {!! Form::btInput($contenido, 'titulo', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'resumen', 12, 'textarea') !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'detalle', 12, 'textarea', ['class'=>'ckeditor ', 'id'=>'detalle']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'tipo_publicaciones_id', 6) !!}
            {!! Form::btInput($contenido, 'modo_vistas_id', 6) !!}
            {{-- Form::btInput($contenido, 'tipo_fondos_id', 4) --}}
        </div>

        <div class="row">
            {!! Form::btInput($contenido, 'fecha_vigencia', 4, 'text', ['autocomplete'=>'off']) !!}
            {!! Form::btInput($contenido, 'referencia_externa', 4, 'text', ['autocomplete'=>'off']) !!}
            {!! Form::btInput($contenido,'ind_visible', 4) !!}
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
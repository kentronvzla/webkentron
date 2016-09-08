@extends('admin.index')

@section('content1')

<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$archivotopico, 'titulo'=>'archivotopico'))
    </div>
    @if($nuevo)
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/archivotopicos/nuevo', 'id'=>'archivotopicoNuevo']) !!}
        {!! Form::concurrencia($archivotopico) !!}

        <div class="row">
            {!! Form::hidden('id',$archivotopico->id) !!}
            {!! Form::btInput($archivotopico, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

       <div class="row">
            {!! Form::btInput($archivotopico, 'topico_id', 4) !!}
            {!! Form::btInput($archivotopico, 'sistema_id', 4) !!}
            {!! Form::btInput($archivotopico, 'tipo_archivo_id', 4) !!}
        </div>

        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
    @else
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/tablas/archivotopicos/modificar', 'class' => 'form saveajax', 'id'=>'archivotopicos-form', 'data-callback'=>'admin/tablas/archivotopicos']) !!}
        {!! Form::concurrencia($archivotopico) !!}
        
        <div class="row">
            {!! Form::hidden('id',$archivotopico->id) !!}
            {!! Form::btInput($archivotopico, 'nombre', 12, 'text',['autocomplete'=>'off']) !!}
        </div>

        <div class="row">
            {!! Form::btInput($archivotopico, 'topico_id', 4) !!}
            {!! Form::btInput($archivotopico, 'sistema_id', 4) !!}
            {!! Form::btInput($archivotopico, 'tipo_archivo_id', 4) !!}
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
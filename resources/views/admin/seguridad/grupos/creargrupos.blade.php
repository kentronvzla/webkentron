@extends('admin.index')
@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',['obj'=>$grupo, 'titulo'=>'Grupo de Usuario'])
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/seguridad/grupos']) !!}
        {!! Form::concurrencia($grupo) !!}
        <div class="row">
            {!! Form::hidden('id',$grupo->id) !!}
            {!! Form::hidden('nombre', $grupo->name) !!}   
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::text('name', @$grupo->name, ['class' => 'form-control',
                    'placeholder'=>'Nombre del grupo', 'required'=>'', 'data-tieneayuda'=>'0']) !!}
                </div>
            </div>
        </div>
        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
</div>
@stop 



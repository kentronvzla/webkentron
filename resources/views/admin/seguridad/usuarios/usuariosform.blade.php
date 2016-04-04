@extends('admin.index')

@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$usuario, 'titulo'=>'grupo'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {!! Form::open(['url'=>'admin/seguridad/usuarios']) !!}
        {!! Form::concurrencia($usuario) !!}
        <div class="row">
            {!! Form::hidden('id',$usuario->id) !!}
            {!! Form::btInput($usuario, 'first_name', 6) !!}
            {!! Form::btInput($usuario, 'last_name', 6) !!}
        </div>
        <div class="row">
            {!! Form::btInput($usuario, 'email', 6) !!}
            {!!Form::btInput($usuario, 'activated', 6) !!}
        </div>
        <div class="row">
            {!! Form::btInput($usuario, 'password', 6,'password') !!}
            {!! Form::simpleInput('password_confirmation', 6, 'password', 
            ['class'=> 'form-control', 'placeholder' => 'Confirmar Contraseña']) !!}
        </div>
        <div class="row">
            {!! Form::multiselect($usuario, 'grupos', 12) !!}
        </div>
        {!! Form::submitBt() !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
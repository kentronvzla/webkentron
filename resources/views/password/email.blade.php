@extends('master')

@section('title', 'Recuperar Contraseña')

@section('css')
{!! Html::style('assets/css/webkentron/login.css') !!}
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Html::linkIcon('#', 'Recuperar Contraseña', 'share', 
                            ['id' => 'login-form-link',
                            'class' => isset($active_login) ? $active_login: '']) 
                            !!} 
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    {!! Form::open(['action' => 'Auth\PasswordController@postEmail']) !!}
                    <fieldset>
                        <p>Ingrese su email y enviaremos un link para recuperar su contraseña</p>
                        <!-- Email field -->
                        <div class="form-group">
                            {!! Form::text('email', null, ['placeholder' => 'Email',
                            'class' => 'form-control', 'required' => 'required'])!!}
                        </div>
                        <!-- Submit field -->
                        <div class="form-group">
                            {!! Form::submit('Enviar', 
                            ['class' => 'btn btn-sm btn-success btn-block btn-login']) !!}
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
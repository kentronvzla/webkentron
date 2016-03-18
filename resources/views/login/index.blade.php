@extends('master')

@section('title', 'Iniciar/Registrar')

@section('css')
@include('pages.css.login-css')
@stop

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-login">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Html::linkIcon('#', 'Iniciar Sesión', 'sign-in', ['id' => 'login-form-link', 'class' => 'active']) !!} 
                        </div>
                        <div class="col-xs-6">
                            {!! Html::linkIcon('#', 'Registro', 'user', ['id' => 'register-form-link']) !!} 
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('login.login')
                            @include('login.register')
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@section('javascript')
@include('pages.javascript.login-js')
@stop

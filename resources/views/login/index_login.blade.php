@extends('master')

@section('title', 'Iniciar')

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
                            {!! Html::linkIcon('#', 'Iniciar Sesión', 'sign-in', 
                            ['id' => 'login-form-link', 
                            'class' => isset($active_login) ? $active_login: '']
                            ) !!} 
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('login.login')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

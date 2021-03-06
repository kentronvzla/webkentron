@extends('layouts.layout')

@section('title', 'Registrar')

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
                            {!! Html::linkIcon('#', 'Registro', 'user-plus', 
                            ['id' => 'register-form-link', 
                            'class' => isset($active_register) ? $active_register: '']
                            ) !!} 
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('registration.register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

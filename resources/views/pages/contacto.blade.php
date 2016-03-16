@extends('master')

@section('title', 'Contacto')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2 class="titulo-header-left">
                Contáctanos
            </h2>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-8 parrafo">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos de Contácto</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'contact', 'method' => 'store']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'Correo') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Mensaje') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-success'] ) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 parrafo">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1961.5271454750448!2d-66.88223180059956!3d10.496386541821515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a59206b491a9d%3A0xcc3d2f87cc068ff5!2sKentron+Sistemas+de+Informaci%C3%B3n!5e0!3m2!1ses!2sve!4v1455220529017" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 parrafo">
            <p>
                Dirección: Av. Las Acacias, Torre
                La Previsora, piso 19, of. Sur-Oeste,
                Sabana Grande, Caracas 1050, Venezuela 
            </p>
        </div>        
        <div class="col-xs-12 col-sm-4 col-md-4 parrafo">
            <p>
                Teléfonos:
                (58-212) 781-7008, 781-6146, 782-5520
            </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 parrafo">
            <p>
                Correo:
                info@kentron.com.ve
            </p>
        </div>

    </div>

</div>

@endsection

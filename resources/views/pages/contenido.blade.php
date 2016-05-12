@extends('master')

@section('title', '')

@section('content')

<div class="container-fluid">
    <div class="col-xs-12 col-sm-9 col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h1 class="titulo-noticia-left">
                            {!! $contenido->titulo !!} 
                        </h1>
                        <p>
                            {{--*/ $date = date_create($contenido->created_at); /*--}}
                            {!! date_format($date, 'G:i a \o\n l jS F Y') !!} 
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {!! Html::image('archivos/contenidos/'
                        . $contenido->tipoPublicaciones->getAttributes()['descripcion']
                        . '/' 
                        . $contenido->fondo . '', $contenido->fondo, ['class' => 'img-responsive']) !!}
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 parrafo videoyoutube"></div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 parrafo detalle">
                        {!! $contenido->detalle !!}
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 referencia">
                        Referencias:
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p>
                            {{--*/ $tags = explode(",", $contenido->referencia_externa); /*--}}
                            Tags:
                            @foreach ($tags as $tag)
                                <span class="badge"> {!! $tag !!} </span>
                            @endforeach
                            <br>
                            Autor:       
                            {!! 
                            $contenido->usuarioCreacion->getAttributes()['first_name']
                            . " "
                            . $contenido->usuarioCreacion->getAttributes()['last_name']
                            !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')
{!! HTML::script('assets/js/views/contenidos/contenido.js') !!}
@stop
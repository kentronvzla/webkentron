<div class="container-fluid">
    @if(isset($proyectos) && $proyectos->count()>0)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="titulo-header">
                ARTICULOS DE INTERES
            </h1>
        </div>
    </div>
    <div class="wrapper-with-margin">
        <div id="owl-articulos" class="owl-carousel">
            @foreach ($articulos as $articulo)
            <div class="row item">
                <div class="col-xs-12 col-sm-12 col-md-12 caption">
                    <div class="contenido">
                        <p>
                            {!! $articulo->titulo !!}
                            <small>
                                <span class="btn-group">
                                    {!! Html::buttonText(route('contenido', [$articulo->url]),
                                    'plus-square', '', false, 'xs') !!}
                                </span>
                            </small>
                        </p>
                    </div>
                </div>
                {!! Html::image('archivos/contenidos/'
                . $articulo->tipoPublicaciones->getAttributes()['descripcion']
                . '/' 
                . $articulo->fondo . '', $articulo->fondo, ['class' => 'img-responsive']) !!}
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
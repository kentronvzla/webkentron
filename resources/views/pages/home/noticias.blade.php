<div class="container-fluid">
    @if(isset($noticias) && $noticias->count()>0)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="owl-principal" class="owl-carousel owl-theme">
                @foreach ($noticias as $noticia)
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 caption caption-inside">
                                <div class="titulo">
                                    <p>{!! $noticia->titulo !!}</p>
                                </div>
                                <div class="contenido">
                                    {!! $noticia->resumen !!}
                                </div>
                                {!! Html::buttonText(route('contenido', [$noticia->url]),
                                'plus-square', 'Ver', false) !!}
                            </div>
                        </div>
                    </div>
                    {!! Html::image('archivos/contenidos/'
                    . $noticia->tipoPublicaciones->getAttributes()['descripcion']
                    . '/' 
                    . $noticia->fondo . '', $noticia->fondo, ['class' => 'img-responsive']) !!}
                </div>
                @endforeach               
            </div>
        </div>
    </div>
    @endif
</div>


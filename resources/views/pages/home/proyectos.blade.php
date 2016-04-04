<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="titulo-header">
                PROYECTOS
            </h1>
        </div>
    </div>

    <div class="wrapper-with-margin">
        <div id="owl-proyectos" class="owl-carousel">        
            {{--*/ $cont_proyectos = count($proyectos); /*--}}
            @for ($i = 0; $i < $cont_proyectos; $i++)
            {{--*/ $proyecto = $proyectos[$i]; /*--}}

            <div class="item">

                @if(isset($proyecto) && !empty($proyecto))
                    <div class="controls-wrapper">     
                        <div class="titulo-proyecto">
                            {!! $proyecto->resumen !!}
                        </div>
                        <div class="titulo-empresa">
                            <p>{!! $proyecto->titulo !!}</p>
                        </div>
                        <div class="ver-mas">
                        {!! Html::buttonText('infoproyecto/'.$proyecto->id ,
                                    'plus-square', 'Ver', true) !!}
                        </div>           
                    </div>
                @endif

                @if(++$i < $cont_proyectos)
                    {{--*/ $proyecto = $proyectos[$i]; /*--}}
                    @if(isset($proyecto) && !empty($proyecto) )
                    <div class="controls-wrapper">     
                        <div class="titulo-proyecto">
                            {!! $proyecto->resumen !!}
                        </div>
                        <div class="titulo-empresa">
                            <p>{!! $proyecto->titulo !!}</p>
                        </div>
                        <div class="ver-mas">
                        {!! Html::buttonText('infoproyecto/'.$proyecto->id ,
                                    'plus-square', 'Ver', true) !!}
                        </div>
                    </div>
                    @endif
                @else
                    <div class="controls-wrapper">     
                        <div class="titulo-proyecto">
                            <p>Proximos Proyectos</p>
                        </div>
                        <div class="titulo-empresa">
                            <p>Proximos Proyectos</p>
                        </div>
                    </div>
                @endif

            </div>

            @endfor
        </div>
    </div>
</div>

@include('pages.containers.cn-modales')
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <div class="mod-head">
                <div class="button-close">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                @if(isset($proyecto->fondo) && !empty($proyecto->fondo))
                {!! Html::image('archivos/contenidos/'
                    . $proyecto->tipoPublicaciones->getAttributes()['descripcion']
                    . DIRECTORY_SEPARATOR 
                    . $proyecto->fondo . '', $proyecto->fondo, ['class' => 'img-responsive']) !!}
                @else
                {!! Html::image('assets/img/fondo-icon.png', '', ['class' => 'img-responsive']) !!}  
                @endif
            </div>
        </div>
        <div class="modal-body">
            <h2>{!! $proyecto->titulo !!}</h2>
            <p class="parrafo">
                {!! $proyecto->detalle !!}
            </p>
        </div>
        <div class="modal-footer">
            {!! $proyecto->resumen !!}
        </div>
    </div>
</div>


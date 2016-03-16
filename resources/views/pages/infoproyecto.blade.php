<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <div class="mod-head">
                <div class="button-close">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                {!! Html::image('archivos/contenidos/'
                    . $proyecto->tipoPublicaciones->getAttributes()['descripcion']
                    . DIRECTORY_SEPARATOR 
                    . $proyecto->fondo . '', $proyecto->fondo, ['class' => 'img-responsive']) !!}
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


<div class="col-xs-12 col-sm-{!! $numCols !!} col-md-{!! $numCols !!}">
    <div class="panel panel-default">
        <div class="panel-heading">{!! $params['placeholder'] !!}</div>
        <div class="panel-body">
            <div id="template">
                <div class="dz-message">
                    Adjunte o arrastre el {!! $attrName !!}  que desea aquí.
                    <br>
                    MÁX {!! $params['max'] !!} MB     
                </div>
                <div class="dropzone-previews"></div>
            </div>
        </div>
    </div>
</div>
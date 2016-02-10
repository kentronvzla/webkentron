<div class="col-xs-12 col-sm-{!! $numCols !!} col-md-{!! $numCols !!}">
    <div class="form-group {!! $errors->has($attrName) ? 'has-error has-feedback':'' !!}">
        @if($inputType=="image")
            {!! Html::image($url_image, $alt, $params) !!}
        @endif
        @if($errors->has($attrName))
            @foreach($errors->get($attrName) as $message)
                <span class="help-block">{!! $message !!}</span>
            @endforeach
        @endif
    </div>
</div>
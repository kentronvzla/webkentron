@extends('admin.index')

@section('content1')
<div class="panel panel-webkentron">
    <div class="panel-heading">Grupos registrados en el sistema</div>
    <div class="panel-body">
        {!! Html::tableModel($grupos, 'App\\Grupo', true, true, true, true) !!}
    </div>
</div>
@stop
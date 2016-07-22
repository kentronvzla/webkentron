@extends('layout_email')
@section('contenido')
<h2>Validar Email</h2>

<div>
    Para validar su email, dirijase a la siguiente dirección:
    {!! Html::link('activate/'.$user->id.'/'.$code,'Validar Email') !!}
</div>
@stop
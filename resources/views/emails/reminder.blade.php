@extends('layout_email')
@section('contenido')
<h2>Restablecer Contraseña</h2>

<div>
    Para restablecer su contraseña, complete el siguiente formulario:
    {!! Html::link('reset_password/'.$user->id.'/'.$code,'Restablecer Contraseña') !!}
</div>
@stop

@extends('layouts.layout_email')
@section('contenido')
<h2>Solicitud de Contacto</h2>
<div>
    <p>Hola Kentron! {!! $nombre !!} ha hecho una petición de contacto y ha enviado el siguiente mensaje:</p>
    <p><strong>Mensaje: </strong>{!! $mensaje !!} 
</div>

<div>
    <p>Datos para comunicarse con esta persona:</p><br>
    <p><strong>Nombre: </strong>{!! $nombre !!}<br>
    <p><strong>Correo: </strong>{!! $correo !!}<br>
    <p><strong>Teléfono: </strong>{!! $telefono !!}
</div>
@stop
@extends('master')

@section('title', 'Home')

@section('content')

@foreach ($tipo_publicaciones as $tipo_publicacion)
    @include($tipo_publicacion->pagina)
@endforeach

@endsection
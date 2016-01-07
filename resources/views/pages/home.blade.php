@extends('master')

@section('title', 'Home')

@section('content')

<!-- CAROUSEL -->
@include('pages.home.carousel')
<!-- CAROUSEL -->

<div class="container-fluid">

    <!-- SOBRE NOSOTROS -->
    @include('pages.home.nosotros')
    <!-- SOBRE NOSOTROS -->

    <!-- PROYECTOS -->
    @include('pages.home.proyectos')
    <!-- PROYECTOS -->

    <!-- ARTICULOS DE INTERES -->
    @include('pages.home.articulos')
    <!-- ARTICULOS DE INTERES -->

</div>

@endsection
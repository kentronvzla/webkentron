<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title') - Kentron</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Página Web de Kentron">
        <meta name="author" content="Kentron Sistemas de Información C.A">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Stylesheets -->
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
        <!--<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->
        @include('pages.css')
        <!-- Stylesheets -->

        <!-- Stylesheets/Views -->
        @yield('css')
        <!-- Stylesheets/Views -->

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Page Icon/Logo -->
        <link rel="icon" href="{!! asset('assets/img/logo.jpg') !!}"/>

        <!-- Favicon and Apple Icons -->
        <link rel="shortcut icon" href="{!! asset('assets/img/logo.jpg') !!}">

    </head>
    <body>
        <!-- Header -->
        @include('pages.header')
        <!-- Header -->

        <!-- Errors -->
        @include('templates.mensaje')
        <!-- Errors -->

        <!-- Containers -->
        @include('pages.containers.cn-mensajes')
        <!-- Containers -->

        <!-- Content -->
        @yield('content')
        <!-- Content -->

        <!-- Footer -->
        @include('pages.footer')
        <!-- Footer -->

        <!-- Scripts -->
        <script>
            var baseUrl = '{!! url("") !!}/';
        </script>
        @include('pages.js')
        <!-- Scripts -->

        <!-- Scripts/Views -->
        @yield('javascript')
        <!-- Scripts/Views -->

        @if(Session::has('mensaje'))
        <script>
            $(document).ready(function () {
                mostrarMensaje("{!! Session::pull('mensaje') !!}");
            });
        </script>
        @endif
        @if(Session::has('error'))
        <script>
            $(document).ready(function () {
                mostrarError("{!! Session::pull('error') !!}");
            });
        </script>
        @endif

        <!-- JavaScript -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->

    </body>
</html>
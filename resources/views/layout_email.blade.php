<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<html class="no-js">--> <!--<![endif]-->
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>{!! $message->getSubject() !!}</title>
        <meta name="description" content="Kentron">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="author" content="Richard Arrieta - Reysmer Valle">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- CSS
        ================================================== -->
        <!-- Stylesheets -->
        {!! Html::style('assets/css/webkentron/email.css') !!}
        <!-- Stylesheets -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Page Icon/Logo -->
        <link rel="icon" href="{!! asset('assets/cyprass/images/logo3.png') !!}"/>

        <!-- Favicon and Apple Icons -->
        <link rel="shortcut icon" href="{!! asset('assets/cyprass/images/logo3.png') !!}">

    </head>
    <body bgcolor="#FFFFFF">
        <table class="head-wrap" bgcolor="#428BCA">
            <tr>
                <td></td>
                <td class="header container" >
                    <div class="content">
                        <table bgcolor="#428BCA">
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
        <table class="body-wrap">
            <tr>
                <td></td>
                <td class="container" bgcolor="#FFFFFF">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    @yield('contenido')
                                    <table class="social" width="100%">
                                        <tr>
                                            <td>
                                                <table align="left" class="column">
                                                    <tr>
                                                        <td>				
                                                            <h5 class="">Redes sociales:</h5>
                                                            <p class="">
                                                                <a class="soc-btn in" href="https://www.linkedin.com/company/kentron" target="_blank">
                                                                    <img src="{{ $message->embed('assets/img/image4.png') }}" alt="linkedin">
                                                                </a>
                                                                <a class="soc-btn gp" href="https://plus.google.com/u/0/113097492202606059402/posts" target="_blank">
                                                                    <img src="{{ $message->embed('assets/img/image5.png') }}" alt="google+">
                                                                </a>
                                                                <a class="soc-btn fb" href="https://es-la.facebook.com/KentronSistemas" target="_blank">
                                                                    <img src="{{ $message->embed('assets/img/image6.png') }}" alt="facebook">
                                                                </a>
                                                                <a class="soc-btn tw" href="https://twitter.com/kentron" target="_blank">
                                                                    <img src="{{ $message->embed('assets/img/image7.png') }}" alt="twitter">
                                                                </a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table align="left" class="column">
                                                    <tr>
                                                        <td>				
                                                            <h5 class="">Información de contacto:</h5>												
                                                            <p>
                                                                Teléfono: <strong>+58 (212) 781-7008 / 781-6146</strong><br/>
                                                                Correo: <strong><a href="emailto:kentronvzla@gmail.com">kentronvzla@gmail.com</a></strong>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table><!-- /column 2 -->
                                                <span class="clear"></span>	
                                            </td>
                                        </tr>
                                    </table><!-- /social & contact -->
                                </td>
                            </tr>
                        </table>
                    </div><!-- /content -->
                </td>
                <td></td>
            </tr>
        </table>
        <table class="footer-wrap">
            <tr>
                <td></td>
                <td class="container">
                    <div class="content">
                        <table>
                            <tr>
                                <td align="center">
                                    <p>
                                        <a href="#">Terminos y condiciones</a> |
                                        <a href="#">Privacidad</a> 
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>
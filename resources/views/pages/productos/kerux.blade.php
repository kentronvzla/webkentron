@extends('pages.productos')
@section('content2')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3 class="titulo-header-left">
            KERUX 
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 parrafo">
        {!! Html::image('assets/img/image19.png', 'kerux', array('class' => 'img-responsive center-img')) !!}
        <p>
            KERUX es un Sistema Administrativo Integrado orientado a la Gestión,
            seguimiento, control y mejoramiento de los procesos administrativos 
            enfocado en las particularidades de dichos procesos en la Administración Pública.
            <br>
            KERUX se basa en la aplicación práctica del principio del "Esquema Federativo" donde cada función,
            o módulo del Sistema, se rige por reglas específicas que moldean su actividad y que se relaciona
            con las demás funciones bajo un modelo cooperativo que tiene como resultado:
        </p>
        <p>
        <ul>
            <li>El seguimiento estricto a las normas y procedimientos generales de la Administración Pública</li>
            <li>El funcionamiento apegado a las normas y procedimientos particulares de la Organización</li>
            <li>La seguridad al momento de la presentación de los resultados</li>
            <li>El control de la gestión administrativa</li>
            <li>El eficiente uso de los recursos</li>
            <li>La emisión de los informes y formatos exigidos por los Organos rectores (ONAPRE, CGR, SIGECOF)</li>
            <li>El Funcionamiento bajo la filosofía de control de Flujo de Trabajo o "Work-Flow"</li>
        </ul>
        </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 parrafo">
        <p>
            En resumen, KERUX permite la transformación de la función administrativa en un ambiente:
        <ul>
            <li>Colaborativo</li>
            <li>Interdependiente</li>
            <li>Especializado</li>
            <li>Desconcentrado</li>
            <li>Controlado</li>
        </ul>
        </p>
        <p>
        <h4 class="negrita">Ventajas</h4>
        Sistema de Gestión Administrativa Integrada para entes gubernamentales
        <ul>
            <li>Operaciones administrativas eficientes, efectivas y controladas</li>
            <li>La herramienta de su trabajo diario</li>
            <li>Módulos de eficiencia y productividad </li>
            <li>Mensajero (Work Flow)</li>
            <li>Subsistema Financiero</li>
            <li>Subsistema de Logística</li>
            <li>Subsistema de Control</li>
        </ul>
        </p>
        
<!--        <a href="#" class="btn btn-success active" role="button">Ver presentación interactiva</a>
        <a href="#" class="btn btn-primary active" role="button">Solicitar Demo Software</a>-->

    </div>
</div>

@stop

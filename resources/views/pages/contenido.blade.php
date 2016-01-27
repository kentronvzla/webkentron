@extends('master')

@section('title', 'Contenido')

@section('content')

<div class="container-fluid">
    {!! Html::image('assets/img/ora1.jpg', 'noticia1', array('class' => 'img-responsive')) !!}
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3 class="titulo-header-left">
                Contenido
            </h3>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'contenido', 'class' => 'form']) !!}                    
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        <label>Título</label>
                        {!! Form::text('titulo', 'Escriba el título...', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        <label>Resumen</label>
                        {!! Form::text('resumen', 'Escriba el resumen...',['class'=> 'form-control']) !!}
                    </div>  
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        <label>Detalle</label>
                        {!! Form::text('detalle', 'Escriba el detalle...',['class'=> 'form-control']) !!}
                    </div> 
                    <div class="col-xs-12 col-sm-4 col-md-6 form-group">
                        <label>Tipo de Contenido</label>
                        {!! Form::select('tipo_publicaciones_id', ['' => 'Seleccione el tipo de contenido...', 
                        '1' => 'Artículo', 
                        '2' => 'Proyecto', 
                        '3' => 'Noticia'], 
                        null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6 form-group">
                        <label>Modo de vista</label>
                        {!! Form::select('modo_vistas_id', ['' => 'Seleccione el modo de vista...', 
                        '1' => 'PopUp', 
                        '2' => 'Modal', 
                        '3' => 'Otra Ventana'], 
                        null, ['class' => 'form-control']) !!}
                    </div> 
                    <div class="col-xs-12 col-sm-4 col-md-6 form-group">
                        <label>Tipo de Fondo</label>
                        {!! Form::select('tipo_fondos_id', ['' => 'Seleccione el tipo de fondo...', 
                        '1' => 'Imagen', 
                        '2' => 'Color'],                         
                        null, ['class' => 'form-control']) !!}
                    </div>       
                    <div class="col-xs-12 col-sm-4 col-md-6 form-group">
                        <label></label>
                        {!! Form::file('fondo') !!}
                    </div>                     
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        <label>Link</label><br>
                        {!! Form::label('url', 'www.xyz.com.ve/x_y_z', array('class' => 'awesome')) !!}
                    </div>  
                    <div class="col-xs-12 col-sm-4 col-md-2 form-group">
                        <label>Activo</label>
                        {!! Form::checkbox('ind_activo', 'value')!!}<br>                       
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
                        <label>Vigencia</label>                        
                        {!! Form::text('fecha_vigencia', '10/10/2016',['class'=> 'form-control']) !!}

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6 form-group">
                        <label>Autor</label><br>                        
                        {!! Form::label('autor', 'usarioConectado01', array('class' => 'awesome')) !!}
                    </div> 
<!--                    <div class="form-group ">                        
                        <input class="jqueryDatePicker form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento" data-placeholder="Fecha de nacimiento" name="fecha_nacimiento" type="text" value="01/02/1990" data-tienetooltip="1" data-original-title="" title="" data-tieneayuda="1">
                    </div>-->
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        <label>Referencia externa</label>                        
                        {!! Form::text('referencia_externa', 'www.noticiasexternas.com/Los_tiburones_tienen_escamas_en_lugar_de_dientes',['class'=> 'form-control']) !!}
                    </div>                     
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">
                        {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-12 form-group">                        
                        {!! Form::textArea('referencia_externa', 'a b c d e f g h i j ',['class'=> 'ckeditor']) !!}
                    </div>
                    {!! Form::close() !!}
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3 class="container">

        </h3>
    </div>
</div>
@stop


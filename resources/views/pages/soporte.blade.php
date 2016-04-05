@extends('master')

@section('title', 'Soporte')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2 class="titulo-header-left">
                Soporte KERUX
            </h2>
        </div>
    </div>
    <div class="row">
        <p> 
        {!! Html::image('assets/img/logokomat.jpg', 'kerux', array('class' => 'img-responsive center-img')) !!}
        <p>
        {!! Html::image('assets/img/image19.png', 'komat', array('class' => 'img-responsive center-img')) !!}
        <p>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">            
            <br>
            <a href="http://www.kentron.com.ve/soporte/soporte.php" target="_blank">              
            {!! Form::button('Solicitar Soporte', array('class' => 'btn btn-sm btn-info btn-block btn-login')) !!}
            </a>        
            <br>
        </div>
    </div>
</div>    
 
@endsection



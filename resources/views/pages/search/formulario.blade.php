<div class="col-xs-12 col-sm-9 col-md-9">
  {!! Form::open(['method' => 'GET']) !!}
      <!-- Search Engine -->
      <div id="imaginary_container"> 
        <div class="input-group stylish-input-group">
          {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'¿Qué estás buscando?']) !!}
            <span class="input-group-addon">
            {!! Form::submit('Buscar',['class'=>'btn btn-default glyphicon glyphicon-search '])!!}
            </span>
        </div>
      </div>   
  {!! Form::close() !!}
</div> <!-- End Container-fluid col-9-->
    
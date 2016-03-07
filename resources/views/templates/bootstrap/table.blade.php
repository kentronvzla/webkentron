<div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive nowrap jqueryTable" cellspacing="0" width="100%">
        <thead>
            <tr>
                @foreach($prettyFields as $col)
                <th>{!!$col!!}</th>
                @endforeach
                @if($hasEdit || $hasDelete)
                <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($collection as $object)
            <tr>
                @foreach($prettyFields as $key=>$col)
                <td>{!!$object->getValueAt($key)!!}</td>
                @endforeach
                @if($hasEdit || $hasDelete)
                <td>
                    {!!Form::open(array('url'=>$url."", 'method'=>'POST', 'class'=>'form-eliminar','id'=>'form-'.$object->id))!!}
                    {!!Form::hidden('_method','DELETE')!!}
                    {!!Form::hidden('id',$object->id)!!}
                    @if($hasEdit)
                    @if($hasModal)
                    <a class="btn btn-primary btn-xs abrir-modal" href="{{$url}}/modificar/{{$object->id}}" target="_blank"><i class="glyphicon glyphicon-pencil"></i></a>
                    @else
                    <a class="btn btn-primary btn-xs" href="{{$url}}/modificar/{{$object->id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    @endif
                    @endif
                    @if($hasDelete)
                    <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                    @endif
                    {!!Form::close()!!}
                </td>
                @endif
            </tr>


            @endforeach
        </tbody>
    </table>
</div>
@if($hasAdd)
@include('templates.bootstrap.btnagregar',array('url'=>$urlAdd,'nombre'=>$nombreAdd))
@endif
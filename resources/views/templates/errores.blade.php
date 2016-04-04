<div class="container-fluid">
    @if (Session::has('errors'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
        <ul>
            <strong>Errores : </strong>
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
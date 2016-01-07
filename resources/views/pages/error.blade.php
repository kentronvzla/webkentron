<div class="container">
    @if (Session::has('errors'))
    <div class="alert alert-warning" role="alert">
        <ul>
            <strong>Oops! Something went wrong : </strong>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


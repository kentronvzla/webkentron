{!! Form::open(['route' => 'login', 'id'=>'login-form', 'role'=>'form']) !!}

<div class="form-group">
    {!! Form::text('email', null, ['placeholder' => 'Email', 'id' => 'email', 'class' => 'form-control', 'required' => 'required', 'tabindex' => '1'])!!}
    {!! errors_for('email', $errors) !!}
</div>

<div class="form-group">
    {!! Form::password('password', ['placeholder' => 'Contraseña', 'id' => 'password', 'class' => 'form-control', 'required' => 'required', 'tabindex' => '2'])!!}
    {!! errors_for('password', $errors) !!}
</div>

<div class="form-group text-center">
    <label>
        {!! Form::checkbox('remember', 'remember', null, ['id' => 'remember', 'tabindex' => '3']) !!} Recordarme
    </label>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {!! Form::submit('Entrar', ['id' => 'login-submit', 'class' => 'btn btn-sm btn-info btn-block btn-login', 'tabindex' => '4']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                {!! Html::link('forgot_password', '¿Necesitas Ayuda?', ['class' => 'forgot-password', 'tabindex' => '5']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}


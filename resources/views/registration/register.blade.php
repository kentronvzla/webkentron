{!! Form::open(['route' => 'registration', 'role' => 'form', 'id' => 'register-form']) !!}

<div class="form-group">
    {!! Form::text('first_name', null, ['placeholder' => 'Nombre', 
    'id' => 'first_name', 'class' => 'form-control', 'required' => 'required', 
    'tabindex' => '1', 'autocomplete' => 'off'])!!}
    {!! errors_for('first_name', $errors) !!}
</div>

<div class="form-group">
    {!! Form::text('last_name', null, ['placeholder' => 'Apellido', 
    'id' => 'last_name', 'class' => 'form-control', 'required' => 'required', 
    'tabindex' => '2', 'autocomplete' => 'off'])!!}
    {!! errors_for('last_name', $errors) !!}
</div>

<div class="form-group">
    {!! Form::text('email', null, ['placeholder' => 'Email', 
    'id' => 'email', 'class' => 'form-control', 'required' => 'required', 
    'tabindex' => '3', 'autocomplete' => 'off'])!!}
    {!! errors_for('email', $errors) !!}
</div>

<div class="form-group">
    {!! Form::password('password', ['placeholder' => 'Contraseña', 
    'id' => 'password', 'class' => 'form-control', 'required' => 'required', 
    'tabindex' => '4'])!!}
    {!! errors_for('password', $errors) !!}
</div>

<div class="form-group">
    {!! Form::password('password_confirmation', ['placeholder' => 'Confirmación de Contraseña', 
    'id' => 'password_confirmation', 'class' => 'form-control', 'required' => 'required', 
    'tabindex' => '5'])!!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {!! Form::submit('Crear Cuenta', ['id' => 'register-submit', 
            'class' => 'btn btn-sm btn-primary btn-block btn-register', 'tabindex' => '6']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                {!! Html::link('login', '¿Ya tienes cuenta?', ['class' => 'forgot-password',
                'tabindex' => '7']) !!}
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}


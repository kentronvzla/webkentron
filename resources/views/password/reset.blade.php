{!! Form::open(['action' => 'Auth\PasswordController@postReset']) !!}
<fieldset>
    <!-- Email field -->
    <div class="form-group">
        {!! Form::text('email', null, ['placeholder' => 'Email', 
        'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off'])!!}
        {!! errors_for('email', $errors) !!}
    </div>

    <!-- Password field -->
    <div class="form-group">
        {!! Form::password('password', ['placeholder' => 'Password',
        'class' => 'form-control', 'required' => 'required'])!!}
        {!! errors_for('password', $errors) !!}
    </div>

    <!-- Password confirmation field -->
    <div class="form-group">
        {!! Form::password('password_confirmation', ['placeholder' => 'Password confirmation',
        'class' => 'form-control', 'required' => 'required'])!!}
        {!! errors_for('password', $errors) !!}
    </div>

    <!-- Hidden Token field -->
    {!! Form::hidden('token', $token )!!}
    {!! Form::hidden('id', $id )!!}

    <!-- Submit field -->
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {!! Form::submit('Restablecer Contaseña', 
                ['class' => 'btn btn-sm btn-primary btn-block btn-register']) !!}
            </div>
        </div>
    </div>
    
</fieldset>
{!! Form::close() !!}


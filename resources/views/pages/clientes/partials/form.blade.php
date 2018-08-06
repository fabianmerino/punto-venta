<div class="form-row">
    <div class="form-group col-sm-6">
        {{ Form::label('nombre', 'Nombre Completo') }}
        {{ Form::text('nombre', null, ['class' => $errors->has('nombre') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm']) }}
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-3">
        {{ Form::label('dni', 'DNI') }}
        {{ Form::number('dni', null, ['class' => 'form-control form-control-sm'.($errors->has('dni') ? ' is-invalid' : '')]) }}
        @if ($errors->has('dni'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dni') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-3">
        {{ Form::label('ruc', 'RUC') }}
        {{ Form::number('ruc', null, ['class' => $errors->has('ruc') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm']) }}
        @if ($errors->has('ruc'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('direccion', 'Dirección') }}
    {{ Form::text('direccion', null, ['class' => $errors->has('direccion') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'aria-describedby' => 'direccionHelp']) }}
    @if ($errors->has('direccion'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('direccion') }}</strong>
        </span>
    @else
        <small id="direccionHelp" class="form-text text-muted">Máximo 255 caracteres</small>
    @endif
</div>
<div class="form-row">
    <div class="form-group col-sm-4">
        {{ Form::label('telefono', 'Teléfono') }}
        {{ Form::text('telefono', null, ['class' => $errors->has('telefono') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm']) }}
        @if ($errors->has('telefono'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('telefono') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {{ Form::label('email', 'E-Mail') }}
        {{ Form::text('email', null, ['class' => $errors->has('email') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm']) }}
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {{ Form::label('web', 'Sitio Web') }}
        {{ Form::input('url', 'web', null, ['class' => $errors->has('web') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'placeholder' => 'www.example.com']) }}
        @if ($errors->has('web'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('web') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-8">
        {{ Form::label('limite_credito', 'Límite de Crédito') }}
        {{ Form::number('limite_credito',  Request::is('clientes/*/edit')? null : '0.00', ['class' => $errors->has('limite_credito') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'step' => 'any', 'required', 'aria-describedby' => 'limiteHelp']) }}
        @if ($errors->has('limite_credito'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('limite_credito') }}</strong>
            </span>
        @else
            <small id="limiteHelp" class="form-text text-muted">Si es 0, no tiene límite de crédito</small>
        @endif
    </div>
    @if( Request::is('clientes/*/edit'))
        <div class="form-group col-sm-4">
            {{ Form::label('folio', 'Número de Cliente') }}
            {{ Form::number('folio', null, ['class' => $errors->has('folio') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'aria-describedby' => 'folioHelp']) }}
            @if ($errors->has('folio'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('folio') }}</strong>
                </span>
            @else
                <small id="folioHelp" class="form-text text-muted">Podrás buscar a un cliente por éste número</small>
            @endif
        </div>
    @endif
</div>
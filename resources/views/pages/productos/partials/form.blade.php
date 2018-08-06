<div class="form-row">
    {{ Form::formInput('codigo', 'Código', 'col-sm-6', false, '', '', 'text', null, ['placeholder' => 'Ingresa un código de Barras', 'class' => 'form-control '.($errors->has('codigo') ? 'is-invalid' : '').'text-monospace font-weight-bold text-uppercase']) }}
    <div class="form-group col-sm-6">
            <label class="col-form-label col-sm-4 pt-0">Se vende:</label>
            <div class="form-control form-control-plaintext">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                    <label class="form-check-label" for="inlineRadio1">Por Unidad/Pza</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">A granel/Kg</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <label class="form-check-label" for="inlineRadio3">En Kit</label>
                </div>
            </div>
    </div>
</div>
{{ Form::formInput('descripcion', 'Descripción', '', true, 'descHelp', 'Máximo 255 Caracteres') }}
<div class="form-row">
    {{ Form::formInput('pcosto', 'Precio de Costo', 'col-sm-3', false, '', '', 'number', Request::is('productos/*/edit')? null : '0.00') }}
    <div class="form-group col-sm-3">
        {{ Form::label('porcentaje_ganancia', 'Ganancia') }}
        <div class="input-group input-group-sm">
            {{ Form::number('porcentaje_ganancia', Request::is('productos/*/edit')? null : '20.00', ['class' => 'form-control text-right'.($errors->has('porcentaje_ganancia') ? ' is-invalid' : ''), 'step' => 'any', 'required']) }}
            <div class="input-group-append">
                <div class="input-group-text">%</div>
            </div>
        </div>
        @if ($errors->has('porcentaje_ganancia'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('porcentaje_ganancia') }}</strong>
            </span>
        @endif
    </div>
    {{ Form::formInput('pventa', 'Precio de Venta', 'col-sm-3', false, '', '', 'number', Request::is('productos/*/edit')? null : '0.00') }}
    {{ Form::formInput('pmayoreo', 'Precio de Mayoreo', 'col-sm-3', false, '', '', 'number', Request::is('productos/*/edit')? null : '0.00') }}
</div>
<div class="form-row">
    <div class="form-group col-sm-4">
        {{ Form::label('departamento', 'Departamento') }}
        <select name="departamento" id="departamento" class="form-control form-control-sm">
            @if(isset($producto->departamento->id))
                @foreach($departamentos as $departamento)
                    <option value="{{ $embalaje->id }}" {{ $producto->medida->id == $medida->id ? 'selected' : ''}}>{{ $embalaje->nombre }}</option>
                @endforeach
            @else
                @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group col-sm-4">
        {{ Form::label('medida', 'Unidad de Medida') }}
        <select name="medida" id="medida" class="form-control form-control-sm">
            @foreach($medidas as $medida)
                <option value="{{ $medida->id }} {{ (isset($producto->medida->id) && $producto->medida->id == $medida->id) ? 'selected' : ''}}">{{ $medida->unid_enteros }}{{ $medida->unid_fracciones == '' ? '' : (' / '.$medida->unid_fracciones) }}</option>
            @endforeach
        </select>
    </div>
</div>
<hr>
<div class="custom-control custom-checkbox form-group">
    <input type="checkbox" class="custom-control-input" id="chkInventario">
    <label class="custom-control-label" for="chkInventario">{{ __('Este producto usa Inventario') }}</label>
</div>
<fieldset id="fieldInventario" disabled>
    <div class="form-row">
        {{ Form::formInput('dinventario', 'Hay en inventario', 'col-sm-4') }}
        {{ Form::formInput('dinvminimo', 'Stock Mínimo', 'col-sm-4') }}
        {{ Form::formInput('dinvmaximo', 'Stock Máximo', 'col-sm-4') }}
    </div>
</fieldset>
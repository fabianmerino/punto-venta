<div class="form-group {{ $col }}">
    {{ Form::label($name, $label) }}
    {{ Form::$type($name, $value, array_merge(['class' => 'form-control form-control-sm'.($errors->has($name) ? 'is-invalid' : ''), 'aria-describedby' =>  ($help ? $helpId : '')], $attributes)) }}
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @elseif($help)
        <small id="{{ $helpId }}" class="form-text text-muted">{{ $helpMsg }}</small>
    @endif
</div>
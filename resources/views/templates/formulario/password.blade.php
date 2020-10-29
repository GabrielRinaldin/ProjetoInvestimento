<label class="{{ $class ?? null}}">
    <span>{{ $label ?? $input ?? "ERROR"  }}</span>
    {!! Form::password($input, $attributes)!!}
</label>
<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? "ERROR"  }}</span>
   {!! Form::select($select, $data ?? null, $attributes) !!}
</label>
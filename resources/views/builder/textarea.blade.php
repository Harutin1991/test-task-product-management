<label  data-sk="{{ $sk ?? 'input' }}"
        @if (!empty($classes))
            class="{{ $classes }}"
        @endif
        style="display: inline-block;">
    @if (!empty($string))
        <span class="field-label">{!! $string !!}</span>
    @endif
    <textarea   @if (!empty($attrs))
                    @foreach ($attrs as $key => $val)
                        {!! "$key=\"$val\"" !!}
                    @endforeach
                @endif>{{ $value ?? '' }}</textarea>
</label>
